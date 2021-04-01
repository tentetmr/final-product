<?php
include("funcs.php");

$u_name = $_POST["u_name"];
$lid    = $_POST["lid"];
$lpw    = $_POST["lpw"];

$pdo =  db_connect();

if(empty($u_name)){
  header("Location: index.php?error_register=ユーザ名を入力してください");
  // lpwない時
} else if(empty($lid)){
  header("Location: index.php?error_register=ログインIDを入力してください");
} else if(empty($lpw)){
  header("Location: index.php?error_register=パスワードを入力してください");
} else{

  $sql = "INSERT INTO sns_user(id, u_name, u_id, u_pw, life_flg, indate )VALUES(NULL, :u_name, :lid, :lpw, 0, sysdate())";

  $stmt = $pdo->prepare($sql);

  $stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);
  $stmt->bindValue(':lid', $lid,    PDO::PARAM_STR);
  $stmt->bindValue(':lpw', $lpw,    PDO::PARAM_STR);

  $status = $stmt->execute();

  if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);

  }else{
    header("Location: registered.php");
    exit;
    
  }
}
?>