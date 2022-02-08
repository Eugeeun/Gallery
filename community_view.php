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
  $userid = $_SESSION['userid'];

  $num  = $_GET["num"];
  $page  = $_GET["page"];

  include "connectMySQL.php";
  $sql = "select * from community where num=$num";
  $result = mysqli_query($con, $sql);

  $row = mysqli_fetch_array($result);
  $num         = $row["num"];
  $classification = $row["classification"];
  $id          = $row["id"];
  $name        = $row["name"];
  $title     = $row["title"];
  $regist_day  = $row["regist_day"];
  $hit         = $row["hit"];
  $file_name    = $row["file_name"];
  $file_type    = $row["file_type"];
  $file_copied  = $row["file_copied"];

  $content = $row['content'];
  // $content = str_replace(" ", "&nbsp;", $content);
  // $content = str_replace("\n", "<br>", $content);

  $new_hit = $hit + 1;
  $sql = "update community set hit=$new_hit where num=$num";
  mysqli_query($con, $sql);
  ?>
  <?php include "navbar.php"; ?>
  <div class="community_view">
    <div class="title"><a href="index.php">Gallery website</a></div>
    <ul class="view">
      <li>
        <span class="classification"><?= $classification ?></span>
        <span>|</span>
        <span class="title_article"><?= $title ?></span>
      </li>
      <li>
        <span class="loggedID">Author : <?= $name ?></span>
        <span>|</span>
        <span class="hit"><?= $hit ?> view</span>
      </li>
      <li>
        <img src="./data/<?= $file_copied ?>" alt="img" class="image">
        <p class="content"><?= $content ?></p>
      </li>
      <li class="btns">
        <button onclick="location.href='community_form.php?page=<?= $page ?>'">목록</button>
        <?php
        if ($userid === $id) {
        ?>
          <button onclick="location.href='community_modify_form.php?num<?= $num ?>&page=<?= $page ?>'">수정</button>
          <button onclick="location.href='community_delete.php?num<?= $num ?>&page=<? $page ?>'">삭제</button>
        <?php
        }
        ?>
      </li>

    </ul>
  </div>
  <?php include "sidebar.php"; ?>
</body>

</html>