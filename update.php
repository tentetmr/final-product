<?php
include("funcs.php");
$pdo =  db_connect();

$id = $_POST["id"];
$study_theme = $_POST["study_theme"];
$study_time = $_POST["study_time"];
$contents = $_POST["contents"];

$sql = 'UPDATE sns_contents SET study_theme=:study_theme, study_time=:study_time, contents=:contents WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':study_theme', $study_theme, PDO::PARAM_STR);
$stmt->bindValue(':study_time',  $study_time,  PDO::PARAM_INT);
$stmt->bindValue(':contents',    $contents,    PDO::PARAM_STR);
$stmt->bindValue(':id',          $id,          PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  header("Location: member.php");
  exit;

}



?>
