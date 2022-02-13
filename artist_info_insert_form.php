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
  <link rel="stylesheet" href="./css/artist_info.css?after" type="text/css">
  <title>Gallery</title>
</head>

<body>
  <?php
  session_start();
  $username = $_SESSION["username"];
  ?>
  <?php include "navbar.php"; ?>
  <div class="artist_info_insert_form">
    <div class="title"><a href="index.php">Gallery website</a></div>
    <form action="artist_info_insert.php" method="post" name="artist_info_insert_form" enctype="multipart/form-data">
      <ul class="artist_info">
        <li>
          <select name="classification" class="classification">
            <option value="인물">인물</option>
            <option value="동물">동물</option>
            <option value="풍경">풍경</option>
            <option value="그림">그림</option>
          </select>
          <input type="file" name="upfile" class="upfile">
        </li>
        <li><textarea name="content" rows="10" placeholder="소개"></textarea></li>
        <li>
          <i class="fas fa-link"></i>
          <input type="text" name="websiteURL" placeholder="웹사이트 주소">
        </li>
        <li>
          <i class="fab fa-github"></i>
          <input type="text" name="githubURL" placeholder="깃허브 주소">
        </li>
        <li>
          <i class="fab fa-facebook"></i>
          <input type="text" name="facebookURL" placeholder="페이스북 주소">
        </li>
        <li>
          <i class="fab fa-instagram"></i>
          <input type="text" name="instagramURL" placeholder="인스타그램 주소">
        </li>
        <li>
          <a href="#" class="artist_info_insert" onclick="artist_check_input()">등록</a>
          <a href="#" class="cancle" onclick="artist_reset()">취소</a>
        </li>
      </ul>
    </form>
  </div>
  <?php include "sidebar.php" ?>
</body>

</html>