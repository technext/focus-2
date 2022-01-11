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
                <h4>Selamat Datang,  <?php echo $row_admin['nama']; ?></h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Super Admin</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <?php
                            $sql_admin = "SELECT * FROM tb_admin WHERE username='".$_SESSION['username']."' LIMIT 1";
                            $query_admin = $conn->query($sql_admin);
                            $row = $query_admin->fetch_assoc();
                        ?>
                        <form class="form-valide" action="" method="post">
                            <div class="row">
                                <div class="col-xl-4">
                                    <img src="../assets/images/<?php echo $row['foto']; ?>" style="width: 60%;">
                                    <a type="button" class="btn btn-outline-primary mt-2" style="width:60%;" href="#">Edit Profile</a>
                                    <button type="button" class="btn btn-outline-warning mt-2" style="width:60%;" data-toggle="modal" data-target="#basicModal">Ganti Password</button>
                                   <!-- <div class="col-lg-12 mt-2">
                                            <a href="EditTeacher.php" class="btn btn-outline-primary" style="width:63%;">Edit Profil</a>
                                    </div> -->
                                </div>
                                <div class="modal fade" id="basicModal">
                                    <div class="modal-dialog" role="document">
                                        <form action="" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                
                                                <div class="col-xl-12">
                                                    <div class="form-group row">
                                                        <label class="col-lg-6 col-form-label" for="val-website">Password Lama 
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="Password" class="form-control" id="val-website" name="old_password" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-6 col-form-label" for="val-skill">Password Baru
                                                            <!-- <span class="Password-danger">*</span> -->
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="Password" class="form-control" id="val-website" name="new_password" />
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
                                                        <label class="col-lg-6 col-form-label" for="val-skill">Konfirmasi Password Baru
                                                            <!-- <span class="text-danger">*</span> -->
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="Password" class="form-control" id="val-website" name="confirm_password" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="change_pass" value="Save Changes" />
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                            if(isset($_POST['change_pass'])) {
                                                $oldPassword = md5($_POST['old_password']);
                                                $newPassword = md5($_POST['new_password']);
                                                $conPassword = md5($_POST['confirm_password']);
                                                if($oldPassword == $row_admin['password']) {
                                                    if($newPassword == $conPassword) {
                                                        $sql_update_pass = "UPDATE tb_admin SET password='".$newPassword."' WHERE username='".$row_admin['username']."'";
                                                        if($query_update_pass = $conn->query($sql_update_pass))
                                                            echo '<script type="text/javascript">alert("Password Anda Telah Diganti!");</script>';
                                                        else
                                                            echo '<script type="text/javascript">alert("Password Anda Gagal Diganti!");</script>';
                                                    }
                                                    else
                                                    echo '<script type="text/javascript">alert("Password Tidak Sinkron!");</script>';
                                                }
                                                else 
                                                    echo '<script type="text/javascript">alert("Password Lama Anda Salah!");</script>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Username
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <span><?php echo $row['username']; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Nama Lengkap
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <span><?php echo $row['nama']; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-website">Nama Sekolah Asal
                                        </label>
                                        <div class="col-lg-6">
                                            <?php
                                                $sql_sekolah = "SELECT * FROM tb_sekolah WHERE npsn='".$row_admin['npsn']."' LIMIT 1";
                                                $query_sekolah = $conn->query($sql_sekolah);
                                                $row_sekolah = $query_sekolah->fetch_assoc();
                                            ?>
                                            <span><?php if(!empty($row_sekolah['nama'])) echo $row_sekolah['nama']; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">T.Tanggal Lahir
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <span><?php echo $row['tempat_lahir']; ?>  <?php echo $row['tanggal_lahir']; ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row text-dark">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Jenis Kelamin
                                        </label>
                                        <div class="col-lg-6">
                                            <?php
                                                $sql_jk = "SELECT * FROM id_jk WHERE id='".$row_admin['id_jk']."' LIMIT 1";
                                                $query_jk = $conn->query($sql_jk);
                                                $row_jk = $query_jk->fetch_assoc();
                                            ?>
                                            <span><?php echo $row_jk['nama']; ?></span>
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
                                        <label class="col-lg-4 col-form-label" for="val-skill">No Handphone
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <span><?php echo $row['no_hp']; ?></span>
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
                                        <label class="col-lg-4 col-form-label" for="val-skill">Status
                                            <!-- <span class="text-danger">*</span> -->
                                        </label>
                                        <div class="col-lg-6">
                                            <span><?php echo $row['status']; ?></span>
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
?>