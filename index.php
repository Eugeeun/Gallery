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
      <li>
        <img src="images/img1.jpg" alt="">
        <div class="info">
          <span class="name">Eugene</span>
          <a href="#" class="link">visit website</a>
        </div>
      </li>
      <li>
        <img src="images/img2.jpg" alt="">
        <div class="info">
          <span class="name">Geeun</span>
          <a href="#" class="link">visit website</a>
        </div>
      </li>
      <li>
        <img src="images/img3.jpg" alt="">
        <div class="info">
          <span class="name">Geeun</span>
          <a href="#" class="link">visit website</a>
        </div>
      </li>
      <li>
        <img src="images/img4.jpg" alt="">
        <div class="info">
          <span class="name">Gerrard</span>
          <a href="#" class="link">visit website</a>
        </div>
      </li>
      <li>
        <img src="images/img5.jpg" alt="">
        <div class="info">
          <span class="name">Lampard</span>
          <a href="#" class="link">visit website</a>
        </div>
      </li>
      <li>
        <img src="images/img6.jpg" alt="">
        <div class="info">
          <span class="name">Scholes</span>
          <a href="#" class="link">visit website</a>
        </div>
      </li>
      <li>
        <img src="images/img7.jpg" alt="">
        <div class="info">
          <span class="name">Ronaldo</span>
          <a href="#" class="link">visit website</a>
        </div>
      </li>
      <li>
        <img src="images/img8.jpg" alt="">
        <div class="info">
          <span class="name">Kaka</span>
          <a href="#" class="link">visit website</a>
        </div>
      </li>
      <li>
        <img src="images/img9.jpg" alt="">
        <div class="info">
          <span class="name">Bale</span>
          <a href="#" class="link">visit website</a>
        </div>
      </li>
    </ul>
  </section>
  <?php include "sidebar.php" ?>
</body>

</html>