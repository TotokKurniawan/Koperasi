<?php include 'koneksi.php';
include 'funct.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Halaman Karyawan
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Master</a></li>
            <li class="active">Karyawan</li>
            <li class="active">Daftar Karyawan</li>

        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Karyawan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM karyawan where level =2");
                ?>
                <table id="dataTable" class="table table-bordered table-striped">
                    <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal"
                        class="btn btn-success" onMouseOver="this.style.backgroundColor='#006064'"
                        onMouseOut="this.style.backgroundColor='#4CAF50'">Tambah Karyawan</button>
                    <br></br>
                    <thead>
                        <tr class="info">
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>Nama</center>
                            </th>
                            <th>
                                <center>No Telepon</center>
                            </th>
                            <th>
                                <center>Alamat</center>
                            </th>
                            <th>
                                <center>Foto</center>
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
                                    <center>
                                        <?php echo $data['username']; ?>
                                    </center>
                                </td>
                                <td>
                                    <?php echo $data['no_telp']; ?>
                                </td>
                                <td>
                                    <?php echo $data['alamat'] ?>
                                </td>
                                <td>
                                    <?php echo $data['foto'] ?>
                                </td>
                                <td>
                                    <center>

                                        <a type="button" name="edit" value="Edit" data-toggle="modal"
                                            data-target="#editModal<?php echo $data["id"]; ?>" title="Edit Data ini"
                                            class="btn btn-sm" style="background: darkslateblue;color:white;"><i
                                                class="fa fa-edit "></i>
                                            Edit
                                        </a>

                                        <a href="proses.php?id=<?php echo $data['id']; ?>&reqkarya=dell"
                                            title="Hapus Simpanan" class="btn btn-danger btn-sm alert_notif"><span
                                                class="fa fa-trash-o">
                                                Hapus</span>
                                        </a>

                                    </center>
                                </td>



                            </tr>

                            <div id="editModal<?php echo $data["id"]; ?>" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Input Data</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="./proses/edit_karyawan.php" method="post" id="update"
                                                enctype='multipart/form-data'>
                                                <input type="hidden" value="<?php echo $data['id']; ?>" name="id_karyawan"
                                                    id="id_karyawan" class="form-control">
                                                <label>Username</label>
                                                <input type="text" name="username" id="username"
                                                    value="<?php echo $data['username']; ?>" class="form-control" />
                                                <br />
                                                <label>Password</label>
                                                <input type="text" name="password" id="password"
                                                    value="<?php echo $data['password']; ?>" class="form-control" />
                                                <br />
                                                <label>No Telepon</label>
                                                <input type="text" style="resize:vertical"
                                                    value="<?php echo $data['no_telp']; ?>" name="no_telp" id="no_telp"
                                                    class="form-control"></textarea>
                                                <br />
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"
                                                    id="alamat" class="form-control" />
                                                <br />
                                                <label>Foto</label>
                                                <input type="file" name="foto" id="foto"
                                                    value="<?php echo $data['foto']; ?>" class="form-control" />
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
                    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                    crossorigin="anonymous">
                    </script>
                <!-- script js sweetalert-->
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>


                <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
        di dalam session sukses  -->
                <?php if (@$_SESSION['suksessss']) { ?>
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
                    <?php unset($_SESSION['suksessss']);
                    } ?>


                <!-- konfirmasi hapus data dengan sweet alert  -->
                <script>
                    $('.alert_notif').on('click', function () {
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
                            if (result.isConfirmed) {
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
                <form action="./proses/insert_karyawan.php" method="post" id="insert_form"
                    enctype='multipart/form-data'>

                    <label>Username</label>
                    <input type="text" name="username" id="username" class="form-control" />
                    <br />
                    <label>Password</label>
                    <input type="text" name="password" id="password" class="form-control" />
                    <br />
                    <label>No Telepon</label>
                    <input type="text" style="resize:vertical" name="no_telp" id="no_telp"
                        class="form-control"></textarea>
                    <br />
                    <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" />
                    <br />
                    <label>Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control" />
                    <br />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"
                        onMouseOver="this.style.backgroundColor='#00796b'"
                        onMouseOut="this.style.backgroundColor='#4CAF50'" />

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onMouseOver="this.style.backgroundColor='#ff6666'"
                    onMouseOut="this.style.backgroundColor='white'" data-dismiss="modal">Close</button>
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
                url: "./proses/insert_ubahsimpanan.php",
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