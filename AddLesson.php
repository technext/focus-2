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
                url : "../ajax/cek_kelas_dari_jurusan.php",
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
                url : "../ajax/cek_kelas_dari_jurusan.php",
                data : { "NPSN" : NPSN_VALUE, "KODE_JURUSAN" : KODE_JURUSAN_VALUE } ,
                success: function(data){
                    $("#tampil_kelas").html(data);
                }
            });
        });
    });
    
    $(document).ready(function(){
        function tampil(){
            var NPSN_VALUE = $("#npsn").val();
            var KODE_JURUSAN_VALUE = $("#kode_jurusan").val();
            var KODE_KELAS_VALUE = $("#kode_kelas").val();
            $.ajax({
                type : "POST",
                url : "../ajax/cek_mapel_dari_kelas.php",
                data : { "NPSN" : NPSN_VALUE, "KODE_JURUSAN" : KODE_JURUSAN_VALUE, "KODE_KELAS" : KODE_KELAS_VALUE } ,
                success: function(data){
                    $("#tampil_mapel").html(data);
                }
            });
        };
        tampil();
        $("#kode_kelas").change(function() {
            var NPSN_VALUE = $("#npsn").val();
            var KODE_JURUSAN_VALUE = $("#kode_jurusan").val();
            var KODE_KELAS_VALUE = $("#kode_kelas").val();
            $.ajax({
                type : "POST",
                url : "../ajax/cek_mapel_dari_kelas.php",
                data : { "NPSN" : NPSN_VALUE, "KODE_JURUSAN" : KODE_JURUSAN_VALUE, "KODE_KELAS" : KODE_KELAS_VALUE } ,
                success: function(data){
                    $("#tampil_mapel").html(data);
                }
            });
        });
    });
</script>
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
                <h4>Selamat Datang, <?php echo $row_admin['nama']; ?></h4>
                </div>
            </div>
            <div class="col-sm-10 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Akademik</a></li>
                    <li class="breadcrumb-item active"><a href="Lesson.php">Mata Pelajaran</a></a></li>
                    <li class="breadcrumb-item active"><a href="AddLesson.php">Tambah Data Mata Pelajaran</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Mata Pelajaran</h4>
                    </div>
                    <div class="card-body mt-5">
                        <div class="form-validation">
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row" style="margin-left: auto;">
                                    <div class="col-xl-6">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Mata Pelajaran
                                            </label>
                                             <div class="col-lg-6">
                                                <input type="hidden" id="npsn" value="<?php echo $row_admin['npsn']; ?>" />
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jurusan
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="kode_jurusan" name="kode_jurusan">
                                                    <option value="">Silahkan Pilih Jurusan</option> 
                                                    <?php
                                                        $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."'";
                                                        $query_jurusan = $conn->query($sql_jurusan);
                                                        while($row_jurusan = $query_jurusan->fetch_assoc())
                                                            echo "<option value='".$row_jurusan['kode_jurusan']."'>".$row_jurusan['nama_jurusan']."</option>";
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kelas
                                            </label>
                                            <div class="col-lg-6" >
                                                <!-- <div id="tampil_kelas"></div> -->
                                                <select class="form-control" id="kode_kelas" name="kode_kelas">
                                                    <option value="">Silahkan Pilih Kelas</option>
                                                    <option value='10'>X</option>";
                                                    <option value='11'>XI</option>";
                                                    <option value='12'>XII</option>";
                                                </select>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kurikulum
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="kode_kurikulum" >
                                                    <option value="">Silahkan Pilih Kurikulum</option> 
                                                    <?php
                                                        $sql_kurikulum = "SELECT * FROM tb_kurikulum ";
                                                        $query_kurikulum = $conn->query($sql_kurikulum);
                                                        while($row_kurikulum = $query_kurikulum->fetch_assoc())
                                                            echo "<option value='".$row_kurikulum['kode_kurikulum']."'>".$row_kurikulum['nama']."</option>";
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Semester
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                 <div class="col-lg-6">
                                                    <select class="form-control" id="val-skill" name="semester">
                                                        <option value="">Pilih Semester</option>
                                                        <option value="Ganjil">Ganjil</option>
                                                        <option value="Genap">Genap</option>
                                                    </select>
                                                </div>                                                  
                                        </div>
                                        <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-website">Nilai KKM
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="kkm" name="kkm" placeholder="" >
                                                </div>
                                        </div>
                                        <div class="col-lg-10 mt-3" align="right">
                                            <input type="submit" name="tambah" id="tambah" value="Tambah" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a; width:25%;">
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
<?php include 'footer.php'; ?>
<?php
    if(isset($_POST['tambah'])) {
        $npsn = $row_admin['npsn'];
        $nama = $_POST['nama'];
        $kode_jurusan = $_POST['kode_jurusan'];
        $kode_kurikulum = $_POST['kode_kurikulum'];
        $kode_kelas = $_POST['kode_kelas'];
        $semester = $_POST['semester'];
        $kkm = $_POST['kkm'];
        $kode_mapel = str_replace(' ', '', $kode_jurusan.$kode_kelas.strtolower($nama));

        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
            //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        $query = "INSERT INTO tb_mapel VALUES (
            '$kode_mapel',
            '$nama',
            '$npsn',
            '$kode_jurusan',
            '$kode_kurikulum',
            '$kode_kelas',
            '$semester',
            '$kkm'
            )";
        
        echo '<script type="text/javascript">alert("'.$query.'")</script>';
        if (mysqli_query($conn, $query)) {
            ?>
            <script type="text/javascript">
                alert("Data Mata Pelajaran Berhasil Ditambah");
                window.location.href = "Lesson.php";
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Data Mata Pelajaran Gagal Ditambah, Silahkan Coba Lagi");
                window.location.href = "AddLesson.php";
            </script>
            <?php
        }
    }
?>