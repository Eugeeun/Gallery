<?php
include "connectMySQL.php";

$sql = "select * from community where num={$_GET['num']}";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$file_copied  = $row["file_copied"];
// echo $file_copied;
unlink('./data/community/' . $file_copied);

$sql = "
  delete from community
  where num ='{$_GET['num']}'
  ";
$result = mysqli_query($con, $sql);
if (!$result) {
  echo "error_community_delete";
  error_log(mysqli_errno($con));
} else {
  header('Location: community_form.php'); // 회원을 탈퇴했으면 로그아웃을 시켜줌
}
