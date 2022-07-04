<!DOCTYPE html>
<html lang="en">
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
    <div class="container-scroller">
        <?php include("navbar-pembeli.php"); ?>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title float-left"><b>Pesanan Anda</b></p>
                                    <p class="card-description float-right">
                                        <a href="db_checkout.php?checkout=true" onclick="return confirm('apakah anda yakin dengan pesanan ini?')" class="btn btn-sm btn-success btn-icon-text" data-toggle="modal" data-target="#modalDetail">
                                            <!-- <i class="mdi mdi-plus btn-icon-prepend"></i> -->
                                            Checkout
                                        </a>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Menu</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                    <th>Picture</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($_SESSION["session_checkout"] as $hasil): ?>
                                                <tr>
                                                    <td><?php echo $hasil["nama_menu"]; ?></td>
                                                    <td><td><?php echo $hasil["jml"]; ?></td></td>
                                                    <td><?php echo $hasil["keterangan"]; ?></td>
                                                    <td<img src="uploads/<?= $hasil["image"]; ?>" width="60"></td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info btn-icon-text" data-toggle="modal" data-target="#modalSiswa">
                                                            <i class="mdi mdi-pencil btn-icon-prepend"></i>
                                                            Ubah
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-danger btn-icon-text" data-toggle="modal" data-target="#modalDetail">
                                                            <i class="mdi mdi-delete btn-icon-prepend"></i>
                                                            Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</body>
</html>