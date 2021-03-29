<?php
include("funcs.php");
$id = $_GET["id"];

$pdo = db_connect();

$sql = 'DELETE FROM sns_contents WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  header("Location: member.php");
  exit;

}



?>
