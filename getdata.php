<?php
 if (isset($_POST['startDate'])&&isset($_POST['endDate'])) {
$data = getData($_POST['startDate'],$_POST['endDate']);
header('Content-Type: application/json');
echo json_encode($data);
}

function getData($startDate,$endDate){

$client='chin_media';
$time =time();

$start_date=$startDate;
$end_date=$endDate;
$secretKey='b3145607fa03b16c10f2xxdc9668ae55';
$sign=md5($client.$time.$start_date.$end_date.$secretKey);


$url ='http://apipartner.adsquangcao.com/?client='.$client.'&time='.$time.'&start_date='.$start_date.'&end_date='.$end_date.'&sign='.$sign;

$data = file_get_contents($url);
return $data;
}
?>
