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
                <h4>Selamat Datang,  <?php echo $row_admin['nama']; ?></h4>
            </div>
        </div>
        <div class="col-sm-10 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                <li class="breadcrumb-item"><a href="TeacherTable.php">Guru</a></li>
                <li class="breadcrumb-item active"><a href="AddTeacher.php">Tambah Data Guru</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="icon icon-window-add"></i>Tambah Data Guru</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="col-lg-8">
                                        <img src="../images/avatar/avatar.jpeg" id="imagepreview"  style="width: 100%;">
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
                                            <input type="file" name="gambar" id="image" onchange="showImage(this);" class="custom-file-input" >
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>  
                                </div>

                                <div class="col-xl-8">
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-website">NIP
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="nip" >
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Nama Lengkap
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control" name="nama" >
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">NPSN
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control" name="npsn"  placeholder="">
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
                                            <input type="text" class="form-control" name="tempat_lahir"  >
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Tanggal Lahir
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                            <div class="col-lg-6">
                                            <input type="date" class="form-control" name="tanggal_lahir"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Agama
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
                                                ?>
                                                <option value="">Silahkan Pilih Agama</option> 
                                                <?php
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
                                            <div class="col-lg-6">
                                            <select class="form-control" id="id_jk" name="id_jk">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="1">Pria</option>
                                                <option value="2">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Alamat
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control" name="alamat"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">NUPTK
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control" name="nuptk"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Status Pegawai
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="status_kepegawaian" name="status_kepegawaian">
                                                <option value="">Pilih Status</option>
                                                <option value="PNS">PNS</option>
                                                <option value="Non PNS">Non PNS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Golongan
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="golongan"  placeholder="">
                                        </div>
                                    </div>
                                    <!--<div class="form-group row text-dark">-->
                                    <!--    <label class="col-lg-4 col-form-label" for="val-skill">Jabatan-->
                                            <!-- <span class="text-danger">*</span> -->
                                    <!--    </label>-->
                                    <!--    <div class="col-lg-6">-->
                                    <!--        <select id="inputState" class="form-control" name="id_tgs_tambahan" >-->
                                    <!--        <option value="">Pilih Jabatan</option> -->
                                    <!--        <?php $ambil2 = $conn->query("SELECT * FROM id_tgs_tambahan ") ?>-->
                                    <!--        <?php while($pecah_o2 = $ambil2->fetch_assoc()){ ?>-->
                                    <!--        <option value="<?php echo $pecah_o2['id'] ?>"><?php echo $pecah_o2['nama'] ?></option> -->
                                    <!--        <?php } ?>  -->
                                    <!--        </select>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="form-group row text-dark">-->
                                    <!--    <label class="col-lg-4 col-form-label" for="val-skill">Tugas Tambahan-->
                                            <!-- <span class="text-danger">*</span> -->
                                    <!--    </label>-->
                                    <!--    <div class="col-lg-6">-->
                                    <!--        <input type="text" class="form-control" name="tugas_tambahan" placeholder="">-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">No HP
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="no_hp"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">No Sertifikasi
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="nomor_sertifikasi"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Email
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="email"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <div class="col-lg-8 ml-auto">
                                           <input type="submit" name="tambah" id="tambah" value="Tambah" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a; width:25%;">
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
?>

<?php
    if(isset($_POST['tambah'])) {
        include '../db.php';

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
                        alert("Gambar Belum Dipilih");=
                    </script>
                    <?php
                } else if ($ukuran > 1048576) {
                    ?>
                    <script type="text/javascript">
                        alert("Maksimal Ukuran 1 Mb");=
                    </script>
                    <?php
                } else if (in_array($ekstensi, $ekstensi_gambar) == false) {
                    ?>
                    <script type="text/javascript">
                        alert("Format File Salah");=
                    </script>
                    <?php
                } else {
                    move_uploaded_file($lokasi_sem, "../assets/images/" . $nama);
                    return $nama;
                }
            }
        }

        $nip = $_POST['nip'];
        $password = md5("12345678");
        $npsn = $row_admin['npsn'];
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
        $tugas_tambahan = "0";
        $golongan = $_POST['golongan'];
        $gambar = upload_gambar();
        $nomor_sertifikasi = $_POST['nomor_sertifikasi'];
        $status = 'Aktif';

        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
            //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($nip))
            echo "<script>alert('Anda Harus Memasukkan Angka pada NIP')</script>";
        else {
            $query = "INSERT INTO tb_guru VALUES (
                '$nip',
                '$password',
                '$npsn',
                '$nuptk',
                '$nama',
                '$id_jk',
                '$tempat_lahir',
                '$tanggal_lahir',
                '$status_kepegawaian',
                '$id_agama',
                '$alamat',
                '$no_hp',
                '$email',
                '$tugas_tambahan',
                '$golongan',
                '$gambar',
                '$nomor_sertifikasi',
                '$status'
                )";

            if (mysqli_query($conn, $query)) {
                ?>
                <script type="text/javascript">
                    alert("Data Guru Berhasil Ditambah");
                    window.location.href = "TeacherTable.php";
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert("Data Guru Gagal Ditambah, Silahkan Coba Lagi");
                    window.location.href = "AddTeacher.php";
                </script>
                <?php
            }
            
        }
    }
?>