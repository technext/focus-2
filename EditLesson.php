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
                    <li class="breadcrumb-item active"><a href="Department.php">Jurusan</a></li>
                    <li class="breadcrumb-item active"><a href="editDepartment.php">Edit Data Mata Pelajaran</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Mata Pelajaran</h4>
                    </div>
                    <div class="card-body mt-5">
                        <div class="form-validation">
                            <?php
                                $sql_mapel = "SELECT * FROM tb_mapel WHERE kode_mapel='".$_GET['kode_mapel']."' LIMIT 1";
                                $query_mapel = $conn->query($sql_mapel);
                                $row = $query_mapel->fetch_assoc();
                            ?>
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row" style="margin-left: auto;">
                                    <div class="col-xl-6">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">Kode Mapel
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" placeholder="Misal 00IA1" value="<?php echo $row['kode_mapel']; ?>"  readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">NPSN
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="npsn" name="npsn" placeholder="Misal 00IA1" value="<?php echo $row_admin['npsn']; ?>"  readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Mata Pelajaran
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                             <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Matematika" value="<?php echo $row['nama']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jurusan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="kode_jurusan">
                                                    <?php
                                                        $sql_jurusan_selected = "SELECT * FROM tb_jurusan WHERE kode_jurusan='".$row['kode_jurusan']."' LIMIT 1";
                                                        $query_jurusan_selected = $conn->query($sql_jurusan_selected);
                                                        $id_jurusan_selected = $query_jurusan_selected->fetch_assoc();

                                                        $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."'";
                                                        $query_jurusan = $conn->query($sql_jurusan);
                                                    ?>
                                                    <option value="">Silahkan Pilih Jurusan</option> 
                                                    <?php
                                                        while($row_jurusan = $query_jurusan->fetch_assoc()) {
                                                            if($id_jurusan_selected['kode_jurusan'] == $row_jurusan['kode_jurusan'])
                                                                echo "<option value='".$row_jurusan['kode_jurusan']."' selected>".$row_jurusan['nama_jurusan']."</option>";
                                                            else
                                                                echo "<option value='".$row_jurusan['kode_jurusan']."'>".$row_jurusan['nama_jurusan']."</option>";
                                                        }
                                                    ?>
                                                </select>  
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kurikulum
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="kode_kurikulum">
                                                    <?php
                                                        $sql_kurikulum_selected = "SELECT * FROM tb_kurikulum WHERE kode_kurikulum='".$row['kode_kurikulum']."' LIMIT 1";
                                                        $query_kurikulum_selected = $conn->query($sql_kurikulum_selected);
                                                        $id_kurikulum_selected = $query_kurikulum_selected->fetch_assoc();

                                                        $sql_kurikulum = "SELECT * FROM tb_kurikulum";
                                                        $query_kurikulum = $conn->query($sql_kurikulum);
                                                    ?>
                                                    <option value="">Silahkan Pilih kurikulum</option> 
                                                    <?php
                                                        while($row_kurikulum = $query_kurikulum->fetch_assoc()) {
                                                            if($id_kurikulum_selected['kode_kurikulum'] == $row_kurikulum['kode_kurikulum'])
                                                                echo "<option value='".$row_kurikulum['kode_kurikulum']."' selected>".$row_kurikulum['nama']."</option>";
                                                            else
                                                                echo "<option value='".$row_kurikulum['kode_kurikulum']."'>".$row_kurikulum['nama']."</option>";
                                                        }
                                                    ?>
                                                </select>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kelas
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="kode_kelas">
                                                    <?php
                                                        $sql_mapel_selected = "SELECT * FROM tb_mapel WHERE kode_mapel='".$row['kode_mapel']."' LIMIT 1";
                                                        $query_mapel_selected = $conn->query($sql_mapel_selected);
                                                        $id_mapel_selected = $query_mapel_selected->fetch_assoc();

                                                        $sql_mapel = "SELECT * FROM tb_mapel WHERE kode_mapel='".$row['kode_mapel']."'";
                                                        $query_mapel = $conn->query($sql_mapel);
                                                    ?>
                                                    <option value="">Silahkan Pilih kelas</option> 
                                                    <?php
                                                        while($row_mapel = $query_mapel->fetch_assoc()) {
                                                            if($id_mapel_selected['kode_kelas'] == $row_mapel['kode_kelas'])
                                                                echo "<option value='".$row_mapel['kode_kelas']."' selected>".$row_mapel['kode_kelas']."</option>";
                                                            else
                                                                echo "<option value='".$row_mapel['kode_kelas']."'>".$row_mapel['kode_kelas']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                                </div>
                                        </div>
                                        <!--<div class="form-group row text-dark">-->
                                        <!--        <label class="col-lg-4 col-form-label" for="val-skill">Semester-->
                                                    <!-- <span class="text-danger">*</span> -->
                                        <!--        </label>-->
                                        <!--        <div class="col-lg-6">-->
                                        <!--            <input type="radio" name="semester" value="Ganjil" <?php if($row['semester']=='Ganjil') echo 'checked'?>>-->
                                        <!--                <label style="color:black; padding:4px">Ganjil</label>-->
                                        <!--            <input type="radio" name="semester" value="Genap" <?php if($row['semester']=='Genap') echo 'checked'?>>-->
                                        <!--                <label style="color:black; padding:4px">Genap</label>-->
                                        <!--        </div>                                                 -->
                                        <!--</div>-->
                                        <div class="form-group row text-dark">
                                                <label class="col-lg-4 col-form-label" for="val-website">Nilai KKM
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="kkm" name="kkm" placeholder="contoh: 88" value="<?php echo $row['kkm'] ?>"  >
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-website"> </label>
                                                <div class="col-lg-6">
                                                <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
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
<?php include 'footer.php'; 
 if(isset($_POST['edit'])) {

        $kode_mapel = $_POST['kode_mapel'];
        $npsn = $row_admin['npsn'];
        $nama = $_POST['nama'];
        $kode_jurusan = $_POST['kode_jurusan'];
        $kode_kurikulum = $_POST['kode_kurikulum'];
        $kode_kelas = $_POST['kode_kelas'];
        $semester = $_POST['semester'];
        $kkm = $_POST['kkm'];


        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
        //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($npsn))
            echo "<script>alert('Anda Harus Memasukkan Angka pada NPSN')</script>";
        else {
            $query = "UPDATE tb_mapel SET
                    nama='$nama',
                    npsn='$npsn',
                    kode_jurusan='$kode_jurusan',
                    kode_kurikulum='$kode_kurikulum',
                    kode_kelas='$kode_kelas',
                    semester='$semester',
                    kkm='$kkm'
                    WHERE kode_mapel='$kode_mapel'";

            if (mysqli_query($conn, $query)) {
                ?>
                <script type="text/javascript">
                    alert("Data Mapel Berhasil Diperbaharui");
                    window.location.href = "Lesson.php";
                </script>
                <?php
            }
            else {
                ?>
                <script type="text/javascript">
                    alert("Data Mapel Gagal Diperbaharui, Silahkan Coba Lagi");
                    window.location.href = "Lesson.php";
                </script>
                <?php
            }
        }
    }
?>