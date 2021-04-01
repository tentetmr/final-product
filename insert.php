<?php
session_start();
include("funcs.php");

$u_name = $_SESSION["u_name"];
$study_theme = $_POST["study_theme"];
$study_time = $_POST["study_time"];
$contents = $_POST["contents"];

$pdo =  db_connect();

if(empty($study_theme)){
  header("Location: member.php?error_sns=学習項目を入力してください");
  // lpwない時
} else if(empty($study_time)){
  header("Location: member.php?error_sns=学習時間を入力してください");
} else if(empty($contents)){
  header("Location: member.php?error_sns=内容・学びを入力してください");
} else{

  $sql = "INSERT INTO sns_contents(id, u_name, study_theme, study_time, contents, indate )VALUES(NULL, :u_name, :study_theme, :study_time, :contents, sysdate())";

  $stmt = $pdo->prepare($sql);

  $stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);
  $stmt->bindValue(':study_theme', $study_theme, PDO::PARAM_STR);
  $stmt->bindValue(':study_time', $study_time, PDO::PARAM_INT);
  $stmt->bindValue(':contents', $contents, PDO::PARAM_STR);
  $status = $stmt->execute();

  if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);

  }else{
    header("Location: member.php");
    exit;
  }
}
?>

