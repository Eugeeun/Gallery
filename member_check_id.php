<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>gallery!</title>
  <link rel="stylesheet" href="./css/global.css?after">
  <link rel="stylesheet" href="./css/member.css?after">
</head>

<body>
  <p>
    <?php
    $id = $_GET["id"];
    if (!$id) {
      echo ("<li>아이디를 입력해 주세요!</li>");
    } else {
      include "connectMySQL.php";
      $sql = "select * from members where id='$id'";
      $result = mysqli_query($con, $sql);
      $num_record = mysqli_num_rows($result); // 중복되는지 확인
      if ($num_record) { // 1이상이라면 = true라면 중복임!
        echo "<li>" . $id . " 아이디는 중복됩니다.</li>";
        echo "<li>다른 아이디를 사용해 주세요!</li>";
      } else { // false라면 = 0이라면 중복되지 않음
        echo "<li>" . $id . " 아이디는 사용 가능합니다.</li>";
      }
      mysqli_close($con);
    }
    ?>
  </p>
  <div id="close">
    <a href="#" onclick="javascript:self.close()">닫기</a>
  </div>
</body>

</html>