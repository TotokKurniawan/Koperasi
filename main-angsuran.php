<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Daftar Angsuran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad" style="display: block;">
            	<?php 
				include'koneksi.php';
				include'funct.php';
				$sql = mysqli_query($conn, "SELECT * FROM angsuran order by id_angsuran");
			?>
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="info">
                   	  <th><center>No</center></th>
                      <th><center>ID Angsuran</center></th>
                      <th><center>ID Pinjaman</center></th>
                      <th><center>ID Anggota</center></th>
                      <th><center>Tanggal Pembayaran</center></th>
                      <th><center>Angsuran Ke</center></th>
                      <th><center>Besar Angsuran</center></th>
                      <th><center>Tanggal Jatuh Tempo</center></th>
                      <th><center>Denda</center></th>
                      <th><center>Action</center></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
						$no=1;
						while($data = mysqli_fetch_array($sql)){
					?>
                      <td><center><?php echo $no; ?></center></td>
                      <td><center><?php echo $data['id_angsuran']; ?></center></td>
                      <td><?php echo $data['id_pinjaman']; ?></td>
                      <td><?php echo $data['id_anggota'] ?></td>
                      <td><center><?php  echo TanggalIndo($data['tgl_pembayaran']) ?></center></td>
                      <td><center><?php echo $data['angsuran_ke'] ?></center></td>
                      <td><?php echo $data['besar_angsuran'] ?></td>
                      <td><center><?php echo TanggalIndo($data['tgl_jatuh_tempo']); ?></center></td>
                      <td><center><?php echo $data['denda']; ?></center></td>
                      <td>
                          <center>
			<a href="proses.php?id_angsuran=<?php echo $data['id_angsuran'];?>&reqang=dell" title="Hapus Data ini" class="btn btn-danger btn-sm alert_notif"><span class="glyphicon glyphicon-trash"> Hapus</span> </a>
            <form action="page-angsuran.php" method="post">
            <?php 
				$jum_ang_pendek = mysqli_query($conn, "SELECT * FROM angsuran WHERE nama_pinjaman='Pinjaman Jangka Pendek' AND id_anggota='".$data['id_anggota']."'");
				$num1 = mysqli_num_rows($jum_ang_pendek);
				$jum_ang_menengah = mysqli_query($conn, "SELECT * FROM angsuran WHERE nama_pinjaman='Pinjaman Jangka Menengah' AND id_anggota='".$data['id_anggota']."'");
				$jum_ang_panjang = mysqli_query($conn, "SELECT * FROM angsuran WHERE nama_pinjaman='Pinjaman Jangka Panjang' AND id_anggota='".$data['id_anggota']."'");
				$num1 = mysqli_num_rows($jum_ang_pendek);
				$num2 = mysqli_num_rows($jum_ang_menengah);
				$num3 = mysqli_num_rows($jum_ang_panjang);
				$pinjaman = mysqli_query($conn, "SELECT * FROM pinjaman WHERE id_anggota='".$data['id_anggota']."'");
				$data_pinjaman = mysqli_fetch_array($pinjaman);
				if ($num1 == 10)
				{
					if ($data_pinjaman['ket'] == 1)
					{
						echo '<button name="submit" class="btn btn-warning btn-sm">SUDAH LUNAS</button>';
					}
					else 
					{
						echo '<button name="submit" class="btn btn-warning btn-sm">SET LUNAS</button>';
					}
				}
				else if ($num2 == 20)
				{
					if ($data_pinjaman['ket'] == 1)
					{
						echo '<button name="submit" class="btn btn-primary btn-sm">SUDAH LUNAS</button>';
					}
					else 
					{
						echo '<button name="submit" class="btn btn-primary btn-sm">SET LUNAS</button>';
					}
				}
				else if ($num3 == 30)
				{
					if ($data_pinjaman['ket'] == 1)
					{
						echo '<button name="submit" class="btn btn-success btn-sm">SUDAH LUNAS</button>';
					}
					else 
					{
						echo '<button name="submit" class="btn btn-success btn-sm">SET LUNAS</button>';
					}
				}
			?>
            <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>"/>
            </form>
            </center>
                      </td>
                    </tr>
                    <?php 
						$no++;
						}
					?>
                </tbody>
              </table>
              <?php 
				if (isset($_POST['submit']))
				{
					$sql = "UPDATE pinjaman set ket='1' WHERE id_anggota='".$_POST['id_anggota']."'";
					$update = mysqli_query($conn, $sql);
				}
			?>
            </div>
          </div>
        <!-- /.box --></div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <!-- script js sweetalert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    
    
        <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
        di dalam session sukses  -->
        <?php if(@$_SESSION['suksesss']){ ?>
            <script>
                Swal.fire({            
                    icon: 'success',                   
                    title: 'Sukses',    
                    text: 'Data Berhasil Di Hapus',                        
                    timer: 2000,                                
                    showConfirmButton: false
                })
            </script>
        <!-- agar sweet alert tidak muncul lagi saat di refresh -->
        <?php unset($_SESSION['suksesss']); } ?>
    
    
        <!-- konfirmasi hapus data dengan sweet alert  -->
        <script>
            $('.alert_notif').on('click',function(){
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Anda Yakin Menghapus Data Ini?",            
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Cancel"
                
                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if(result.isConfirmed){
                        window.location.href = getLink
                    } 
                })
                return false;
            });
        </script>
    </section>
    <!-- /.content -->
  </div>