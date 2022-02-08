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
  <link rel="stylesheet" href="./css/community.css?after" type="text/css">
  <title>Gallery!</title>
</head>

<body>
  <?php
  session_start();
  $username = $_SESSION["username"];
  ?>
  <?php include "navbar.php"; ?>
  <div class="community_insert_form">
    <div class="title"><a href="index.php">Gallery website</a></div>
    <form action="community_insert.php" method="post" name="community_insert_form" enctype="multipart/form-data">
      <ul>
        <li>
          <select name="classification" class="classification">
            <option value="자유">자유</option>
            <option value="공지">공지</option>
          </select>
          <span class="loggedID">Author : <?= $username ?></span>
        </li>
        <li><input type="text" name="title" placeholder="제목"></li>
        <li><textarea name="content" rows="10" placeholder="내용"></textarea></li>
        <li><input type="file" name="upfile" class="upfile"></li>
        <li>
          <a href="#" class="community_insert" onclick="community_check_input()">글쓰기</a>
          <a href="#" class="cancle" onclick="community_reset()">취소</a>
        </li>
      </ul>
    </form>
  </div>
  <?php include "sidebar.php" ?>
</body>

</html>