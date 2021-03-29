<?php
session_start();
include("funcs.php");

// if(
//   !isset($_POST["restaurantName"]) || $_POST["restaurantName"]=="" ||
//   !isset($_POST["restaurantCost"]) || $_POST["restaurantCost"]=="" ||
//   !isset($_POST["contents"]) || $_POST["contents"]==""
// ){
//   header("Location: member.php");
//   exit();
// }

$u_name = $_SESSION["u_name"];
$restaurantName = $_POST["restaurantName"];
$restaurantCost = $_POST["restaurantCost"];
$contents = $_POST["contents"];

$pdo =  db_connect();

if(empty($restaurantName)){
  header("Location: member.php?error_sns=学習項目を入力してください");
  // lpwない時
} else if(empty($restaurantCost)){
  header("Location: member.php?error_sns=学習時間を入力してください");
} else if(empty($contents)){
  header("Location: member.php?error_sns=内容・学びを入力してください");
} else{

  $sql = "INSERT INTO sns_contents(id, u_name, restaurantName, restaurantCost, contents, indate )VALUES(NULL, :a1, :a2, :a3, :a4, sysdate())";

  $stmt = $pdo->prepare($sql);

  $stmt->bindValue(':a1', $u_name, PDO::PARAM_STR);
  $stmt->bindValue(':a2', $restaurantName, PDO::PARAM_STR);
  $stmt->bindValue(':a3', $restaurantCost, PDO::PARAM_INT);
  $stmt->bindValue(':a4', $contents, PDO::PARAM_STR);
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

