<?php


$cutOffTime = "11";
$holidays = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday"];

//function getShippingDate($orderDate, $oderTime) {
//$date - Y-m-d format
function getShippingDate($orderDate, $oderTime) {
	$orderDate=getdate(date("U"));
	$orderDate=gettime(date("U"));
    echo $orderDate . " Time:" .$oderTime;
	//return "CalculatedShippingDate";
}

/* $mydate=getdate(date("U"));
echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]" . "<br><br>";

echo getShippingDate("23-11-2020", "09:30"); */

date_default_timezone_set('Asia/Kolkata');
$odate=date("Y-m-d");

$oday= date("l");
$hour=date("H");
$week=date('w');

echo "Order Date" . $odate . "<br>";
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
echo $add;
$devdate= date("d") +$add;
echo "Expected delivery date:" . date("Y") . "-". date("m"). "-" . $devdate;
	/*else{
		$devdate= date("d") +1; //next date
		if()
		
    }
}
else {
    
}*/
	

/* 
if (in_array($oday, $holidays))
  {
    echo "Holiday";
    $nextdevday=($week+1)%7;
	echo $nextdevday;
	if ($oday==$holidays[$nextdevday] || $oday==$holidays[$nextdevday]){
		if($hour<$cutOffTime)
			$exp=$oday;//correct
		else
			$exp=
	}
  }
else
  {
  echo "Match not found";
  } */
/* if($hour<11 and ($oday==$holidays)) {
    echo "Expected delivery date:" . $odate;
	echo "Expected delivery day:" . $oday+1;
}
else{
  //next day
	$devd= date("d") +1;
	//echo $devd;
	echo "Expected delivery date:" . date("Y") . "-". date("m"). "-" . $devd;
}
	 */
    







?>
