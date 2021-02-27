<?php
session_start();
require_once("connection.php");

if (isset($_POST["login"], $_POST["regiNo"], $_POST["password"])) {
    $regiNo = $_POST["regiNo"];
    $password = $_POST["password"];
	if (isset($_POST['remember'])) {
        $remember = $_POST["remember"];
    } else {
        $remember = false;
    }
}

$sql = "select * from user where Regi_Number = '$regiNo' and Password = '$password'";

$result = mysqli_query($conn, $sql);
echo mysqli_num_rows($result) . "\n";
if (mysqli_num_rows($result) == 1) {
    if (isset($remember)) {
        $_SESSION['name'] = $regiNo;
    } else {
        session_unset();
    }
    echo "seccess";
    echo $_SESSION['name'];
} else {
    echo "fail";
}
