<head>
  <meta charset="UTF-8">
</head>
<?php
session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

$classification = htmlspecialchars($_POST['classification']);
$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);

$regist_day = date('Y-m-d');
$upload_dir = './data/community/';

$upfile_name  = $_FILES["upfile"]["name"]; // 이전 폼 name="upfile"에서 전송됨
$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
$upfile_type     = $_FILES["upfile"]["type"];
$upfile_size     = $_FILES["upfile"]["size"];
$upfile_error    = $_FILES["upfile"]["error"];

// echo $upfile_name . '<br>';
// echo $upfile_tmp_name . '<br>';
// echo $upfile_type . '<br>';
// echo $upfile_size . '<br>';
// echo $upfile_error . '<br>';

if ($upfile_name && !$upfile_error) {
  $file = explode(".", $upfile_name); // explode는 문자열을 분할하여 배열로 저장 "."을 넣은 이유는 "."을 기준으로 분할하기 위해
  $file_name = $file[0];
  $file_ext  = $file[1];

  $new_file_name = date("Y_m_d_H_i_s");
  $copied_file_name = $new_file_name . "." . $file_ext;
  $uploaded_file = $upload_dir . $copied_file_name;

  if ($upfile_size  > 1000000) {
    echo ("
    <script>
    alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
    history.go(-1)
    </script>
    ");
    exit;
  }

  // print($upfile_tmp_name);
  // print($uploaded_file);

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
$sql = "insert into community (classification, id, name, title, content, regist_day, hit, file_name, file_type, file_copied) ";
$sql .= "values('$classification', '$userid', '$username', '$title', '$content', '$regist_day', 0, ";
$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행



mysqli_close($con);                // DB 연결 끊기
header('Location: community_form.php');
?>