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
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <?php
                        $sql_admin = "SELECT * FROM tb_admin WHERE username='".$_SESSION['username']."' LIMIT 1";
                        $query_admin = $conn->query($sql_admin);
                        $row_admin = $query_admin->fetch_assoc();
                    ?>
                    <h4>Selamat Datang, <?php echo $row_admin['nama']; ?></h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="SchoolTable.php">Sekolah</a></li>
                    <li class="breadcrumb-item active"><a href="AddSchool.php">Tambah Sekolah</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="col-lg-12">
                                            <img src="images/school.png" id="imagepreview"  style="width: 65%;">
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
                                            <div class="col-lg-12 mt-2" style="width: 65%;">
                                                <input type="file" name="gambar" id="image" onchange="showImage(this);" class="custom-file-input" required >
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">NPSN
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="npsn" name="npsn" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">NSS
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nss" name="nss" placeholder="">
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
                                            <label class="col-lg-4 col-form-label" for="val-skill">Nama Sekolah
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Alamat
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kelurahan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kecamatan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kabupaten
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kab_kota" name="kab_kota" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Provinsi
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kode Pos
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">No Telepon
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Email
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Website
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="website" name="website" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Nip Kepala Sekolah
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nip" name="nip" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">
                                            </label>
                                            <div class="col-lg-6">
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
</div>
<?php include 'footer.php'; ?>
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
                } elseif ($ukuran > 1048576) {
                    ?>
                    <script type="text/javascript">
                        alert("Maksimal Ukuran 1 Mb");=
                    </script>
                    <?php
                } elseif (in_array($ekstensi, $ekstensi_gambar) == false) {
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

        $npsn = $_POST['npsn'];
        $nss = $_POST['nss'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kode_pos = $_POST['kode_pos'];
        $no_telepon = $_POST['no_telepon'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $kab_kota = $_POST['kab_kota'];
        $provinsi = $_POST['provinsi'];
        $website = $_POST['website'];
        $email = $_POST['email'];
        $gambar = upload_gambar();
        $nama_kepsek = $_POST['nama_kepsek'];
        $status = 'Aktif';

        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
            //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($nss))
            echo "<script>alert('Anda Harus Memasukkan Angka pada NSS')</script>";
        else {
            $query = "INSERT INTO tb_sekolah VALUES (
                '$npsn',
                '$nss',
                '$nama',
                '$alamat',
                '$kode_pos',
                '$no_telepon',
                '$kelurahan',
                '$kecamatan',
                '$kab_kota',
                '$provinsi',
                '$website',
                '$email',
                '$nama_kepsek',
                '$gambar',
                '$status'
                )";

            if (mysqli_query($conn, $query)) {
                ?>
                <script type="text/javascript">
                    alert("Sekolah Berhasil Ditambah");
                    window.location.href = "SchoolTable.php";
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert("Tambah Sekolah Gagal, Silahkan Coba Lagi");
                    window.location.href = "AddSchool.php";
                </script>
                <?php
            }
            
        }
    }
?>