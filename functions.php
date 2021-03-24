<?php

//require "config.php";

$cutOffTime = "11";
$holidays = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday"];

//$date - Y-m-d format
function getShippingDate($orderDate, $oderTime) {

	date_default_timezone_set('Asia/Kolkata');
	$timestamp=strtotime($orderDate); 
	$usertime=$oderTime;//ordertime
	$userdate=$orderDate; //date

/* 	echo "Time: ". $usertime;
	echo "Date: ". $userdate ; */

	$dat1=$usertime . $userdate;

	$d1=strtotime($dat1);
	/* echo "<br/>Created date is " . date("Y-m-d H:i", $d1); */

	//date based on query d-m-y
	$day=date('d', $timestamp); //dd of date
	$month=date('m', $timestamp); //month
	$year=date('Y', $timestamp); //yy

	//order d
	$oday= date('D', $timestamp); //orderda
	$hour=date("H", $d1); //order hour
	$week=date('w', $timestamp); //week day

	echo "<br/>Order Date:" . $year ."-" .$month . "-".  $day . "<br>";
	echo "Order day: " .$oday ."<br/>"; //order day
	echo "Order hour: " .$hour ."<br/>"; //order hour
	echo "Order week: " .$week ."<br/>"; //order week

	if (!in_array($oday, $GLOBALS['holidays']) and ($hour< $GLOBALS['cutOffTime'])) //working and less than 11 am
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

   /* 	echo "Nextday:". $add; */
	$devdate= date('d', $timestamp) +$add;  //delivery date
	
	return "CalculatedShippingDate". $year . "-". $month. "-" . $devdate;
}

//function call based on user query
echo getShippingDate("23-11-2020", "11:30");


?>
