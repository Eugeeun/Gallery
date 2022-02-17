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
  <title>Gallery!</title>
</head>

<body>
  <?php
  include "connectMySQL.php";
  $id = $_GET['id'];
  $sql = "select * from myinfo where id = '$id'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  ?>
  <?php include "navbar.php"; ?>
  <div class="artist_info_insert_form">
    <div class="title"><a href="index.php">Gallery website</a></div>
    <form action="artist_info_modify.php" method="post" name="artist_info_insert_form" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $id ?>">
      <input type="hidden" name="file_dir" value="<?= $row['file_copied'] ?>">
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
        <li><textarea name="description" rows="10" placeholder="소개"><?= $row['description'] ?></textarea></li>
        <li>
          <i class="fas fa-link"></i>
          <input type="text" name="websiteURL" value="<?= $row['websiteURL'] ?>">
        </li>
        <li>
          <i class="fab fa-github"></i>
          <input type="text" name="githubURL" value="<?= $row['githubURL'] ?>">
        </li>
        <li>
          <i class="fab fa-facebook"></i>
          <input type="text" name="facebookURL" value="<?= $row['facebookURL'] ?>">
        </li>
        <li>
          <i class="fab fa-instagram"></i>
          <input type="text" name="instagramURL" value="<?= $row['instagramURL'] ?>">
        </li>
        <li>
          <a href="#" class="artist_info_insert" onclick="artist_check_input()">수정</a>
          <a href="#" class="cancle" onclick="artist_reset()">취소</a>
        </li>
      </ul>
    </form>
  </div>
  <?php include "sidebar.php" ?>
</body>

</html>