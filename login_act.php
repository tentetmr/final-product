<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];


include("funcs.php");
$pdo =  db_connect();

// u_id u_pw両方がマッチする人がいるか？
$sql = "SELECT * FROM sns_user WHERE u_id=:lid AND u_pw=:lpw";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

// lidない時
if(empty($lid)){
  header("Location: index.php?error=ログインIDを入力してください");
  // lpwない時
} else if(empty($lpw)){
  header("Location: index.php?error=パスワードを入力してください");
} else{

  $val = $stmt->fetch();
  // Correct lid and lpw
  if( $val["id"] != "" ){
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["u_name"]   = $val['u_name'];
    header("Location: member.php");
  // Wrong lid or lpw
  }else{

    header("Location: index.php?error=ログインID/パスワードが異なります");
  }
  exit();  
}
?>