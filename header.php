<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
/* $_SESSION의 userid가 설정되면 $userid에 $_SESSION의 userid값을 넣음 */
else $userid = ""; // 없으면 빈 공간
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
?>

<section class="titleandInfo">
  <div class="main_title">
    <span>
      Gallery Website
    </span>
  </div>
  <?php
  if (!$userid) {
  ?>
    <div id="log_in">
      <a href="login_form.php">Sign up</a>
    </div>
  <?php
  } else {
  ?>
    <div id="logged">
      <span><?= $username ?>, Welcome!</span>
      <a href="logout.php">Sign out</a>
    </div>
  <?php
  }
  ?>
</section>