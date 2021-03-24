<?php


$cutOffTime = "11";
$holidays = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday"];

//function getShippingDate($orderDate, $oderTime) {
//$date - Y-m-d format
function getShippingDate($orderDate, $oderTime) {
/* 	$orderDate=getdate(date("U"));
	$orderDate=gettime(date("U"));
        echo $orderDate . " Time:" .$oderTime; */
	//return "CalculatedShippingDate";

	date_default_timezone_set('Asia/Kolkata');
	$timestamp=strtotime($orderDate);
	$usertime=$oderTime;//ordertime
	$userdate=$orderDate; //date
	echo "testing....<br/>";
	echo "Time: ". $usertime;
	echo "Date: ". $userdate ;

	$dat1=$usertime . $userdate;

	$d1=strtotime($dat1);
	echo "<br/>Created date is " . date("Y-m-d H:i", $d1);

	//date based on query
	$day=date('d', $timestamp);
	$month=date('m', $timestamp);
	$year=date('Y', $timestamp);

	//order d
	$oday= date('D', $timestamp);
	$hour=date("H", $d1); 
	$week=date('w', $timestamp);

	echo "<br/>Order Date:" . $year ."-" .$month . "-".  $day . "<br>";
	echo "Order day: " .$oday ."<br/>";
	echo "Order hour: " .$hour ."<br/>";
	echo "Order week: " .$week ."<br/>";


	if (!in_array($oday, $GLOBALS['holidays']) and ($hour<$GLOBALS['cutOffTime'])) //working and less than 11 am
	{	$add=0;
	}
	elseif ($week<=3)//sun to wed 
	{	$add=4-$week;
	}
	elseif($week==4)//thu >11
	{	$add=1;
	}
	else// fri>11, full sat
	{	$add=$week+1;
	}
	echo "Nextday:". $add;
	$devdate= date('d', $timestamp) +$add;
	//echo "<br>Expected delivery date:" . $year . "-". $month. "-" . $devdate;
	return "CalculatedShippingDate". $year . "-". $month. "-" . $devdate;

    echo "<br><br>";
}
echo getShippingDate("23-11-2020", "11:30");

//tested-------------
echo "<br><br>tested#############<br>";
date_default_timezone_set('Asia/Kolkata');
$timestamp=strtotime('2014-04-17');

$usertime="13:30";//ordertime
$userdate="2014-04-17"; //date

$dat=$usertime . $userdate;

$d=strtotime($dat);
echo "Created date is " . date("Y-m-d H:i", $d);


//date based on query
$day=date('d', $timestamp);
$month=date('m', $timestamp);
$year=date('Y', $timestamp);

//order d
$oday= date('D', $timestamp);
$hour=date("H", $d); 
$week=date('w', $timestamp);

echo "<br/>Order Date:" . $year ."-" .$month . "-".  $day . "<br>";
echo "Order day: " .$oday ."<br/>";
echo "Order hour: " .$hour ."<br/>";
echo "Order week: " .$week ."<br/>";


if (!in_array($oday, $holidays) and ($hour<$cutOffTime)) //working and less than 11 am
{	$add=0;
}
elseif ($week<=3)//sun to wed 
{	$add=4-$week;
}
elseif($week==4)//thu >11
{	$add=1;
}
else// fri>11, full sat
{	$add=$week+1;
}
echo "Nextday:". $add;
$devdate= date('d', $timestamp) +$add;
echo "<br>Expected delivery date:" . $year . "-". $month. "-" . $devdate;


?>
