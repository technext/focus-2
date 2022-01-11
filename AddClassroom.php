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
                    <li class="breadcrumb-item active"><a href="Classroom.php">Kelas</a></li>
                    <li class="breadcrumb-item active"><a href="AddClassroom.php">Tambah Data Kelas</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Kelas</h4>
                    </div>
                    <div class="card-body mt-5">
                        <div class="form-validation">
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row" style="margin-left: auto;">
                                    <div class="col-xl-6">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">Tahun Akademik
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tahun_akademik" name="tahun_ akademik">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">Nama Kelas</label>
                                                <div class="col-lg-6">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <select id="inputState" name="kelas" class="form-control">
                                                                <option selected>Pilih Kelas</option>
                                                                <option value="10">X</option>
                                                                <option value="11">XI</option>
                                                                <option value="12">XII</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <input type="number" min="1" max="99" class="form-control" name="sub_kelas">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6">
                                       <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Wali Kelas </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="nip" >
                                                    <?php
                                                        $sql_wali_kelas = "SELECT * FROM tb_guru WHERE npsn='".$row_admin['npsn']."' AND id_tgs_tambahan='0' ";
                                                        $query_wali_kelas = $conn->query($sql_wali_kelas);
                                                    ?>
                                                    <option value="">Silahkan Pilih Wali Kelas</option> 
                                                    <?php
                                                        while($row_wali_kelas = $query_wali_kelas->fetch_assoc())
                                                            echo "<option value='".$row_wali_kelas['nip']."'>".$row_wali_kelas['nama']."</option>";
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jurusan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="kode_jurusan" >
                                                    <?php
                                                        $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."'";
                                                        $query_jurusan = $conn->query($sql_jurusan);
                                                    ?>
                                                    <option value="">Silahkan Pilih jurusan</option> 
                                                    <?php
                                                        while($row_jurusan = $query_jurusan->fetch_assoc())
                                                            echo "<option value='".$row_jurusan['kode_jurusan']."'>".$row_jurusan['nama_jurusan']."</option>";
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
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
<?php include 'footer.php'; ?>
<?php
    if(isset($_POST['tambah'])) {
        include '../db.php';
        
        $kelas = $_POST['kelas'];
        $sub_kelas = $_POST['sub_kelas'];
        if(strlen($sub_kelas)<2) $sub_kelas = "0".$sub_kelas;
        $kode_kelas = $kelas.$sub_kelas;
        
        if($kelas == "10") $kelas_rmw = "X";
        else if($kelas == "11") $kelas_rmw = "XI";
        else if($kelas == "12") $kelas_rmw = "XII";

        $nama_kelas = $kelas_rmw."-".$sub_kelas;

        $nip = $_POST['nip'];
        $npsn = $row_admin['npsn'];
        $kode_jurusan = $_POST['kode_jurusan'];
        $tahun_akademik = $_POST['tahun_akademik']; 
        $status = 'Aktif';

        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
            //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($npsn))
        echo "<script>alert('Anda Harus Memasukkan Angka pada Npsn')</script>";

        else {
            $query = "INSERT INTO tb_kelas VALUES (
                '$kode_kelas',
                '$nama_kelas',
                '$nip',
                '$npsn',
                '$kode_jurusan',
                '$tahun_akademik',
                '$status'
                )";

            $query_update = "UPDATE tb_guru SET id_tgs_tambahan='4' WHERE nip='".$nip."'";

            if (mysqli_query($conn, $query) && mysqli_query($conn, $query_update)) {
                ?>
                <script type="text/javascript">
                    alert("Data Kelas Berhasil Ditambah");
                    window.location.href = "Classroom.php";
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert("Data Kelas Gagal Ditambah, Silahkan Coba Lagi");
                    window.location.href = "AddClassroom.php";
                </script>
                <?php
            }
            
        }
    }
?>