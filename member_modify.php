<?php
$id = $_GET["id"]; // url에서 id를 받아옴

$password = $_POST["password"];
$name = $_POST["name"];
$email  = $_POST["email"];

include "connectMySQL.php";
$sql = "update members set password='$password', name='$name' , email='$email'";
$sql .= " where id='$id'";
mysqli_query($con, $sql);
mysqli_close($con);
session_start();
$_SESSION["username"] = $name;
header('Location: index.php');
