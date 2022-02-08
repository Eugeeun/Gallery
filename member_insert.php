<?php
$id  = $_POST["id"];
$password = $_POST["password"];
$name = $_POST["name"];
$email  = $_POST["email"];
// post방식으로 넘어온 정보들을 저장

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

include "connectMySQL.php";

$sql = "insert into members(id, password, name, email, regist_day, level, point) ";
$sql .= "values('$id', '$password', '$name', '$email', '$regist_day', 2, 0)";

mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
mysqli_close($con);

header('Location: index.php');
// 홈으로 이동