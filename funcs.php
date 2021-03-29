<?php
//XSS対応関数
function h($val){
  return htmlspecialchars($val,ENT_QUOTES);
}

function loginCheck(){
  if(
    !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()
  ){
    header("Location: index.php?error=不正なページ遷移です");
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}

function db_connect(){
  try {
    $pdo = new PDO('mysql:dbname=php_01;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }
  return $pdo;
}

?>