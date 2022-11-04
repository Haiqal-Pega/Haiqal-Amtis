<!DOCTYPE html>
<html>
<body>

<?php
$myXMLData = //assumed xml file
"<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>";

$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object"); //read XML data from a string
print_r($xml); //displaying content in xml in array-like display with the tags being the indexes in array
echo '<br>';

//Error Handling
libxml_use_internal_errors(true);// to retrieve all XML errors
$myXMLData = //XML data with errors
"<?xml version='1.0' encoding='UTF-8'?>
<document>
<user>John Doe</wronguser> 
<email>john@example.com</wrongemail>
</document>";

$xml = simplexml_load_string($myXMLData);
if ($xml === false) {
  echo "Failed loading XML: ";
  foreach(libxml_get_errors() as $error) {
    echo "<br>", $error->message;
  }
} else {
  print_r($xml);
}
?>

</body>
</html>