<section class="sidebar">
  <ul class="sidebar_menu">
    <li><a href="member_modify_form.php">Account</a></li>
    <li><a href="community_form.php">Community</a></li>
    <?php
    if (isset($_SESSION['userid']))
      echo "<li><a href='artist_info.php?id={$_SESSION['userid']}'>MyInfo</a></li>";
    else
      echo "<li><a href='artist_info.php'>MyInfo</a></li>";
    ?>
    <?php
    if (isset($_SESSION['userid']))
      echo "<li><a href='logout.php'>Sign out</a></li>";
    ?>
  </ul>
  <button class="menuBtn" onclick="sidebarTog()">
    <i class="fas fa-bars"></i>
  </button>
</section>