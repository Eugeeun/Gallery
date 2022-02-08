<?php
session_start();
$id  = $_POST["id"]; // $id에 post방식으로 전송되어온 id란 name을 가진 text를 할당
$password = $_POST["password"]; // $pass에 post방식으로 전송되어 온 pass란 name을 가진 password를 할당
include "connectMySQL.php";
$sql = "select * from members where id='$id'"; // sql문 작성
$result = mysqli_query($con, $sql); // 실행, 실패시 $result에 false할당
// 성공시 오브젝트 반환

$num_match = mysqli_num_rows($result); // 데이터의 총 개수를 숫자로 반환

if (!$num_match) { // 데이터의 개수가 0개라면 같은 아이디가 없다면
  echo ("<script>
window.alert('등록되지 않은 아이디입니다!')
history.go(-1) 
  </script> ");
  // history.go(-1) 는 이전 페이지로 이동하는 것임
} else { // 데이터의 개수가 1개가 아니라면 = 같은 아이디가 있다면
  $row = mysqli_fetch_array($result); // 배열을 하나씩 받아옴 (이미 id확인을 마친 상태임)
  $db_pass = $row["password"]; // db에서 비밀번호를 받아옴
  mysqli_close($con); // sql종료

  if ($password != $db_pass) { // 같지 않다면
    echo ("<script>
window.alert('비밀번호가 틀립니다!')
history.go(-1)
  </script>  ");
    exit;
  } else { // 같다면
    $_SESSION["userid"] = $row["id"]; // $_SESSION의 userid에 $row["id"]를 저장
    $_SESSION["username"] = $row["name"]; // $_SESSION의 username $row["name"]을 저장
    $_SESSION["userlevel"] = $row["level"]; // $_SESSION의 userlevel $row["level"]을 저장

    header('Location: index.php');
  }
}
