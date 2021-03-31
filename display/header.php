<?php 
  session_start();
?>

<div class="row">
  <div class="col-3"></div>
  <div class="col-6 header pt-4 mb-4 d-flex align-items-center justify-content-center">
    <a href="http://localhost/member.php" class="h1 text-decoration-none color text-body">
      <img src="img/logo.png" alt="ロゴ写真" width="50px">
      KotuKotu
    </a>

  </div>
  <div class="col-3 pt-2">
  こんにちは、<?php echo $_SESSION["u_name"] ?>さん 
  </div>
</div>
