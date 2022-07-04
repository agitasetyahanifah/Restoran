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
        <?php 
        include("navbar-petugas.php"); 
        require 'functions.php';
        ?>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title float-left"><b>Daftar Menu</b></p>
                                    <p class="card-description float-right">
                                        <a href="form_menu.php" class="btn btn-sm btn-success btn-icon-text">
                                            <i class="mdi mdi-plus btn-icon-prepend"></i>
                                            Tambah
                                        </a>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode</th>
                                                    <th>Menu</th>
                                                    <th>Keterangan</th>
                                                    <th>Picture</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $no = 1;
                                                $data = query("SELECT * FROM menu ORDER by kode_menu DESC");
                                                foreach($data as $row) :
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row['kode_menu']; ?></td>
                                                    <td><?php echo $row['nama_menu']; ?></td>
                                                    <td><?php echo $row['keterangan']; ?></td>
                                                    <td><img src="uploads/<?= $row["image"]; ?>" width="60"></td>
                                                    <td>
                                                        <a href="hapus_menu.php?id=<?= $row['kode_menu']; ?>" onclick="return confirm('lanjut hapus data?');" class="btn btn-sm btn-danger btn-icon-text" >
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