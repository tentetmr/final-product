<?php
  session_start();
  include("funcs.php");
  loginCheck();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <?php
    include('display/head.php')
  ?>
</head>
<body>
  <header class="mb-3">
    <?php
      include("display/header.php");
    ?>
    <?php
      include("display/navbar.php");
    ?>
  </header>
  <main>
    <!-- 投稿エリア -->
    <div class="container">
    </div>

    <div class="container ">
      <div class="row">
        <div class="col-md-4">
          <?php
            include('todo.php');
          ?>
          <div class="heading h2">学習グラフ</div>
          <canvas id="myChart" width="100%" height="60%" class="mb-5"></canvas>

        </div>

        <div class="col-md-8">
          <p class="heading h2">学習ログ</p>
          <?php if(isset($_GET["error_sns"])) {?>
            <div class="alert alert-danger mx-auto" role="alert" style="width: 80%;">
            <?php
              echo $_GET["error_sns"];
            ?>
            </div>
          <?php }?>

          <?php 
            include("select.php");
            if(!isset($_GET["keyword"])) {
          ?>

            <form method="POST" action="insert.php" class="post">
              <div><input type="text" name="restaurantName" placeholder="何をした？" class="form-control mx-auto mb-1" style="width: 90%;"></div>
              <div><input type="number" name="restaurantCost" min="1" placeholder="何分できた？" class="form-control mx-auto mb-1" style="width: 90%;"></div>
              <div><textarea name="contents" id="" cols="30" rows="5" placeholder="内容・学び" class="form-control mx-auto mb-1" style="width: 90%;"></textarea></div>
              <input type="submit" value="投稿" class="btn btn-success" style="width: 70%;">
            </form>
            <div class="postContents ">
          <?php 
            echo $view;          
          } else{?>
            <div class="h6">[検索結果]</div>
          <?php
            include("select_search.php");
            echo $search_result;
          }
          ?>
          
          <!-- 投稿表示エリア -->
          <script>
          let js_array = JSON.parse('<?php echo $php_json;?>');
          let js_arraytime = JSON.parse('<?php echo $php_jsontime;?>');
          // console.log(js_array);
          </script>
          </div>
          </div>
      </div>
    </div>

    <div class="container">
    </div>
  </main>
<!-- フッターエリア -->
<footer>
  <?php
    include("display/footer.php");
  ?>
  
</footer>
  <?php
    include("display/script.php");
  ?>
</body>
</html>