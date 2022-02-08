<?php
session_start();
unset($_SESSION["userid"]); // $_SESSION["userid"]에 할당된 변수 제거
unset($_SESSION["username"]); // $_SESSION["username"]에 할당된 변수 제거
unset($_SESSION["userlevel"]); // $_SESSION["userlevel"]에 할당된 변수 제거

echo ("<script> location.href = 'index.php';</script> "); // 홈으로 이동