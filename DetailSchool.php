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
            <div class="col-sm-8 p-md-0">
                <div class="welcome-text">
                    <?php
                        $sql_admin = "SELECT * FROM tb_admin WHERE username='".$_SESSION['username']."' LIMIT 1";
                        $query_admin = $conn->query($sql_admin);
                        $row_admin = $query_admin->fetch_assoc();
                    ?>
                    <h4>Selamat Datang,  <?php echo $row_admin['nama']; ?></h4>
                </div>
            </div>
            <div class="col-sm-4 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Sekolah.php">Sekolah</a></li>
                    <li class="breadcrumb-item active"><a href="DetailSchool.php">Detail Sekolah</a></li>       
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="welcome-text">
                            <h1>Informasi Sekolah</h1>
                        </div>
                        <div class="justify-content-end card-header">
                        <?php
                            $sql_sekolah = "SELECT * FROM tb_sekolah WHERE npsn='".$row_admin['npsn']."' LIMIT 1";
                            $query_sekolah = $conn->query($sql_sekolah);
                            $row = $query_sekolah->fetch_assoc();
                        ?>
                        <a href="EditSchool.php" class="btn btn-outline-primary"><i class="icon icon-edit-72"></i>Edit Profil Sekolah</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="#" method="post">
                            <div class="col-lg-8" style="margin-left: 20%;"  >
                                <!--  <img src="images/smk.jpg" style="width: 660px; "> -->
                            </div>
                            <div class="row mt-5" >
                                <!-- <div class="col-xl-4">
                                    <img src="../images/avatar/avatar-operator.png" style="width: 60%;">
                                    <div class="col-lg-12 mt-2">
                                            <a href="EditStudent.php"><button type="submit" class="btn btn-outline-primary" style="width:55%;">Edit Profil</button></a>
                                    </div>
                                    <div class="col-lg-12 mt-2"> 
                                            <a href="EditTeacher.php"><button type="submit" class="btn btn-outline-primary" style="width:55%;">Ganti Password</button></a>
                                    </div> 
                                </div> -->
                                <div class="col-xl-8" style="margin-left: auto;" >
                                    <div class="form-group row">
                                        <img src="../assets/images/<?php echo $row['foto']; ?>" width="60%">
                                    </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label text-dark" for="val-website">NPSN
                                                <span class="text-danger">*</span>
                                            </label>
                                                <div class="col-lg-6">
                                                <span class="text-dark"><?php echo $row['npsn']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label text-dark" for="val-skill">NSS
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <span><?php echo $row['nss']; ?></span>
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
                                            <label class="col-lg-4 col-form-label text-dark" for="val-skill">Nama Sekolah
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <span><?php echo $row['nama']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Alamat
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <span><?php echo $row['alamat']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kelurahan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <span><?php echo $row['kelurahan']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kecamatan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <span><?php echo $row['kecamatan']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kabupaten
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <span><?php echo $row['kab_kota']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Provinsi
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <span><?php echo $row['provinsi']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kode Pos
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <span><?php echo $row['kode_pos']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">No Telepon
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <span><?php echo $row['no_telepon']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Email
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <span><?php echo $row['email']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Website
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <span><?php echo $row['website']; ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kepala Sekolah
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <?php
                                                    $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$row['nip']."' LIMIT 1";
                                                    $query_guru = $conn->query($sql_guru);
                                                    if($query_guru->num_rows>0) {
                                                        $row_guru = $query_guru->fetch_assoc();
                                                        echo "<span>".$row_guru['nama']."</span>";
                                                    }
                                                    else echo "<span class='text-danger'>Invalid NIP</span>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Status
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <span><?php echo $row['status']; ?></span>
                                            </div>
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
<?php include 'footer.php'; ?>