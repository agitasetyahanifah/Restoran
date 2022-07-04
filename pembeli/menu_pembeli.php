<?php require('session.php'); ?>

<html lang="en">
<head> 
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>The Galaxy</title>
  <link rel="stylesheet" href="Restoran/assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="Restoran/assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="Restoran/assets/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="Restoran/assets/css/style.css">
</head>
<body>
  <div class="container-scroller">
    <?php 
    include("navbar-pembeli.php");
    require_once __DIR__."/../functions.php";
    ?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <?php 
            $data = query("SELECT * FROM menu ORDER by nama_menu ASC");
            foreach($data as $row) :
            ?>
            <div class="card col-sm-4">
              <div class="card-body"> 
                <img src="../uploads/<?= $row['image']; ?>" class="img" width="100%" height="300">
              </div>
              <div class="card-footer">
                <h5 class="text-center"><?php echo $row['nama_menu']; ?></h5>
                <h6 class="text-center"><?php echo $row['keterangan']; ?></h6>
                <h6 class="text-center">jumlah yg dipesan</h6>
                <a href="db_checkout.php?checkout=true&kode_menu=<?php echo $hasil["kode_menu"]; ?>">
                  <button type="button" class="btn btn-secondary btn-block">
                    PILIH
                  </button>
                </a>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div> 
      </div>
    </div>
    <?php include("footer.php"); ?>
  </div>
</body>
</html>