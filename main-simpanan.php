<?php include 'koneksi.php';
include 'funct.php';
?>
<div class="content-wrapper">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <section class="content-header">
    <h1>
      Halaman Daftar Simpanan
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Simpanan</li>
      <li class="active">Data Simpanan</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Daftar Simpanan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM simpanan WHERE NOT nm_simpanan = 'Simpanan Pokok'");
        ?>
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <tr class="info">
              <th>
                <center>No</center>
              </th>
              <th><center>Nama Simpanan</center></th>
              <th>
                <center>ID Anggota</center>
              </th>
              <th>
                <center>Tanggal Simpanan</center>
              </th>
              <th>
                <center>Besar Simpanan</center>
              </th>
              <th>
                <center>Action</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $no = 1;
              while ($data = mysqli_fetch_array($sql)) {
              ?>
              <td>
                <center>
                  <?php echo $no; ?>
                </center>
              </td>
              <td>
                <?php echo $data['nm_simpanan']; ?>
              </td>
              <td>
                <center>
                  <?php echo $data['id_anggota']; ?>
                </center>
              </td>
              <td>
                <?php echo TanggalIndo($data['tgl_simpanan']); ?>
              </td>
              <td>
                <?php echo numberrupiah($data['besar_simpanan']) ?>
              </td>
              <td>
                <center>
                  <a href="proses.php?id_simpanan=<?php echo $data['id_simpanan']; ?>&reqs=dell"
                    title="Hapus Simpanan Ini" class="btn btn-danger btn-sm alert_notif"
                    ><span class="glyphicon glyphicon-trash">
                      Hapus</span> </a>
                </center>
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
        <?php if(@$_SESSION['sukses']){ ?>
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
        <?php unset($_SESSION['sukses']); } ?>
    
    
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