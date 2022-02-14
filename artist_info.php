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
  session_start();
  if (!isset($_SESSION['userid'])) {
    header('Location: login_form.php');
  } else {
    include "connectMySQL.php";
    $sql = "select * from myinfo where id='{$_SESSION['userid']}'";
    $result = mysqli_query($con, $sql);
    if (!mysqli_num_rows($result)) {
      header('Location: artist_info_insert_form.php');
    }
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $description  =  $row['description'];
    $websiteURL   =  $row['websiteURL'];
    $githubURL    =  $row['githubURL'];
    $facebookURL  =  $row['facebookURL'];
    $instagramURL =  $row['instagramURL'];
    $file_copied  =  $row['file_copied'];
  }
  ?>
  <?php include "navbar.php"; ?>
  <div class="artist_info_view">
    <div class="artist_name">
      <?= $name ?> 's Gallery
    </div>
    <div class="image_and_desc">
      <img src="./data/artist_info/<?= $file_copied ?>" alt="title_img">
      <p class="desc">
        <?= $description ?>
      </p>
    </div>
    <ul class="links">
      <li class="websiteURL">
        <a href="<?= $websiteURL ?>"><i class="fas fa-link"></i></a>
      </li>
      <li class="githubURL">
        <a href="<?= $githubURL ?>"><i class="fab fa-github"></i></a>
      </li>
      <li class="facebookURL">
        <a href="<?= $facebookURL ?>"><i class="fab fa-facebook"></i></a>
      </li>
      <li class="instagramURL">
        <a href="<?= $instagramURL ?>"><i class="fab fa-instagram"></i></a>
      </li>
    </ul>
    <ul class="btns">
      <li class="modify"><a href="#">수정</a></li>
      <li class="delete"><a href="#">삭제</a></li>
    </ul>
  </div>
  <?php include "sidebar.php"; ?>
</body>

</html>