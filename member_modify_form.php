<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./JS/main.js?after" defer></script>
  <script src="https://kit.fontawesome.com/f32b22132c.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/global.css?after" type="text/css">
  <link rel="stylesheet" href="./css/navbar.css?after" type="text/css">
  <link rel="stylesheet" href="./css/member.css?after" type="text/css">
  <title>Gallery!</title>
</head>

<body>
  <!-- 먼저 로그인이 되어있지 않다면 로그인 화면으로 보내버림 -->
  <?php
  session_start();
  if (!isset($_SESSION["userid"])) {
    header('Location: login_form.php');
    return;
  } else {
    include "connectMySQL.php";
    $userid = $_SESSION["userid"];
    $username = $_SESSION["username"];
    $sql    = "select * from members where id='$userid'"; // sql입력
    $result = mysqli_query($con, $sql); // sql문 실행
    $row    = mysqli_fetch_array($result); // 배열을 하나씩 받아옴

    $password = $row["password"]; // 비밀번호를 받아옴
    $name = $row["name"]; // 이름을 받아옴
    $email = $row["email"]; // 이메일을 받아옴
    mysqli_close($con);
  }
  ?>
  <?php include "navbar.php"; ?>
  <div class="member_form">
    <div class="title"><a href="index.php">Gallery website</a></div>
    <form action="member_modify.php?id=<?= $userid ?>" method="post" name="member_form">
      <ul>
        <li><span class="loggedID">아이디 : <?= $userid ?></span></li>
        <li><input type="password" name="password" placeholder="비밀번호"></li>
        <li><input type="password" name="password_confirm" placeholder="비밀번호확인"></li>
        <li><input type="text" name="name" placeholder="이름"></li>
        <li><input type="text" name="email" placeholder="이메일"></li>
        <li>
          <a href="#" class="member_modify" onclick="check_input('modify')">정보수정</a>
          <a href="#" class="cancle" onclick="reset_form('modify')">취소</a>
        </li>
      </ul>
    </form>
    <form action="member_delete.php" method="post" onsubmit="if(!confirm('정말로 탈퇴하시겠습니까?')){return false;}">
      <input type="hidden" name="userid" value="<?= $userid ?>">
      <button>회원탈퇴</button>
    </form>
  </div>
  <?php include "sidebar.php" ?>
</body>

</html>