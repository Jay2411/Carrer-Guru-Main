<?php      
$servername = "localhost";
$username = "name";
$email = "email";


//connection
$conn = new mysqli($servername, $username, $emaild);

//error
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }


//vaidation
$textErr = $emailErr = "";
$text = $email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["text"])) {
       $textErr = "Name is required";
     } else {
       $text = test_input($_POST["text"]);
       // check if name only contains letters and whitespace
       if (!preg_match("/^[a-zA-Z-' ]*$/",$text)) {
         $textErr = "Only letters and white space allowed";
       }
     }
if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
     }
   }
?>  