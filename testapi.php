

<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style type="text/css">
  	table{
  		width:70%;
  	}
  </style>
</head>
<body>
	<form>
	<p>
		Start Date: <input type="text" id="datepicker_start_date" name="">
	</p>
	<p>
		End Date: <input type="text" id="datepicker_end_date" name="">
	</p>
	</form>

	<button id="getDataButton" type="buton">getData</button>
	<table id="dataTable" class="table-triple">
	<thead>
		<th>RegisterDate</th>
		<th>RegisterGame</th>
		<th>Group Id</th>
		<th>Count Register</th>
	</thead>
	<tbody></tbody>
	</table>
<script type="text/javascript">
function getJsonData(){
	var startDate=$("#datepicker_start_date").val();
	var endDate=$("#datepicker_end_date").val();
	 $.ajax({
        url: 'getdata.php',
        type: 'POST',
        data: {'startDate':startDate,'endDate':endDate},
        success: function(data) {
        	data=JSON.parse(data);
        	if(data.status=="OK"){
        		renderTable(data.data);
        	}
        }
    });
}
function renderTable(data){
	var tableBody="";
	data.forEach(function(row){
		tableBody= tableBody.concat('<tr><td>',row.REGISTER_DATE,'</td>');
		tableBody= tableBody.concat('<td>',row.REGISTER_GAME,'</td>');
		tableBody= tableBody.concat('<td>',row.GROUP_ID,'</td>');
		tableBody= tableBody.concat('<td>',row.COUNT_REGISTER,'</td></tr>');

	});
	$('#dataTable tbody').html(tableBody);
}
	$(function(){

		$('#datepicker_start_date').datepicker();
		$('#datepicker_end_date').datepicker();
		$('#datepicker_start_date').datepicker("option", "dateFormat","yy-mm-dd");
		$('#datepicker_end_date').datepicker("option", "dateFormat","yy-mm-dd");
		$('#getDataButton').on('click',function(){
			getJsonData();
		});
	})
</script>
</body>
</html>

