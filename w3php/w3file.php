<?php
echo "<h2>PHP FILE HANDLING</h2>";

echo readfile("webdictionary.txt"); //open and read file only
echo "<br><br>";

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!"); //open file with more option
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);
echo "<br><br>";

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!"); //open and read or die if file fail to open
// Output one character until end-of-file
while(!feof($myfile)) { //loop using end of file function
  echo fgets($myfile). "<br>"; //get a single line.
}                      //loop cause the fgets pointer to move to next line
fclose($myfile);
echo "<br><br>";

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while(!feof($myfile)) {
  echo fgetc($myfile); //After a call to the fgetc(), the file pointer moves to the next character.
}
fclose($myfile);echo "<br><br>";

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!"); //open and write
$txt = "John Doe\n";                                                //create new if file != exist
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);                                              //write into file
fclose($myfile);

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!"); //w will overwrite whtever in the file
$txt = "kamen\n";
fwrite($myfile, $txt);
$txt = "Rider\n";
fwrite($myfile, $txt);
fclose($myfile);    

$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");//appends will add new line in file
$txt = "Donald Trumpe\n";
fwrite($myfile, $txt);
$txt = "Saitama\n";
fwrite($myfile, $txt);
fclose($myfile);

//FILE UPLOAD
?>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data"> <!--specifies which content-type to use when submitting -->
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
