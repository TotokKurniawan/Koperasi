<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <?php include 'koneksi.php';
                        $query = mysqli_query($conn, "SELECT * FROM simpanan");
                        $jum_simpanan = mysqli_num_rows($query);
                        ?>
                        <h3>
                            <?php echo $jum_simpanan ?>
                        </h3>
                        <p>Jumlah Data Simpanan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-card"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM anggota");
                        $jum_anggota = mysqli_num_rows($query);
                        ?>
                        <h3>
                            <?php echo $jum_anggota ?>
                        </h3>
                        <p>Jumlah Anggota</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people-outline"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM karyawan");
                        $jum_petugas = mysqli_num_rows($query);
                        ?>
                        <h3>
                            <?php echo $jum_petugas ?>
                        </h3>
                        <p>Jumlah Petugas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM pinjaman");
                        $jum_peminjam = mysqli_num_rows($query);
                        ?>
                        <h3>
                            <?php echo $jum_peminjam ?>
                        </h3>
                        <p>Jumlah Data Pinjaman</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        </head>

        <body>
            <div class="container">
                <h2>Grafik Oprasional KSP</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">BarChart Simpanan</div>
                                <div class="panel-body"><iframe src="bar.php" width="100%" height="300"></iframe></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">Grafik Garis Pinjaman</div>
                                <div class="panel-body"><iframe src="line.php" width="100%" height="300"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </body>

        </html>