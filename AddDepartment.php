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
                    <h4>Selamat Datang, <?php echo $row_admin['nama']; ?></h4>
                </div>
            </div>
            <div class="col-sm-10 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Akademik</a></li>
                    <li class="breadcrumb-item active"><a href="Department.php">Jurusan</a></li>
                    <li class="breadcrumb-item active"><a href="AddDepartment.php">Tambah Data Jurusan</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Jurusan</h4>
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
                                        <!-- <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">NPSN
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nppsn" name="nppsn" value="<?php echo $_SESSION['npsn']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">Kode Jurusan
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" placeholder="Misal 00IA1">
                                            </div>
                                        </div> -->
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Nama Jurusan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                             <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                    <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kepala Jurusan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="nip" >
                                                    <?php
                                                        $sql_ketua_jurusan = "SELECT * FROM tb_guru WHERE npsn='".$row_admin['npsn']."' AND id_tgs_tambahan='0'";
                                                        $query_ketua_jurusan = $conn->query($sql_ketua_jurusan);
                                                    ?>
                                                    <option value="">Silahkan Pilih Kepala Jurusan</option> 
                                                    <?php
                                                        while($row_ketua_jurusan = $query_ketua_jurusan->fetch_assoc()) {
                                                            if($kode_ketua_jurusan_ketua_jurusan_selected['nip'] == $row_ketua_jurusan['nip'])
                                                                echo "<option value='".$row_ketua_jurusan['nip']."' selected>".$row_ketua_jurusan['nama']."</option>";
                                                            else
                                                                echo "<option value='".$row_ketua_jurusan['nip']."'>".$row_ketua_jurusan['nama']."</option>";
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
                                            <div class="col-lg-8 ml-auto">
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
<?php
    include 'footer.php';
    
    if(isset($_POST['tambah'])) {
        include '../db.php';

        $npsn = $row_admin['npsn'];
        $nama_jurusan = $_POST['nama_jurusan'];
        $nip = $_POST['nip'];
        $kode_jurusan = $npsn.strtolower($nama_jurusan);


        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
            //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($npsn))
        echo "<script>alert('Anda Harus Memasukkan Angka pada Npsn')</script>";

        else {
            $query = "INSERT INTO tb_jurusan VALUES (
                '$kode_jurusan',
                '$npsn',
                '$nama_jurusan',
                '$nip'
                )";

            $query_update = "UPDATE tb_guru SET id_tgs_tambahan='3' WHERE nip='".$nip."'";

            if (mysqli_query($conn, $query) && mysqli_query($conn, $query_update)) {
                ?>
                <script type="text/javascript">
                    alert("Data Jurusan Berhasil Ditambah");
                    window.location.href = "Department.php";
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert("Data Jurusan Gagal Ditambah, Silahkan Coba Lagi");
                    window.location.href = "AddDepartment.php";
                </script>
                <?php
            }
            
        }
    }
?>