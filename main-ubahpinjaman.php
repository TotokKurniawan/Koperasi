<?php include 'koneksi.php';
include 'funct.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Halaman Ubah Pinjaman
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Master</a></li>
            <li class="active">Master Pinjaman</li>
            <li class="active">Jenis Pinjaman</li>

        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Pinjaman Koperasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM k_pinjaman");
                ?>
                <table id="dataTable" class="table table-bordered table-striped">
                    <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal"
                        class="btn btn-success" onMouseOver="this.style.backgroundColor='#006064'"
                        onMouseOut="this.style.backgroundColor='#4CAF50'">Tambah Jenis Pinjaman</button>
                    <br></br>
                    <thead>
                        <tr class="info">
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>ID</center>
                            </th>
                            <th>
                                <center>Nama Pinjaman</center>
                            </th>
                            <th>
                                <center>Keterangan Pinjaman</center>
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
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <td>
                                <center>
                                    <?php echo $no; ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row['id']; ?>
                                </center>
                            </td>
                            <td>
                                <?php echo $row['nama_pinjaman']; ?>
                            </td>
                            <td>
                                <?php echo $row['keterangan_pinjaman']; ?>
                            </td>
                            <td>
                                <center>


                                    <a type="button" name="edit" value="Edit" data-toggle="modal"
                                        data-target="#editModal<?php echo $row["id"]; ?>" title="Edit Data ini"
                                        class="btn btn-sm" style="background: darkslateblue;color:white;"><i
                                            class="fa fa-edit "></i>
                                        Edit
                                    </a>

                                    <a href="proses.php?id=<?php echo $row['id']; ?>&requbp=dell" title="Hapus Data ini" class="btn btn-danger btn-sm alert_notif"><span class="glyphicon glyphicon-trash">
                                        Hapus</span>
                                    </a>

                                </center>
                            </td>
                        </tr>
                        <div id="editModal<?php echo $row["id"]; ?>" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Input Data</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./proses/edit_ubahpinjaman.php" method="post">
                                            <input type="hidden" value="<?php echo $row['id']; ?>" name="id_pinjaman"
                                                id="id_pinjaman" class="form-control">
                                            <label>Nama Pinjaman</label>
                                            <input type="text" value=" <?php echo $row['nama_pinjaman']; ?>"
                                                name="nama_pinjaman" id="nama" class="form-control" />
                                            <br />
                                            <label>Keterangan Pinjaman</label>
                                            <textarea style="resize:vertical" name="keterangan_pinjaman" id="ketsim"
                                                class="form-control"><?php echo $row['keterangan_pinjaman']; ?></textarea>
                                            <br />
                                            <input type="submit" name="update" id="update" value="Update"
                                            class="btn btn-success" 
                                            onMouseOver="this.style.backgroundColor='#00796b'"
                                            onMouseOut="this.style.backgroundColor='#4CAF50'" />
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" onMouseOver="this.style.backgroundColor='#ff6666'"
                                        onMouseOut="this.style.backgroundColor='white'" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
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
        <?php if(@$_SESSION['suksesssss']){ ?>
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
        <?php unset($_SESSION['suksesssss']); } ?>
    
    
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

</html>

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Input Data</h4>
            </div>
            <div class="modal-body">
                <form action="./proses/insert_ubahpinjaman.php" method="post" id="insert_form">
                    <label>Nama Pinjaman</label>
                    <input type="text" name="nama_pinjaman" id="nama" class="form-control" />
                    <br />
                    <label>Keterangan Pinjaman</label>
                    <textarea style="resize:vertical" name="keterangan_pinjaman" id="ketsim"
                        class="form-control"></textarea>
                    <br />

                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" 
                            onMouseOver="this.style.backgroundColor='#00796b'"
                            onMouseOut="this.style.backgroundColor='#4CAF50'"/>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onMouseOver="this.style.backgroundColor='#ff6666'"
                                        onMouseOut="this.style.backgroundColor='white'"data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Data Karyawan</h4>
            </div>
            <div class="modal-body" id="detail_karyawan">

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Karyawan</h4>
            </div>
            <div class="modal-body" id="form_edit">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Begin Aksi Insert
        $('#insert_form').on("submit", function (event) {
            event.preventDefault();
            // if ($('#nama').val() == "") {
            //     alert("Mohon Isi Nama ");
        }
            // else if ($('#alamat').val() == '') {
            //     alert("Mohon Isi Alamat");
            }

            else {
            $.ajax({
                url: "<input type="hidden" name="requbp" value="<?php echo $_GET[' requbp '] ?> ">",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function () {
                    $('#insert').val("Inserting");
                },
                success: function (data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                }
            });
        }
        });
    //END Aksi Insert
    //Begin Tampil Form Edit
    $(document).on('click', '.edit_data', function () {
        var employee_id = $(this).attr("id");
        $.ajax({
            url: "edit.php",
            method: "POST",
            data: { employee_id: employee_id },
            success: function (data) {
                $('#form_edit').html(data);
                $('#editModal').modal('show');
            }
        });
    });
    //End Tampil Form Edit

    //Begin Aksi Delete Data
    $(document).on('click', '.hapus_data', function () {
        var employee_id = $(this).attr("id");
        $.ajax({
            url: "delete.php",
            method: "POST",
            data: { employee_id: employee_id },
            success: function (data) {
                $('#employee_table').html(data);
            }
        });
    });
    });
//End Aksi Delete Data
</script>