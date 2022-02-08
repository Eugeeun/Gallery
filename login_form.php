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
  <link rel="stylesheet" href="./css/login.css?after">
  <script src="./JS/main.js?after" defer></script>
</head>

<body>
  <?php include "navbar.php"; ?>
  <div class="login_form">
    <div class="title"><a href="index.php">Gallery website</a></div>
    <form action="login.php" method="post" name="login_form">
      <ul>
        <li><input type="text" name="id" placeholder="아이디"></li>
        <li><input type="password" name="password" id="password" placeholder="비밀번호"></li>
        <li><a href="#" class="loginBtn" onclick="login_check_input()">로그인</a></li>
        <li><a href="member_form.php" class="insertMemberBtn">회원가입</a></li>
      </ul>
    </form>
  </div>
  <?php include "sidebar.php" ?>
</body>

</html>