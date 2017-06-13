<?php



 $path = 'data.txt';
 if (isset($_POST['surname']) && isset($_POST['givenname']) && isset($_POST['date'])
 	&& isset($_POST['email']) && isset($_POST['tours']) && isset($_POST['time'])) {
    $fh = fopen($path,"a+");
    $string = $_POST['surname'].' - '.$_POST['givenname'];
    fwrite($fh,$string); // Write information to the file
    fclose($fh); // Close the file
 }
?>

<!-- ******************  PHP *************** -->
<?php

$surnameErr = $givennameErr = $emailErr = $dateErr = $timeErr = $tourErr= "";
$surname = $givenname = $email = $date = $time = $tour = "";

$surnameErr = $givennameErr = "";
$surname = $givenname = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["surname"])) {
    $surnameErr = "Surname is required";
  } else {
    $surname = test_input($_POST["surname"]);
   // check if name only contains letters and whitespace -->
    if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
      $surnameErr = "Only letters and white space allowed"; 
    }
  }

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["givenname"])) {
    $givennameErr = "givenname is required";
  } else {
    $givenname = test_input($_POST["givenname"]);
   // check if name only contains letters and whitespace -->
    if (!preg_match("/^[a-zA-Z ]*$/",$givenname)) {
      $givennameErr = "Only letters and white space allowed"; 
    }
  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>