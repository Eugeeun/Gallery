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
  <link rel="stylesheet" href="./css/lobby.css?after" type="text/css">
  <title>Gallery!</title>
</head>

<body>
  <?php include "navbar.php" ?>
  <?php include "header.php"; ?>
  <section class="category">
    <ul class="items">
      <li>All</li>
      <li>Human</li>
      <li>Animal</li>
      <li>Nature</li>
      <li>Painting</li>
    </ul>
  </section>
  <section class="contents">
    <ul class="contentlist">
      <?php
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;

      include "connectMySQL.php";
      $sql = "select  * from myinfo order by num asc";
      $result = mysqli_query($con, $sql);
      $total_record = mysqli_num_rows($result);

      $scale = 1;

      // 전체 페이지 수($total_page) 계산
      if ($total_record % $scale == 0)
        $total_page = floor($total_record / $scale);
      else
        $total_page = floor($total_record / $scale) + 1;

      // 표시할 페이지($page)에 따라 $start 계산 
      $start = ($page - 1) * $scale;

      $number = $total_record - $start;

      for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
        mysqli_data_seek($result, $i);
        // 가져올 레코드로 위치(포인터) 이동
        $row = mysqli_fetch_array($result);
        // 하나의 레코드 가져오기
        $classification = $row["classification"];
        $id = $row['id'];
        $name        = $row["name"];
        $websiteURL  = $row['websiteURL'];
        $file_image = $row['file_copied'];
      ?>
        <li>
          <a href="artist_info.php?id=<?= $id ?>">
            <img src="./data/artist_info/<?= $file_image ?>" alt="title_img">
          </a>
          <div class="info">
            <span class="name"><?= $name ?></span>
            <a href="https://<?= $websiteURL ?>" class="link">visit website</a>
          </div>
        </li>
      <?php
      }
      mysqli_close($con);
      ?>
    </ul>
    </ul>
    <ul id="page_num">
      <?php
      if ($total_page >= 2 && $page >= 2) {
        $new_page = $page - 1;
        echo "<li class='page_link'><a href='index.php?page=$new_page'>이전</a> </li>";
      } else
        echo "<li>&nbsp;</li>";

      // 게시판 목록 하단에 페이지 링크 번호 출력
      for ($i = 1; $i <= $total_page; $i++) {
        if ($page == $i)     // 현재 페이지 번호 링크 안함
        {
          echo "<li class='page_link selected'><b> $i </b></li>";
        } else {
          echo "<li class='page_link'><a href='index.php?page=$i'> $i </a><li>";
        }
      }
      if ($total_page >= 2 && $page != $total_page) {
        $new_page = $page + 1;
        echo "<li class='page_link'> <a href='index.php?page=$new_page'>다음</a> </li>";
      } else
        echo "<li>&nbsp;</li>";
      ?>
    </ul>
  </section>
  <?php include "sidebar.php" ?>
</body>

</html>