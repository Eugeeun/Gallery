<?php
include "connectMySQL.php";

$sql = "select * from myinfo where id='{$_GET['id']}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$file_copied  = $row["file_copied"];
// echo $file_copied;
unlink('./data/artist_info/' . $file_copied);

$sql = "
  delete from myinfo
  where id='{$_GET['id']}'
  ";
$result = mysqli_query($con, $sql);
if (!$result) {
  echo "error_artist_info_delete";
  error_log(mysqli_errno($con));
} else {
  header('Location: index.php');
}
