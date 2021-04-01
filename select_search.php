<?php
$pdo =  db_connect();
// 表示の処理
$keyword = $_GET["keyword"]; 
$user_name = $_SESSION["u_name"];


$search_sql = $pdo->prepare(
  "SELECT id, u_name, study_theme, study_time, contents, DATE_FORMAT (`indate`, '%Y-%m-%d %H:%i') AS `posted_date` 
  FROM sns_contents 
  WHERE u_name LIKE :keyword OR study_theme LIKE :keyword OR contents LIKE :keyword 
  order by indate DESC");
$search_sql->bindValue(':keyword', "%{$keyword}%");
$search_status = $search_sql->execute();

$search_result="";

// 表示に問題があるとき
if($search_status==false) {
  $error = $search_sql->errorInfo();
  exit("ErrorQuery:".$error[2]);
// ないとき
} else {
    // 表示の処理↓
    while( $result = $search_sql->fetch(PDO::FETCH_ASSOC)){
    $search_result .= "<div class='shadow p-3 mb-5 bg-white rounded'>";
    // 全員表示
    $search_result .= "<span class='fw-bold'>".$result["u_name"]."　</span>";
    $search_result .= "＜".$result["study_theme"]."＞　";
    $search_result .= $result["study_time"]."分　";
    $search_result .= $result["posted_date"];
    $search_result .= "<div class='m-4'>";
    $search_result .= "<p>".$result["contents"]."</p>";
    $search_result .= "</div>";
    // 個別表示
    if($result["u_name"] == $_SESSION["u_name"]){
      $search_result .= '<div><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="今日の学習内容：'.$result["contents"].'" data-hashtags="KotuKotu" data-lang="ja" data-show-count="false">Tweet</a></div><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
      $search_result .= '<a href="u_view.php?id='.$result["id"].'" class="link">';
      $search_result .= "更新　";
      $search_result .= "</a>";
      $search_result .= '<a href="delete.php?id='.$result["id"].'" class="link">';
      $search_result .= "削除";
      $search_result .= "</a>";
    }  
    $search_result .= "</div>";
  }
}

?>
