<!DOCTYPE html>
<html lang="ja">
<head>
</head>
  <?php
    include('display/head.php')
  ?>

<body>
  <header>
    <div class="headerLogin">
    <?php
    include("display/header.php");
    ?>
    </div>
  </header>

  <main class="col-6 offset-3">
    <div class="heading">Login</div>
      <div class="loginForm">
        <p>会員登録に成功しました！下記よりログインしてください</p>
        <form method="post" action="login_act.php" class="post">
          <p><input type="text" name="lid" placeholder="ログインID" class="input height50"></p>
          <p><input type="password" name="lpw" placeholder="パスワード" class="input height50"></p>
          <input type="submit" value="ログイン" class="inputButton height50">
        </form>
      </div>
  </main>

  <footer>
    <?php
      include("display/footer.php");
    ?>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(".loginButton").on("click",function(){
      $(".login").slideDown(500);
    });
    $(".registrationButton").on("click",function(){
      $(".registrationForm").slideDown(500);
    });
  </script>

</body>
</html>