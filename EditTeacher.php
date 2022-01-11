<?php 
    session_start();
    if($_SESSION['level'] != "2") header('location: ../login.php');
    include '../db.php';
    include 'top.php';
    include 'samping.php';
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-2 p-md-0">
                <div class="welcome-text">
                    <?php
                        $sql_admin = "SELECT * FROM tb_admin WHERE username='".$_SESSION['username']."' LIMIT 1";
                        $query_admin = $conn->query($sql_admin);
                        $row_admin = $query_admin->fetch_assoc();
                    ?>
                </div>
            </div>
            <div class="col-sm-10 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                    <li class="breadcrumb-item active"><a href="TeacherTable.php">Guru</a></li>
                    <li class="breadcrumb-item active"><a href="EditTeacher.php">Edit Data Guru</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <?php
                                $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$_GET['nip']."' LIMIT 1";
                                $query_guru = $conn->query($sql_guru);
                                $row = $query_guru->fetch_assoc();
                            ?>
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="col-lg-8">
                                            <img src="../assets/images/<?php echo $row['foto']; ?>" id="imagepreview"  style="width: 100%;">
                                            <script type="text/javascript">
                                                function showImage(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            $('#imagepreview').attr('src', e.target.result);
                                                        }
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                            </script>
                                            <div class="col-lg-12 mt-2">
                                                <input type="hidden" name="gambarLama" value="<?php echo $row['foto'] ?>">
                                                <input type="file" name="gambar" id="image" onchange="showImage(this);" class="custom-file-input" value="../assets/images/<?php echo $row['foto']; ?>" >
                                                <label class="custom-file-label">Pilih Foto</label>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-12 mt-2">
                                            <button type="button" class="btn btn-outline-primary" style="width:55%;" data-toggle="modal" data-target="#basicModal">Ganti Password</button>
                                        </div> -->
                                    </div>
                                    <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                        
                                                <div class="col-xl-12">
                                                    <div class="form-group row">
                                                        <label class="col-lg-6 col-form-label" for="val-website">Password Lama 
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="Password" class="form-control" id="val-website" name="val-website" placeholder="***">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row text-dark">
                                                        <label class="col-lg-6 col-form-label" for="val-skill">Password Baru
                                                            <!-- <span class="Password-danger">*</span> -->
                                                        </label>
                                                            <div class="col-lg-6">
                                                            <input type="Password" class="form-control" id="val-website" name="val-website" placeholder="***">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-website">Website
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="val-website" name="val-website" placeholder="http://example.com">
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row text-dark">
                                                        <label class="col-lg-6 col-form-label" for="val-skill">Konfirmasi Password Baru
                                                            <!-- <span class="text-danger">*</span> -->
                                                        </label>
                                                            <div class="col-lg-6">
                                                            <input type="Password" class="form-control" id="val-website" name="val-website" placeholder="*****">
                                                        </div>
                                                    </div>
                                                </div>
                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-8">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">NIP
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="nip" value="<?php echo $row['nip']; ?>"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Nama Lengkap
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" name="nama"  value="<?php echo $row['nama']; ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">NPSN
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" name="npsn"  value="<?php echo $row['npsn']; ?>"  placeholder="">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-website">Website
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"  placeholder="http://example.com">
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Password
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="Password" class="form-control"  placeholder="*****">
                                            </div>
                                        </div> -->
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Tempat Lahir
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" name="tempat_lahir"  value="<?php echo $row['tempat_lahir']; ?>"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Tanggal Lahir
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="date" class="form-control" name="tanggal_lahir"  value="<?php echo $row['tanggal_lahir']; ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label"  for="val-skill">Agama
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="id_agama" >
                                                    <?php
                                                        $sql_agama_selected = "SELECT * FROM id_agama WHERE id='".$row['id_agama']."' LIMIT 1";
                                                        $query_agama_selected = $conn->query($sql_agama_selected);
                                                        $id_agama_selected = $query_agama_selected->fetch_assoc();

                                                        $sql_agama = "SELECT * FROM id_agama";
                                                        $query_agama = $conn->query($sql_agama);
                                                        
                                                        while($row_agama = $query_agama->fetch_assoc()) {
                                                            if($id_agama_selected['id'] == $row_agama['id'])
                                                                echo "<option value='".$row_agama['id']."' selected>".$row_agama['nama']."</option>";
                                                            else
                                                                echo "<option value='".$row_agama['id']."'>".$row_agama['nama']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label"  for="val-skill">Jenis Kelamin
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="radio" name="id_jk" value="1" <?php if($row['id_jk']=='1') echo 'checked'?>><label style="color:black; padding:4px">Pria</label></input>
                                                <input type="radio" name="id_jk" value="2" <?php if($row['id_jk']=='2') echo 'checked'?>><label style="color:black; padding:4px">Wanita</label></input>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Alamat
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="alamat"  value="<?php echo $row['alamat']; ?>"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">NUPTK
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="nuptk"  value="<?php echo $row['nuptk']; ?>"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Status Pegawai
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="radio" name="status_kepegawaian" value="1" <?php if($row['status_kepegawaian']=='PNS') echo 'checked'?>><label style="color:black; padding:4px">PNS</label></input>
                                                <input type="radio" name="status_kepegawaian" value="2" <?php if($row['status_kepegawaian']=='Non PNS') echo 'checked'?>><label style="color:black; padding:4px">Non PNS</label></input>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Golongan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="golongan"  value="<?php echo $row['golongan']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jabatan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <?php
                                                $sql_tgs_selected = "SELECT * FROM id_tgs_tambahan WHERE id='".$row['id_tgs_tambahan']."' LIMIT 1";
                                                $query_tgs_selected = $conn->query($sql_tgs_selected);
                                                $id_tgs_selected = $query_tgs_selected->fetch_assoc();
                                            ?>
                                            <div class="col-lg-6">
                                                <input type="hidden" class="form-control" name="tugas_tambahan"  value="<?php echo $id_tgs_selected['id']; ?>" readonly>
                                                <input type="text" class="form-control" value="<?php echo $id_tgs_selected['nama']; ?>" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">No HP
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" name="no_hp"  value="<?php echo $row['no_hp']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">No Sertifikasi
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="nomor_sertifikasi"  value="<?php echo $row['nomor_sertifikasi']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Email
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="email"  value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Status
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="radio" name="status" value="Aktif" <?php if($row['status']=='Aktif') echo 'checked'?>><label style="color:black; padding:4px">Aktif</label></input>
                                                <input type="radio" name="status" value="Tidak Aktif" <?php if($row['status']=='Tidak Aktif') echo 'checked'?>><label style="color:black; padding:4px">Tidak Aktif</label></input>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
<?php 
    include 'footer.php';

    if(isset($_POST['edit'])) {
        function upload_gambar() {
            if (isset($_FILES['gambar'])) {
                $nama = uniqid() . "-" . $_FILES["gambar"]["name"];
                $tipe = $_FILES["gambar"]["type"];
                $lokasi_sem = $_FILES["gambar"]["tmp_name"];
                $error = $_FILES["gambar"]["error"];
                $ukuran = $_FILES["gambar"]["size"];

                $ekstensi = explode(".", $nama);
                $ekstensi = strtolower(end($ekstensi));

                $ekstensi_gambar = ["jpg","png","jpeg","bmp"];

                if ($error == 4) {
                    ?>
                    <script type="text/javascript">
                        alert("Gambar Belum Dipilih");
                        window.location.href = "../EditTeacher.php";
                    </script>
                    <?php
                } elseif ($ukuran > 1048576) {
                    ?>
                    <script type="text/javascript">
                        alert("Maksimal Ukuran 1 Mb");
                        window.location.href = "../EditTeacher.php";
                    </script>
                    <?php
                } elseif (in_array($ekstensi, $ekstensi_gambar) == false) {
                    ?>
                    <script type="text/javascript">
                        alert("Format File Salah");
                        window.location.href = "../EditTeacher.php";
                    </script>
                    <?php
                } else {
                    move_uploaded_file($lokasi_sem, "../assets/images/" . $nama);
                    return $nama;
                }
            }
        }

        $nip = $_POST['nip'];
        $npsn = $_POST['npsn'];
        $nuptk = $_POST['nuptk'];
        $nama = $_POST['nama'];
        $id_jk = $_POST['id_jk'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $status_kepegawaian = $_POST['status_kepegawaian'];
        $id_agama = $_POST['id_agama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $id_tgs_tambahan = $_POST['id_tgs_tambahan'];
        $golongan = $_POST['golongan'];
        $gambarLama = $_POST["gambarLama"];
        $nomor_sertifikasi = $_POST['nomor_sertifikasi'];
        $status = $_POST['status'];

        if ($_FILES["gambar"]["error"] == 4)
            $gambar = $gambarLama;
        else
            $gambar	= upload_gambar();

        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
        //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($npsn))
            echo "<script>alert('Anda Harus Memasukkan Angka pada NPSN')</script>";
        else {
            $query = "UPDATE tb_guru SET
                    npsn='$npsn',
                    nuptk='$nuptk',
                    nama='$nama',
                    id_jk='$id_jk',
                    tempat_lahir='$tempat_lahir',
                    tanggal_lahir='$tanggal_lahir',
                    status_kepegawaian='$status_kepegawaian',
                    id_agama='$id_agama',
                    alamat='$alamat',
                    no_hp='$no_hp',
                    email='$email',
                    id_tgs_tambahan='$id_tgs_tambahan',
                    golongan='$golongan',
                    foto='$gambar',
                    nomor_sertifikasi='$nomor_sertifikasi',
                    status='$status'
                    WHERE nip='$nip'";

            if (mysqli_query($conn, $query)) {
                ?>
                <script type="text/javascript">
                    alert("Data Guru Berhasil Diperbaharui");
                    window.location.href = "TeacherTable.php";
                </script>
                <?php
            }
            else {
                ?>
                <script type="text/javascript">
                    alert("Data Guru Gagal Diperbaharui, Silahkan Coba Lagi");
                    window.location.href = "TeacherTable.php";
                </script>
                <?php
            }
        }
    }
?>

