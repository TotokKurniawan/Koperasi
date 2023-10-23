<?php include 'koneksi.php'; 
include 'funct.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Halaman Daftar Pinjaman
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pinjaman</li>
        <li class="active">Data Pinjaman</li>
      </ol>
    </section>
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pinjaman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <?php 
				$sql = mysqli_query($conn, "SELECT * FROM pinjaman order by id_pinjaman");
			?>
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr class="info">
                   	  <th><center>No</center></th>
                      <th>ID Pinjaman</th>
                      <th><center>Nama Pinjaman</center></th>
                      <th><center>ID Anggota</center></th>
                      <th><center>Besar Pinjaman</center></th>
                      <th><center>Tanggal Pinjaman</center></th>
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
                      <td><?php echo $data['id_pinjaman']; ?></td>
                      <td><center><?php echo $data['nama_pinjaman']; ?></center></td>
                      <td><center><?php echo $data['id_anggota']; ?></center></td>
                      <td><center><?php echo numberrupiah($data['besar_pinjaman']); ?></center></td>
                      <td><center><?php echo TanggalIndo($data['tgl_pinjaman']); ?></center></td>
                      <td>
                          <center><a href="page-form-peminjaman.php?id_pinjaman=<?php echo $data['id_pinjaman'];?>&reqpin=edit" title="Edit Data Ini" class="btn btn-sm" style="background: darkslateblue;color:white;"><i class="fa fa-edit "></i> Edit</a>
			                <a href="proses.php?id_pinjaman=<?php echo $data['id_pinjaman'];?>&reqpin=dell" title="Hapus Pinjaman Ini" class="btn btn-danger btn-sm alert_notif"><span class="glyphicon glyphicon-trash"> Hapus</span> </a></center>
                      </td>
                    </tr>
                    <?php 
						$no++;
						}
					?>
                </tbody>
              </table>
              <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
              </script>
              <!-- script js sweetalert-->
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    
    
              <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
              di dalam session sukses  -->
              <?php if(@$_SESSION['suksesp']){ ?>
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
              <?php unset($_SESSION['suksesp']); } ?>
    
    
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
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>