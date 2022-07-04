<?php session_start(); ?>
<?php if (isset($_SESSION["username"])): ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>The Galaxy</title>
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
  <body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark sticky-top">
      <a href="#" class="text-white">
        <h3>THE GALAXY</h3>
      </a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
        <span class="navbar navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="proses_login.php?logout=true" class="nav-link">Logout</a></li>

        </ul>
      </div>
      <a href="template_pembeli.php?page=menu_pembeli">
        <b class="text-white">Jumlah: <?php echo count($_SESSION["session_pinjam"]); ?></b>
      </a>
    </nav>
    <div class="container my-2">
      <?php if (isset($_GET["page"])): ?>
        <?php if ((@include $_GET["page"].".php") === true): ?>
          <?php include $_GET["page"].".php"; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </body>
</html>
<?php else: ?>
  <?php echo "Anda belum login!"; ?>
  <br>
  <a href="login-pembeli.php">Login disini</a>
<?php endif; ?>
