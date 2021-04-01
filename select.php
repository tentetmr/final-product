<?php

$pdo =  db_connect();
// 表示の処理
$user_name = $_SESSION["u_name"];

// Dynamic limit
// 三項演算子
$limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;

// Get total records
$sql = $pdo->query("SELECT count(id) AS id FROM sns_contents")->fetchAll();
$allRecords = $sql[0]['id'];
  
// Calculate total pages
$totalPages = ceil($allRecords / $limit);

$limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;

// Current pagination page number
$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;

// Offset
$paginationStart = ($page - 1) * $limit;

// Limit query
$stmt = $pdo->prepare("SELECT id, u_name, study_theme, study_time, contents, DATE_FORMAT (`indate`, '%Y-%m-%d %H:%i') AS `posted_date` FROM sns_contents order by indate DESC LIMIT $paginationStart, $limit");



$status = $stmt->execute();

$graphdata = $pdo->prepare(
  "SELECT `u_name` AS `id`, DATE_FORMAT (`indate`, '%Y-%m-%d') AS `time`, SUM(`study_time`) AS `sum` FROM `sns_contents` WHERE u_name = '$user_name' AND (`indate` BETWEEN DATE_SUB(curdate(), interval 10 day) AND DATE_ADD(curdate(), interval 1 day)) GROUP BY DATE_FORMAT(`indate`, '%Y-%m-%d')"
);
$statusdata = $graphdata->execute();

$view="";

$viewdate=[];
$viewtime=[];

// 表示に問題があるとき
if($status==false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
// ないとき
} else {
    // 表示の処理↓
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<div class='shadow p-3 mb-5 bg-white rounded'>";
    // 全員表示
    $view .= "<span class='fw-bold'>".$result["u_name"]."　</span>";
    $view .= "＜".$result["study_theme"]."＞　";
    $view .= $result["study_time"]."分　";
    $view .= $result["posted_date"];
    $view .= "<div class='m-4'>";
    $view .= "<p>".$result["contents"]."</p>";
    $view .= "</div>";
    // 個別表示
    if($result["u_name"] == $_SESSION["u_name"]){
      $view .= '<div><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="今日の学習内容：'.$result["contents"].'" data-hashtags="KotuKotu" data-lang="ja" data-show-count="false">Tweet</a></div><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
      $view .= '<a href="u_view.php?id='.$result["id"].'" class="link">';
      $view .= "更新　";
      $view .= "</a>";
      $view .= '<a href="delete.php?id='.$result["id"].'" class="link">';
      $view .= "削除";
      $view .= "</a>";
    }  
    $view .= "</div>";
  }
}

// グラフ処理
// グラフデータに問題がある時
if($statusdata==false) {
  $error = $graphdata->errorInfo();
  exit("ErrorQuery:".$error[2]);
// ない時
} else {
  // グラフ配列の処理
  while( $resultdata = $graphdata->fetch(PDO::FETCH_ASSOC)){
    // 日にちの配列
    array_push($viewdate,$resultdata["time"]);
    // 勉強時間の配列
    array_push($viewtime,$resultdata["sum"]);
    }
    
  }
// }
  
$php_json = json_encode($viewdate);
$php_jsontime = json_encode($viewtime);

?>
