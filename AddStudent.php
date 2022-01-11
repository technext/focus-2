<?php 
    session_start();
    if($_SESSION['level'] != "2") header('location: ../login.php');
    include '../db.php';
    include 'top.php';
    include 'samping.php';
?>
<script src="../js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        function tampil(){
            var NPSN_VALUE = $("#npsn").val();
            var KODE_JURUSAN_VALUE = $("#kode_jurusan").val();
            $.ajax({
                type : "POST",
                url : "../ajax/cek_kelas_dari_jurusan_only.php",
                data : { "NPSN" : NPSN_VALUE, "KODE_JURUSAN" : KODE_JURUSAN_VALUE } ,
                success: function(data){
                    $("#tampil_kelas").html(data);
                }
            });
        };
        tampil();
        $("#kode_jurusan").change(function() {
            var NPSN_VALUE = $("#npsn").val();
            var KODE_JURUSAN_VALUE = $("#kode_jurusan").val();
            $.ajax({
                type : "POST",
                url : "../ajax/cek_kelas_dari_jurusan_only.php",
                data : { "NPSN" : NPSN_VALUE, "KODE_JURUSAN" : KODE_JURUSAN_VALUE } ,
                success: function(data){
                    $("#tampil_kelas").html(data);
                }
            });
        });
    });
    
	$(document).ready(function(){
        function tampil(){
            var NIK_WALI_VALUE = $("#nik_wali").val();
            $.ajax({
                type : "POST",
                url : "../ajax/cek_nik.php",
                data : { "NIK" : NIK_WALI_VALUE } ,
                success: function(data){
                    $("#tampil_ortu").html(data);
                    $("#tampil_ortu").fadeIn(1000);
                }
            });
        };
        tampil();
        $("#nik_wali").change(function() {
            var NIK_WALI_VALUE = $("#nik_wali").val();
            $.ajax({
                type : "POST",
                url : "../ajax/cek_nik.php",
                data : { "NIK" : NIK_WALI_VALUE } ,
                success: function(data){
                    $("#tampil_ortu").html(data);
                    $("#tampil_ortu").fadeIn(1000);
                }
            });
        });
    });
    
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "../ajax/cek_nik2.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>
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
                    <h4>Selamat Datang,  <?php echo $row_admin['nama']; ?></h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                    <li class="breadcrumb-item active"><a href="StudentTable.php">Siswa</a></li>
                    <li class="breadcrumb-item active"><a href="AddStudent.php">Tambah Data Siswa</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Siswa</h4>
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
                                                <label class="col-lg-4 col-form-label" for="val-website">NISN
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="hidden" class="form-control" id="npsn" name="npsn" value="<?php echo $row_admin['npsn']; ?>">
                                                    <input type="text" class="form-control" id="nisn" name="nisn">
                                                </div>
                                            </div>
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-website">NIPD
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="nipd" name="nipd">
                                                </div>
                                            </div>
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Nama Lengkap
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                 <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="nama" name="nama">
                                                </div>
                                            </div>
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Tempat Lahir
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                 <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                                </div>
                                            </div>
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Tanggal Lahir
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                 <div class="col-lg-6">
                                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                                </div>
                                            </div>
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Jenis Kelamin
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                 <div class="col-lg-6">
                                                    <select class="form-control" id="id_jk" name="id_jk">
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <?php
                                                                $sql_jk = "SELECT * FROM id_jk";
                                                                $query_jk = $conn->query($sql_jk);
                                                                while($row_jk = $query_jk->fetch_assoc())
                                                                    echo "<option value='".$row_jk['id']."'>".$row_jk['nama']."</option>";
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label"  for="val-skill">Agama</label>
                                                    <div class="col-lg-6">
                                                        <select id="inputState" class="form-control" name="id_agama" >
                                                            <option value="">Silahkan Pilih Agama</option> 
                                                            <?php
                                                                $sql_agama = "SELECT * FROM id_agama";
                                                                $query_agama = $conn->query($sql_agama);
                                                                while($row_agama = $query_agama->fetch_assoc())
                                                                    echo "<option value='".$row_agama['id']."'>".$row_agama['nama']."</option>";
                                                            ?>
                                                        </select>
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
                                                <label class="col-lg-4 col-form-label" for="val-skill">Jurusan
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="kode_jurusan" name="kode_jurusan" >
                                                        <option value="">Silahkan Pilih jurusan</option> 
                                                        <?php
                                                            $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."'";
                                                            $query_jurusan = $conn->query($sql_jurusan);
                                                            while($row_jurusan = $query_jurusan->fetch_assoc())
                                                                echo "<option value='".$row_jurusan['kode_jurusan']."'>".$row_jurusan['nama_jurusan']."</option>";
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="tampil_kelas"></div>
                                            
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Email
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                 <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="email" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-skill">No HP Siswa
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                 <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                                                </div>
                                            </div>
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-skill">NIK Orang Tua/Wali
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                 <div class="col-lg-6">
                                                    <!-- <input type="text" class="form-control" onkeyup="showHint(this.value)" name="nik_wali"> -->
                                                    <input type="text" class="form-control" id="nik_wali" name="nik_wali">
                                                </div>
                                            </div>
                                            <span id="tampil_ortu"></span>
                                            <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
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
<?php include 'footer.php';?>

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
                        alert("Maksimal Ukuran 1 MB");=
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

        $nisn = $_POST['nisn'];
        $kode_kelas = $_POST['kode_kelas'];
        $kode_jurusan = $_POST['kode_jurusan'];
        $npsn = $row_admin['npsn'];
        $nipd = $_POST['nipd'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $password = md5("12345678");
        $id_jk = $_POST['id_jk'];
        $id_agama = $_POST['id_agama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $gambar = upload_gambar();
        $status = 'Aktif';

        $nik_wali = $_POST['nik_wali'];

        $password_wali = md5("12345678");
        $nama_wali = $_POST['nama_wali'];
        $alamat_wali = $_POST['alamat_wali'];
        //$tempat_lahir_wali = $_POST['tempat_lahir'];
        //$tanggal_lahir_wali = $_POST['tanggal_lahir'];
        //$id_jk_wali = $_POST['id_jk'];
        $no_hp_wali = $_POST['no_hp_wali'];
        //$gambar_wali = upload_gambar();
        $status_keluarga = $_POST['status_keluarga'];
        //$pekerjaan_wali = $_POST['pekerjaan'];
        $status_wali = 'Aktif';

        $tempat_lahir_wali = "";
        $tanggal_lahir_wali = "0000-00-00";
        $id_jk_wali = "0";
        $gambar_wali = "";
        $pekerjaan_wali = "";

        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
            //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($nisn))
            echo "<script>alert('Anda Harus Memasukkan Angka pada NISN')</script>";
        else {
            $query = "INSERT INTO tb_siswa VALUES (
                '$nisn',
                '$kode_kelas',
                '$kode_jurusan',
                '$npsn',
                '$nipd',
                '$nik_wali',
                '$nama',
                '$tempat_lahir',
                '$tanggal_lahir',
                '$password',
                '$id_jk',
                '$id_agama',
                '$alamat',
                '$email',
                '$no_hp',
                '$gambar',
                '$status'
                )";
            
            $sql_ortu = "SELECT * FROM tb_orangtua WHERE nik_wali='".$nik_wali."'";
            $query_ortu = $conn->query($sql_ortu);
            if($query_ortu->num_rows>0) {
                $query_wali = "UPDATE tb_orangtua SET
                password='$password_wali',
                nama='$nama_wali',
                alamat='$alamat_wali',
                tempat_lahir='$tempat_lahir_wali',
                tanggal_lahir='$tanggal_lahir_wali',
                id_jk='$id_jk_wali',
                no_hp='$no_hp_wali',
                foto='$gambar_wali',
                status_keluarga='$status_keluarga',
                pekerjaan='$pekerjaan_wali',
                status='$status_wali'
                WHERE nik_wali='".$nik_wali."'";
                
            }
            else {
                $query_wali = "INSERT INTO tb_orangtua VALUES (
                    '$nik_wali',
                    '$password_wali',
                    '$nama_wali',
                    '$alamat_wali',
                    '$tempat_lahir_wali',
                    '$tanggal_lahir_wali',
                    '$id_jk_wali',
                    '$no_hp_wali',
                    '$gambar_wali',
                    '$status_keluarga',
                    '$pekerjaan_wali',
                    '$status_wali'
                    )";
            }

            if (mysqli_query($conn, $query) && mysqli_query($conn, $query_wali)) {
                ?>
                <script type="text/javascript">
                    alert("Data Siswa Berhasil Ditambah");
                    window.location.href = "StudentTable.php";
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert("Data Siswa Gagal Ditambah, Silahkan Coba Lagi");
                    window.location.href = "AddStudent.php";
                </script>
                <?php
            }
            
        }
    }
?>