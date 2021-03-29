<!DOCTYPE html>
<html lang="ja">
<head>
  <?php
    include('display/head.php')
  ?>
</head>

<body>
  <header>
    <div class="headerLogin">
      <div class="header pt-2 mb-4 d-flex align-items-center justify-content-center">
        <a href="http://localhost/index.php" class="h1 text-decoration-none color text-body">
          <img src="img/logo.png" alt="ロゴ写真" width="50px">
          KotuKotu
        </a>

      </div>
    </div>
  </header>

  <main class="col-6 offset-3">
    <div class='intro'>
      目標を達成したい方のための学習記録アプリです！<br>他に頑張っている人たちも掲示板で見ることができます！
    </div>
  

    <div class="heading h2">Login</div>
        <?php if(isset($_GET["error"])) {?>
          <div class="alert alert-danger mx-auto" role="alert" style="width: 80%;">
          <?php
            echo $_GET["error"];
          ?>
          </div>
        <?php }?>
      </div>
      <div class="loginForm">
        <form method="post" action="login_act.php" class="post">
          <p><input type="text" name="lid" placeholder="ログインID" class="input height50"></p>
          <p><input type="password" name="lpw" placeholder="パスワード" class="input height50"></p>
          <input type="submit" value="ログイン" class="btn btn-success">
        </form>
      </div>

      <p><button class="registrationButton">会員登録がまだの方</button></p> 

      <div class="registrationForm">
        <p class="heading h2">Register</p>
        <?php if(isset($_GET["error_register"])) {?>
          <div class="alert alert-danger mx-auto" role="alert" style="width: 80%;">
          <?php
            echo $_GET["error_register"];
          ?>
          </div>
        <?php }?>
        <form method="post" action="register.php" class="post">
          <p><input type="text" name="u_name" placeholder="ユーザ名" class="input height50"></p>
          <p><input type="text" name="lid" placeholder="ログインID" class="input height50"></p>
          <p><input type="password" name="lpw" placeholder="パスワード" class="input height50"></p>
          <input type="submit" value="会員登録" class="btn btn-success">
        </form>
      </div>
  </main>

  <footer>
    <?php
      include("display/footer.php");
    ?>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script>
    $(".registrationButton").on("click",function(){
      $(".registrationForm").slideDown(500);
    });
  </script>

</body>
</html>