<?php
  session_start();
  include("funcs.php");
  loginCheck();

$id = $_GET["id"];
$pdo =  db_connect();

$sql = "SELECT * FROM sns_contents WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status==false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
  $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include('display/head.php') ?>
</head>
<body>
  <div class="container">
    <header>
      <?php  include("display/header.php"); ?>
      <?php include("display/navbar.php"); ?>
    </header>
    <main class="col-6 offset-3">
      <form method="post" action="update.php" class="post">
          <p class="heading h2">Edit</p>
          <p><input type="text" name="study_theme" value="<?=$row["study_theme"]?>" placeholder="何をした？" class="input height50"></p>
          <p><input type="number" name="study_time" value="<?=$row["study_time"]?>" placeholder="何分できた？" class="input height50"></p>
          <p><textarea name="contents" id="" cols="30" rows="10" class="input height200" placeholder="内容・学び"><?=$row["contents"]?></textarea></p>
          <input type="hidden" name="updatedSysdate" value="<?=$row["updatedSysdate"]?>">
          <input type="hidden" name="id" value="<?=$row["id"]?>">
          <input type="submit" value="修正" class="btn btn-success"><br>
      </form>
        <button type="button" class="btn btn-outline-secondary btn-sm mb-3" onclick="location.href='member.php'">もどる</button>
    </main>
    <footer>
      <?php include("display/footer.php"); ?>
    </footer>
    <?php include("display/script.php"); ?>
  </div>
</body>
</html>
