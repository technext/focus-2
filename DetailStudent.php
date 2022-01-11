<?php 
// include '../config/db_config.php';
// session_start();
// $nisn = $_GET['nisn'];
// $query3 = "SELECT * FROM tb_siswa WHERE nisn='$nisn'";
// $rows3 = mysqli_query($conn, $query3);
// $row = mysqli_fetch_assoc($rows3);
// $ambil=$conn->query("SELECT * FROM tb_siswa JOIN id_agama ON tb_siswa.id_agama=id_agama.id ");
// $pecah= $ambil->fetch_assoc();
// $ambil2=$conn->query("SELECT * FROM tb_siswa JOIN id_jk ON tb_siswa.id_jk=id_jk.id ");
// $row2= $ambil2->fetch_assoc();
// $ambil3=$conn->query("SELECT * FROM tb_siswa JOIN tb_jurusan ON tb_siswa.kode_jurusan=tb_jurusan.kode_jurusan");
// $row3= $ambil3->fetch_assoc();
// $ambil4=$conn->query("SELECT * FROM tb_siswa JOIN tb_orangtua ON tb_siswa.nik_wali=tb_orangtua.nik_wali");
// $row4= $ambil4->fetch_assoc();
// $ambil5=$conn->query("SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.kode_kelas=tb_kelas.kode_kelas JOIN tb_guru ON tb_kelas.nip=tb_guru.nip");
// $row5= $ambil5->fetch_assoc();
include 'top.php';
include 'samping.php';

 ?>
<div class="content-body">
<div class="container-fluid">
    <div class="row page-titles mx-0">
                    <div class="col-sm-2 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, Admin</h4>
                            
                        </div>
                    </div>
                    <div class="col-sm-10 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                            <li class="breadcrumb-item active"><a href="StudentTable.php">Siswa</a></li>
                            <li class="breadcrumb-item active"><a href="DetailStudentTable.php">Detail Data Siswa</a></li>
                        </ol>
                    </div>
                </div>
            <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail Data Siswa</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="#" method="post">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                   <div class="col-lg-12 mt-2">
                                                        <img src="../images/avatar/avatar.jpeg<?php echo $row['foto']; ?>" style="width: 55%;">  
                                                        <a href="EditStudent.php?nisn=<?php echo $row['nisn']; ?>" class="btn btn-outline-primary" style="width:55%; margin-top:10px;">Edit Profil</a>
                                                </div>
                                                <!-- <div class="col-lg-12 mt-2">
                                                        <a href="EditTeacher.php"><button type="submit" class="btn btn-outline-primary" style="width:55%;">Ganti Password</button></a>
                                                </div> -->
                                            </div>
                                            <div class="col-xl-8">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-website">NISN
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row['nisn']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">NIPD
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                      <div class="col-lg-6">
                                                        <span><?php echo $row['nipd']; ?></span>
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
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Nama Lengkap
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row['nama']; ?></span>
                                                    </div>
                                                </div>
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
                                                        <span><?php echo $pecah['nama']; ?></span>
                                                    </div>
                                                </div>
                                               <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Agama
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row2['nama']; ?> </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Nama Wali
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row4['nama']; ?></span>
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
                                                    <label class="col-lg-4 col-form-label" for="val-skill">NPSN
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row['npsn']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Jurusan
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row3['nama_jurusan']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Kelas
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row5['nama_kelas']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Wali Kelas
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <span><?php echo $row5['nama']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Email
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row['email']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">No HP
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row['no_hp']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">NIK Orang Tua/Wali
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row['nik_wali']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Nama Orang Tua/Wali
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row['nama']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Status
                                                        <!-- <span class="text-danger">*</span> -->
                                                    </label>
                                                     <div class="col-lg-6">
                                                        <span><?php echo $row['status']; ?></span>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <!-- <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
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