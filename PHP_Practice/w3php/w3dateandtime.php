<?php
//type of way to display date
//capital Y display year in 4 digits
echo "Today is " . date("Y/m/d") . "<br>"; 
echo "Today is " . date("d.m.Y") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");

?>
<?php //can be use to auto update copyright ?>
&copy; 2010-<?php echo date("Y");?>

<?php //set time zone
date_default_timezone_set("America/New_York");
echo "<br>The time is " . date("H:i:sA");

//use mktime to create a date or time or both
//syntax mktime(hour, minute, second, month, day, year)
$d=mktime(11, 14, 54, 8, 12, 2014);
echo "<br>Created date is " . date("Y-m-d h:iA", $d);

//use strtotime() to create date from string
$d=strtotime("4.20pm Sept 15 2214");
echo "<BR>Created date is " . date("h:i:sa m/d/Y ", $d)."<BR>";

//various way to manipulate strtotime function
$d=strtotime("tomorrow"); //display 12 am of the next day
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday"); //display 12am of the day stated
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 day",); //display exactly day times 24 hours
echo date("Y-m-d h:i:sa", $d) . "<br>";

//display interval of date within 6 weeks
$startdate = strtotime("Saturday"); 
$enddate = strtotime("+6 weeks", $startdate);

while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);
}
?>
