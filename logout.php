<?php
session_start();
unset($_SESSION["userid"]); // $_SESSION["userid"]에 할당된 변수 제거
unset($_SESSION["username"]); // $_SESSION["username"]에 할당된 변수 제거
unset($_SESSION["userlevel"]); // $_SESSION["userlevel"]에 할당된 변수 제거

header('Location: index.php'); // 홈으로 이동