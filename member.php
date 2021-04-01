<?php
  session_start();
  include("funcs.php");
  loginCheck();
  // POSTした表示件数情報を受け取る
  if(isset($_POST['records-limit'])){
    $_SESSION['records-limit'] = $_POST['records-limit'];
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include('display/head.php') ?>
</head>
<body>
  <header class="mb-5">
    <?php include("display/header.php"); ?>
    <?php include("display/navbar.php"); ?>
  </header>
  <main>
    <div class="container ">
      <div class="row">
        <div class="col-md-4">
          <!-- Todo -->
          <?php include('todo.php'); ?>
          <!-- Graph -->
          <div class="heading h2">学習グラフ</div>
          <canvas id="myChart" width="100%" height="60%" class="mb-5"></canvas>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-7">
          <p class="heading h2">学習ログ</p>
          <!-- Error Alert -->
          <?php if(isset($_GET["error_sns"])) {?>
            <div class="alert alert-danger mx-auto" role="alert" style="width: 80%;">
              <?php echo $_GET["error_sns"]; ?>
            </div>
          <?php }?>

          <?php 
            include("select.php");
            if(!isset($_GET["keyword"])) {
          ?>
            <!-- 投稿フォーム -->
            <form method="POST" action="insert.php" class="post">
              <div><input type="text" name="study_theme" placeholder="何をした？" class="form-control mx-auto mb-1" style="width: 90%;"></div>
              <div><input type="number" name="study_time" min="1" placeholder="何分できた？" class="form-control mx-auto mb-1" style="width: 90%;"></div>
              <div><textarea name="contents" id="" cols="30" rows="5" placeholder="内容・学び" class="form-control mx-auto mb-3" style="width: 90%;"></textarea></div>
              <input type="submit" value="投稿" class="btn btn-success" style="width: 70%;">
            </form>
            <!-- 表示件数 -->
            <form action="member.php" method="post" class="mr-0 mb-1">
              <select name="records-limit" id="records-limit" class="form-control" style="width:fit-content;">
                  <option disabled selected>表示件数</option>
                  <?php foreach([5,10,15] as $limit) : ?>
                    <option 
                      <?php if(isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
                      value="<?= $limit; ?>"
                    >
                      <?= $limit; ?>
                    </option>
                  <?php endforeach; ?>
              </select>
            </form>
            <!-- 投稿表示 -->
            <div class="postContents ">
              <?php 
                echo $view;
              ?>
              <!-- ページネーション -->
              <nav aria-label="Page navigation example mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                      <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $totalPages; $i++ ): ?>
                    <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                      <a class="page-link" href="member.php?page=<?= $i; ?>"> <?= $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($page >= $totalPages) { echo 'disabled'; } ?>">
                      <a class="page-link" href="<?php if($page >= $totalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                    </li>
                </ul>
              </nav>
            <!-- 検索表示 -->
            <?php } else{?>
            <div class="h6">[検索結果]</div>
            <?php
              include("select_search.php");
              echo $search_result;
            }?>
            
            <script>
              let js_array = JSON.parse('<?php echo $php_json;?>');
              let js_arraytime = JSON.parse('<?php echo $php_jsontime;?>');
            </script>
        </div>
      </div>
    </div>

  </main>
<!-- フッターエリア -->
  <footer>
    <?php include("display/footer.php"); ?>    
  </footer>
  <?php include("display/script.php"); ?>
</body>
</html>