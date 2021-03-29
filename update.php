<?php
include("funcs.php");
$pdo =  db_connect();

$id = $_POST["id"];
$restaurantName = $_POST["restaurantName"];
$restaurantCost = $_POST["restaurantCost"];
$contents = $_POST["contents"];
// $updatedSysdate = $_POST["updatedSysdate"];

$sql = 'UPDATE sns_contents SET restaurantName=:restaurantName, restaurantCost=:restaurantCost, contents=:contents WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':restaurantName', $restaurantName, PDO::PARAM_STR);
$stmt->bindValue(':restaurantCost', $restaurantCost, PDO::PARAM_INT);
$stmt->bindValue(':contents',       $contents,       PDO::PARAM_STR);
$stmt->bindValue(':id',             $id,             PDO::PARAM_INT);
// $stmt->bindValue(':updatedSysdate', $updatedSysdate);
$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  header("Location: member.php");
  exit;

}



?>
