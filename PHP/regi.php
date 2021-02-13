<?php
require_once("connection.php");

$regi_number = $_POST["regino"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST["username"];
$course = $_POST["regino"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$type = $_POST["type"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($regi_number, $lname, $fname, $username, $course, $email, $password, $cpassword, $type)) {
        if ($password == $cpassword) {
            $sql = "insert into user values( '$regi_number','$fname','$lname','$username','$course', '$email','$password','$type')";

            if (mysqli_query($conn, $sql)) {
                header("Location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Password not match";
        }
    }
}
