<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery!</title>
  <script src="https://kit.fontawesome.com/f32b22132c.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/global.css?after">
  <link rel="stylesheet" href="./css/navbar.css?after">
  <link rel="stylesheet" href="./css/member.css?after">
  <script src="./JS/main.js?after" defer></script>
</head>

<body>
  <?php include "navbar.php"; ?>
  <div class="member_form">
    <div class="title"><a href="index.php">Gallery website</a></div>
    <form action="member_insert.php" method="post" name="member_form">
      <ul>
        <li><input type="text" name="id" placeholder="아이디"></li>
        <li><a href="#" class="check_id" onclick="check_id()">아이디 확인</a></li>
        <li><input type="password" name="password" placeholder="비밀번호"></li>
        <li><input type="password" name="password_confirm" placeholder="비밀번호확인"></li>
        <li><input type="text" name="name" placeholder="이름"></li>
        <li><input type="text" name="email" placeholder="이메일"></li>
        <li>
          <a href="#" class="member_insert" onclick="check_input('insert')">가입신청</a>
          <a href="#" class="cancle" onclick="reset_form('insert')">취소</a>
        </li>
      </ul>
    </form>
  </div>
  <?php include "sidebar.php" ?>
</body>

</html>