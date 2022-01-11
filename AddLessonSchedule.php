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
                    <li class="breadcrumb-item active"><a href="LessonSchedule.php">Jadwal Mata Pelajaran</a></li>
                    <li class="breadcrumb-item active"><a href="">Tambah Data Jadwal Mata Pelajaran</a></li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Jadwal Mata Pelajaran</h4>
                    </div>

                    <div class="card-body mt-5">
                        <div class="form-validation">
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row" style="margin-left: auto;">
                                    <div class="col-xl-6">
                                        <!--  <img src="../images/avatar/avatar-operator.png" style="width: 60%;">
                                        <div class="col-lg-12 mt-2">
                                                <a href="AddTeacher.php"><button type="submit" class="btn btn-outline-primary" style="width:55%;">Pilih Profil</button></a>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                                <button type="button" class="btn btn-outline-primary" style="width:55%;" data-toggle="modal" data-target="#basicModal">Ganti Password</button>
                                        </div> -->
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">NPSN
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="npsn" name="npsn" value="<?php echo $row_admin['npsn'] ?>" readonly >
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jurusan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="kode_jurusan" name="kode_jurusan" >
                                                    <?php
                                                        $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."'";
                                                        $query_jurusan = $conn->query($sql_jurusan);
                                                    ?>
                                                    <option value="">Silahkan Pilih Jurusan</option> 
                                                    <?php
                                                        while($row_jurusan = $query_jurusan->fetch_assoc())
                                                            echo "<option value='".$row_jurusan['kode_jurusan']."'>".$row_jurusan['nama_jurusan']."</option>";
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="tampil_kelas"></div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Guru
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="nip" >
                                                    <?php
                                                        $sql_wali_kelas = "SELECT * FROM tb_guru WHERE npsn='".$row_admin['npsn']."'";
                                                        $query_wali_kelas = $conn->query($sql_wali_kelas);
                                                    ?>
                                                    <option value="">Silahkan Pilih Guru Mapel</option> 
                                                    <?php
                                                        while($row_wali_kelas = $query_wali_kelas->fetch_assoc())
                                                            echo "<option value='".$row_wali_kelas['nip']."'>".$row_wali_kelas['nama']."</option>";
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Tahun Akademik
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="tahun_akademik" name="tahun_akademik">
                                                    <option value="">Pilih Tahun Akademik</option>
                                                    <option value="2021/2022">2021/2022</option>
                                                    <option value="2022/2023">2022/2023</option>
                                                    <option value="2023/2024">2023/2024</option>
                                                    <option value="2024/2025">2024/2025</option>
                                                    <option value="2025/2026">2025/2026</option>
                                                    <option value="2026/2027">2026/2027</option>
                                                    <option value="2028/2029">2028/2029</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Hari
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="hari" name="hari">
                                                    <option value="">Pilih Hari</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jumat">Jumat</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                    <option value="Minggu">Minggu</option>
                                                </select>
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
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jam Mulai
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="time" name="jam_mulai" required>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jam Selesai
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="time" name="jam_selesai" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-website"> </label>
                                            <div class="col-lg-6">
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
</div>
<?php 
    include 'footer.php';
    
    if(isset($_POST['tambah'])) {
        $npsn = $row_admin['npsn'];
        $kode_mapel = $_POST['kode_mapel'];
        $kode_jurusan = $_POST['kode_jurusan'];
        $kode_kelas = $_POST['kode_kelas'];
        $nip = $_POST['nip'];
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $tahun_akademik = $_POST['tahun_akademik'];
    
    	$query = "INSERT INTO tb_jadwal_mapel VALUES (
    		'$npsn',
    		'$kode_mapel',
    		'$kode_jurusan',
    		'$kode_kelas',
            '$nip',
    		'$hari',
    		'$jam_mulai',
    		'$jam_selesai',
    		'$tahun_akademik'
        	)";
        
    	if (mysqli_query($conn, $query)) {
    		?>
    		<script type="text/javascript">
    			alert("Tambah Jadwal Pelajaaran Berasil");
    			window.location.href = "LessonSchedule.php";
    		</script>
    		<?php
    	} else {
    		?>
    		<script type="text/javascript">
    			alert("Tambah Jadwal Pelajaaran Gagal, Silahkan Ulang Kembali");
    			window.location.href = "LessonSchedule.php";
    		</script>
    		<?php
    	}
    }

?>