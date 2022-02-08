<?php
include "connectMySQL.php";
print($_POST['userid']);
$sql = "
  delete from members
  where id ='{$_POST['userid']}'
  ";
$result = mysqli_query($con, $sql);
if (!$result) {
  echo "error_member_delete";
  error_log(mysqli_errno($con));
} else {
  header('Location: logout.php'); // 회원을 탈퇴했으면 로그아웃을 시켜줌
}
