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
  unlink('./data/artist_info/' . $_POST['file_dir']);

  $classification = htmlspecialchars($_POST['classification']);
  $description = htmlspecialchars($_POST['description']);
  $websiteURL = htmlspecialchars($_POST['websiteURL']);
  $githubURL = "";
  $facebookURL = "";
  $instagramURL = "";
  if (isset($_POST['githubURL'])) {
    $githubURL = htmlspecialchars($_POST['githubURL']);
  }
  if (isset($_POST['facebookURL'])) {
    $facebookURL = htmlspecialchars($_POST['facebookURL']);
  }
  if (isset($_POST['instagramURL'])) {
    $instagramURL = htmlspecialchars($_POST['instagramURL']);
  }

  $upload_dir = './data/artist_info/';

  $upfile_name  = $_FILES["upfile"]["name"]; // 이전 폼 name="upfile"에서 전송됨
  $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
  $upfile_type     = $_FILES["upfile"]["type"];
  $upfile_size     = $_FILES["upfile"]["size"];
  $upfile_error    = $_FILES["upfile"]["error"];

  if ($upfile_name && !$upfile_error) {
    $file = explode(".", $upfile_name); // explode는 문자열을 분할하여 배열로 저장 "."을 넣은 이유는 "."을 기준으로 분할하기 위해
    $file_name = $file[0];
    $file_ext  = $file[1];

    $new_file_name = date("Y_m_d_H_i_s");
    $copied_file_name = $new_file_name . "." . $file_ext;
    $uploaded_file = $upload_dir . $copied_file_name;

    if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
      echo ("
    <script>
    alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
    history.go(-1)
    </script>
    ");
      exit;
    }
  } else {
    $upfile_name      = "";
    $upfile_type      = "";
    $copied_file_name = "";
  }

  include "connectMySQL.php";
  $sql = "update myinfo set classification ='$classification', description = '$description', ";
  $sql .= "websiteURL = '$websiteURL', githubURL = '$githubURL', facebookURL = '$facebookURL', instagramURL = '$instagramURL', ";
  $sql .= "file_name ='$upfile_name', file_type = '$upfile_type', file_copied = '$copied_file_name'";
  $sql .= " where id='{$_POST['id']}'";
  mysqli_query($con, $sql);

  mysqli_close($con);                // DB 연결 끊기
  header('Location: index.php');
  ?>
</body>

</html>