<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  }
  ?>
</body>

</html>