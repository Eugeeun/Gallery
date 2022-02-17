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
  $id = $_GET['id'];
  include "connectMySQL.php";
  $sql = "select * from myinfo where id='{$id}'";
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
      <?php
      if ($githubURL != '') {
        echo "<li class='githubURL'>
        <a href='$githubURL'><i class='fab fa-github'></i></a>
      </li>";
      }
      if ($facebookURL != '') {
        echo "<li class='facebookURL'>
        <a href='$facebookURL'><i class='fab fa-facebook'></i></a>
      </li>";
      }
      if ($instagramURL != '') {
        echo "<li class='instagramURL'>
        <a href='$instagramURL'><i class='fab fa-instagram'></i></a>
      </li>";
      }
      ?>
    </ul>
    <?php
    if (isset($_SESSION['userid'])) {
      if ($_SESSION['userid'] == $id) {
    ?>
        <ul class="btns">
          <li class="modify"><button onclick="location.href='artist_info_modify_form.php?id=<?= $id ?>'">수정</button></li>
          <li class="delete"><button onclick="if(!confirm('정말로 삭제하시겠습니까?')){return false;} location.href='artist_info_delete.php?id=<?= $id ?>'">삭제</button></li>
        </ul>
    <?php
      }
    }
    ?>
  </div>
  <?php include "sidebar.php"; ?>
</body>

</html>