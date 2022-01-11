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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Akademik</a></li>
                <li class="breadcrumb-item active"><a href="Department.php">Jadwal Mata Pelajaran</a></li>
                <li class="breadcrumb-item active"><a href="AddDepartment.php">Edit Jadwal Mata Pelajaran</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Jadwal Mata Pelajaran</h4>
                </div>
                <div class="card-body mt-5">
                    <div class="form-validation">
                        <?php
                            $sql_jwl = "SELECT * FROM tb_jadwal_mapel WHERE";
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
                                        <label class="col-lg-4 col-form-label" for="val-skill">NPSN
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                         <input type="text" class="form-control" id="npsn" name="npsn"  value="<?php echo $row_admin['npsn'] ?>"  readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Mata Pelajarann
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                         <input type="text" class="form-control" id="kode_mapel" name="kode_mapel"  value="<?php echo $row['nama'] ?>"  readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Jurusan
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                         <select id="inputState" class="form-control" name="kode_jurusan" >
                                         <option value="<?php echo $row4['kode_jurusan'] ?>"> " <?php echo $row4['nama_jurusan'] ?> "</option> 
                                         <option value="">Pilih Jurusan</option> 
                                            <?php $ambil2 = $conn->query("SELECT * FROM tb_jurusan WHERE npsn='".$_SESSION['npsn']."'") ?>
                                            <?php while($pecah_o = $ambil2->fetch_assoc()){ ?>
                                            <option value="<?php echo $pecah_o['kode_jurusan'] ?>"><?php echo $pecah_o['nama_jurusan'] ?></option> 
                                         <?php } ?>  
                                         </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Kelas
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                         <select id="inputState" class="form-control" name="kode_kelas" >
                                         <option value="<?php echo $row5['kode_kelas'] ?>"> " <?php echo $row5['nama_kelas'] ?> "</option> 
                                         <option value="">Pilih kelas</option> 
                                            <?php $ambil3 = $conn->query("SELECT * FROM tb_kelas WHERE npsn='".$_SESSION['npsn']."'") ?>
                                            <?php while($pecah_o3 = $ambil3->fetch_assoc()){ ?>
                                            <option value="<?php echo $pecah_o3['kode_kelas'] ?>"><?php echo $pecah_o3['nama_kelas'] ?></option> 
                                         <?php } ?>  
                                         </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Nama Guru
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                         <select id="inputState" class="form-control" name="nip" >
                                         <option value="<?php echo $row6['nip'] ?>"> " <?php echo $row6['nama'] ?> "</option> 
                                         <option value="">Pilih Guru</option> 
                                            <?php $ambil4 = $conn->query("SELECT * FROM tb_guru WHERE npsn='".$_SESSION['npsn']."'") ?>
                                            <?php while($pecah_o4 = $ambil4->fetch_assoc()){ ?>
                                            <option value="<?php echo $pecah_o4['nip'] ?>"><?php echo $pecah_o4['nama'] ?></option> 
                                         <?php } ?>  
                                         </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6">
                                   <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Hari
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="hari" name="hari">
                                                <option value="<?php echo $row['hari'] ?>"> " <?php echo $row['hari'] ?> "</option> 
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
    
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Tahun Akademik
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="tahun_akademik" name="tahun_akademik">
                                                <option value="<?php echo $row['tahun_akademik'] ?>"> " <?php echo $row['tahun_akademik'] ?> "</option> 
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
                                    <!-- <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-website">Website
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-website" name="val-website" placeholder="http://example.com">
                                        </div>
                                    </div> -->
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Jam Mulai
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="time" name="jam_mulai" value="<?php echo $row['jam_mulai'] ?>"   required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Jam Selesai
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="time" name="jam_selesai" value="<?php echo $row['jam_selesai'] ?>" required>
                                        </div>
                                    </div>
                                    
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
<?php 
    include 'footer.php';
?>