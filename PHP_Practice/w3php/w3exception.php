<?php
echo "<h2>PHP Exception</h2>";

function divide($dividend, $divisor) {
  if($divisor == 0) {
    throw new Exception("Division by zero");
  }
  return $dividend / $divisor;
}
echo divide(5, 0); 
echo "<br>";

//throw execption in try..catch stmt
function divide1($dividend, $divisor) {
    if($divisor == 0) {
      throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
  }
  
  try {
    echo divide1(5, 0);
  } catch(Exception $e) {
    echo "Unable to divide.";
  }
echo "<br>";

//try..catch...finallt stmt
//finally section will execute no matter exception caught or not
//catch can be optional
function divide2($dividend, $divisor) {
    if($divisor == 0) {
      throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
  }
  
  try {
    echo divide2(5, 0);
  } catch(Exception $e) {
    echo "Unable to divide. ";
  } finally {
    echo "Process complete.";
  }
echo "<br>";

//The Exception Object  
function divide3($dividend, $divisor) {
    if($divisor == 0) {
      throw new Exception("Division by zero", 1);
    }
    return $dividend / $divisor;
  }
  
  try {
    echo divide3(5, 0);
  } catch(Exception $ex) {
    $code = $ex->getCode();
    $message = $ex->getMessage();
    $file = $ex->getFile();
    $line = $ex->getLine();
    echo "Exception thrown in $file on line $line: [Code $code]
    $message";
  }

?>