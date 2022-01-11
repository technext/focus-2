<?php
    session_start();
    if($_SESSION['level'] != "2") header('location: ../login.php');
    include 'top.php';
    include 'samping.php';
    include '../db.php';
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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Akademik</a></li>
                    <li class="breadcrumb-item active"><a href="Department.php">Jurusan</a></li>
                    <li class="breadcrumb-item active"><a href="editDepartment.php">Edit Data Jurusan</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Jurusan</h4>
                    </div>

                    <div class="card-body mt-5">
                        <div class="form-validation">
                            <?php
                                $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."'";
                                $query_jurusan = $conn->query($sql_jurusan);
                                $row = $query_jurusan->fetch_assoc();
                            ?>
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
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-website">NPSN
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nppsn" name="nppsn" value="<?php echo $row['npsn']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-website">Kode Jurusan
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan"  value="<?php echo $row['kode_jurusan']; ?>" placeholder="Misal 00IA1" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Nama Jurusan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan"  value="<?php echo $row['nama_jurusan']; ?>" placeholder="IPA">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kepala Jurusan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="nip">
                                                    <?php
                                                        $sql_guru_selected = "SELECT * FROM tb_guru WHERE npsn='".$row_admin['npsn']."' AND nip='".$row['nip']."' LIMIT 1";
                                                        $query_guru_selected = $conn->query($sql_guru_selected);
                                                        $row_guru_selected = $query_guru_selected->fetch_assoc();

                                                        $sql_guru = "SELECT * FROM tb_guru WHERE npsn='".$row_admin['npsn']."'";
                                                        $query_guru = $conn->query($sql_guru);

                                                        while($row_guru = $query_guru->fetch_assoc()){
                                                            if($row_guru['nip']==$row_guru_selected['nip'])
                                                                echo '<option value="'.$row_guru['nip'].'" selected>'.$row_guru['nama'].'</option>';
                                                            else
                                                                echo '<option value="'.$row_guru['nip'].'">'.$row_guru['nama'].'</option>';
                                                        }
                                                    ?>
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
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-website"> </label>
                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
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
<?php 
    include 'footer.php';
    $kode_jurusan = $_POST['kode_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $kepala_jurusan = $_POST['nip'];
    $npsn = $_SESSION['npsn'];

	$query = "UPDATE tb_jurusan SET 
        npsn='$npsn',
		nama_jurusan='$nama_jurusan' ,
		nip='$kepala_jurusan'
		WHERE kode_jurusan='$kode_jurusan'";

	if (mysqli_query($conn, $query)) {
		?>
		<script type="text/javascript">
			alert("Data Jurusan Berasil Di Update");
			window.location.href = "../Department.php";
		</script>
		<?php
	} else {
		?>
		<script type="text/javascript">
			alert("Data Jurusan Gagal Di Update, Silahkan Ulang Kembali");
			window.location.href = "../Department.php?status=gagal";
		</script>
		<?php
	}
?>