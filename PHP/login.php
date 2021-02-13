<?php

require_once("connection.php");

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select count(Username) from user where username = '{$username}' and password = '{$password}'";

    $result = mysqli_query($conn, $sql);
    echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) == 1) {
        echo "seccess";
    } else {
        echo "fail";
    }
}
