<?php 
// include '../config/db_config.php';
// session_start();
// $nip = $_GET['nip'];

// $query3 = "SELECT * FROM tb_guru WHERE nip='$nip'";
// $rows3 = mysqli_query($conn, $query3);
// $row = mysqli_fetch_assoc($rows3);
// $ambil=$conn->query("SELECT * FROM tb_guru JOIN id_agama ON tb_guru.id_agama=id_agama.id ");
// $pecah= $ambil->fetch_assoc();
// $ambil=$conn->query("SELECT * FROM tb_guru JOIN id_jk ON tb_guru.id_jk=id_jk.id ");
// $row2= $ambil->fetch_assoc();
// $ambil=$conn->query("SELECT * FROM tb_guru JOIN tb_sekolah ON tb_guru.npsn=tb_sekolah.npsn ");
// $row3= $ambil->fetch_assoc();
// $ambil4=$conn->query("SELECT * FROM tb_guru JOIN id_tgs_tambahan ON tb_guru.id_tgs_tambahan=id_tgs_tambahan.id ");
// $row4= $ambil4->fetch_assoc();
include 'top.php';
include 'samping.php';

?>
<div class="content-body">
<div class="container-fluid">
    <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi,Admin</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                            <li class="breadcrumb-item active"><a href="TeacherTable.php">Guru</a></li>
                            <li class="breadcrumb-item active"><a href="DetailTeacherTable.php">Detail Data Guru</a></li>
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
                                    <form class="form-valide" action="#" method="post">
                                        <div class="row">
                                        <div class="col-xl-4">
                                                <img src="../assets/images/<?php echo $row['foto']; ?>" style="width: 60%;">
                                                <a href="EditTeacher.php?nip=<?php echo $row['nip']; ?>" class="btn btn-outline-primary" style="width:60%; margin-top:10px;">Edit Profil</a>
                                               <!-- <div class="col-lg-12 mt-2">
                                                        <a href="EditTeacher.php" class="btn btn-outline-primary" style="width:63%;">Edit Profil</a>
                                                </div> -->
                                            </div>
                                            <div class="col-xl-8">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Nip
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row['nip']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Nama Lengkap
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row['nama']; ?></span>
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
                                                <!-- <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Password
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span>12345678</span>
                                                    </div>
                                                </div> -->
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">T.Tanggal Lahir
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row['tempat_lahir']; ?>, <?php echo $row['tanggal_lahir']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Jenis Kelamin
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row2['nama']; ?></span>
                                                    </div>
                                                </div>
                                               <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Alamat
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row['alamat']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">NUPTK
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row['nuptk']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Status Pegawai
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row['status_kepegawaian']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Tugas Tambahan
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row4['nama']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">No Hp
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row['no_hp']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">No Srtifikasi
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row4['nomor_sertifikasi']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Email
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row4['email']; ?></span>
                                                    </div>
                                                </div>
                                                
                                                <!-- <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div> -->
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

 ?>