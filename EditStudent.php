<?php 
    include '../db.php';
    session_start();
    if($_SESSION['level'] != "2") header('location: ../login.php');
    $nisn = $_GET['nisn'];
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
                </div>
            </div>
            <div class="col-sm-10 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                    <li class="breadcrumb-item active"><a href="StudentTable.php">Siswa</a></li>
                    <li class="breadcrumb-item active"><a href="EditStudent.php">Edit Data Siswa</a></li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <?php
                                $sql_siswa = "SELECT * FROM tb_siswa WHERE nisn='".$_GET['nisn']."' LIMIT 1";
                                $query_siswa = $conn->query($sql_siswa);
                                $row = $query_siswa->fetch_assoc();
                            ?>
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="col-lg-8">
                                            <img src="../assets/images/<?php echo $row['foto']; ?>" id="imagepreview"  style="width: 85%;">
                                            <script type="text/javascript">
                                                function showImage(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            $('#imagepreview').attr('src', e.target.result);
                                                        }
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                            </script>

                                            <div class="col-lg-12 mt-2" >
                                                <input type="hidden" name="gambarLama" value="<?php echo $row['foto'] ?>">
                                                <input type="file" name="gambar" id="image" onchange="showImage(this);" class="custom-file-input" value="../images/avatar/avatar.jpeg<?php echo $row['foto'];?>"; >
                                                <label class="custom-file-label" style="width:86%;">Pilih Foto</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> Ubah Password</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group row">
                                                        <label class="col-lg-6 col-form-label" for="val-website">Password Lama 
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="Password" class="form-control" id="val-website" name="val-website" placeholder="***">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-6 col-form-label" for="val-skill">Password Baru
                                                            <!-- <span class="Password-danger">*</span> -->
                                                        </label>
                                                            <div class="col-lg-6">
                                                            <input type="Password" class="form-control" id="val-website" name="val-website" placeholder="***">
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
                                                            <input type="Password" class="form-control" id="val-website" name="val-website" placeholder="*****">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-8">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">NISN
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $row['nisn']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">NIPD
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nipd" name="nipd" value="<?php echo $row['nipd']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Nama Lengkap
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Tempat lahir
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Tanggal Lahir
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                                <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label"  for="val-skill">Jenis Kelamin
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="radio" name="id_jk" value="1" <?php if($row['id_jk']=='1') echo 'checked'?>><label style="color:#4d4d4d; padding:4px; font-size:15px;">Wanita</label>
                                                <input type="radio" name="id_jk" value="2" <?php if($row['id_jk']=='2') echo 'checked'?>><label style="color:#4d4d4d; padding:4px; font-size:15px;">Pria</label>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label"  for="val-skill">Agama
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="id_agama" >
                                                    <?php
                                                        $sql_agama_selected = "SELECT * FROM id_agama WHERE id='".$row['id_agama']."' LIMIT 1";
                                                        $query_agama_selected = $conn->query($sql_agama_selected);
                                                        $id_agama_selected = $query_agama_selected->fetch_assoc();

                                                        $sql_agama = "SELECT * FROM id_agama";
                                                        $query_agama = $conn->query($sql_agama);
                                                    ?>
                                                    <option value="">Silahkan dipilih</option> 
                                                    <?php
                                                        while($row_agama = $query_agama->fetch_assoc()) {
                                                            if($id_agama_selected['id'] == $row_agama['id'])
                                                                echo "<option value='".$row_agama['id']."' selected>".$row_agama['nama']."</option>";
                                                            else
                                                                echo "<option value='".$row_agama['id']."'>".$row_agama['nama']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Alamat
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">NPSN
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="npsn" name="npsn" value="<?php echo $row['npsn']; ?>"readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jurusan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="kode_jurusan" >
                                                    <?php
                                                        $sql_jurusan_selected = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."' LIMIT 1";
                                                        $query_jurusan_selected = $conn->query($sql_jurusan_selected);
                                                        $kode_jurusan_selected = $query_jurusan_selected->fetch_assoc();

                                                        $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."'";
                                                        $query_jurusan = $conn->query($sql_jurusan);
                                                    ?>
                                                    <option value="">Silahkan dipilih</option> 
                                                    <?php
                                                        while($row_jurusan = $query_jurusan->fetch_assoc()) {
                                                            if($kode_jurusan_selected['kode_jurusan'] == $row_jurusan['kode_jurusan'])
                                                                echo "<option value='".$row_jurusan['kode_jurusan']."' selected>".$row_jurusan['nama_jurusan']."</option>";
                                                            else
                                                                echo "<option value='".$row_jurusan['kode_jurusan']."'>".$row_jurusan['nama_jurusan']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kelas
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="kode_kelas" >
                                                    <?php
                                                        $sql_kelas_selected = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."' AND kode_kelas='".$row['kode_kelas']."' LIMIT 1";
                                                        $query_kelas_selected = $conn->query($sql_kelas_selected);
                                                        $kode_kelas_selected = $query_kelas_selected->fetch_assoc();

                                                        $sql_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."'";
                                                        $query_kelas = $conn->query($sql_kelas);
                                                    ?>
                                                    <option value="">Silahkan dipilih</option> 
                                                    <?php
                                                        while($row_kelas = $query_kelas->fetch_assoc()) {
                                                            if($kode_kelas_selected['kode_kelas'] == $row_kelas['kode_kelas'])
                                                                echo "<option value='".$row_kelas['kode_kelas']."' selected>".$row_kelas['nama_kelas']."</option>";
                                                            else
                                                                echo "<option value='".$row_kelas['kode_kelas']."'>".$row_kelas['nama_kelas']."</option>";
                                                        }
                                                    ?> 
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Email
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">No HP
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">NIK Orang Tua/Wali
                                                <span class="text-danger" readonly>*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nik_wali" name="nik_wali" value="<?php echo $row['nik_wali'] ?>">
                                            </div>
                                        </div>
                                        <?php
                                            $sql_ortu = "SELECT * FROM tb_orangtua WHERE nik_wali='".$row['nik_wali']."' LIMIT 1";
                                            $query_ortu = $conn->query($sql_ortu);
                                            $row_ortu = $query_ortu->fetch_assoc();
                                        ?>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Nama Orang Tua/Wali
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama" name="nama_wali" value="<?php echo $row_ortu['nama'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Alamat Orang Tua/Wali
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                             <div class="col-lg-6">
                                                <input type="text" class="form-control" name="alamat_wali" value="<?php echo $row_ortu['alamat'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">No HP Orang Tua/Wali
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                             <div class="col-lg-6">
                                                <input type="text" class="form-control" name="no_hp_wali" value="<?php echo $row_ortu['no_hp'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Status Keluarga
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                             <div class="col-lg-6">
                                                <input type="text" class="form-control" name="status_keluarga" value="<?php echo $row_ortu['status_keluarga'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label"  for="val-skill">Status
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                        <div class="col-lg-8">
                                            <input type="radio" name="status" value="Aktif" <?php if($row['status']=='Aktif') echo 'checked'?>><label style="color:#4d4d4d; padding:4px; font-size:15px;">Aktif</label>
                                            <input type="radio" name="status" value="Tidak Aktif" <?php if($row['status']=='Tidak Aktif') echo 'checked'?>><label style="color:#4d4d4d; padding:4px; font-size:15px;">Tidak Aktif</label>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
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
</div>
<?php
    include 'footer.php';
    if(isset($_POST['edit'])) {
        function upload_gambar() {
            if (isset($_FILES['gambar'])) {
                $nama = uniqid() . "-" . $_FILES["gambar"]["name"];
                $tipe = $_FILES["gambar"]["type"];
                $lokasi_sem = $_FILES["gambar"]["tmp_name"];
                $error = $_FILES["gambar"]["error"];
                $ukuran = $_FILES["gambar"]["size"];

                $ekstensi = explode(".", $nama);
                $ekstensi = strtolower(end($ekstensi));

                $ekstensi_gambar = ["jpg","png","jpeg","bmp"];

                if ($error == 4) {
                    ?>
                    <script type="text/javascript">
                        alert("Gambar Belum Dipilih");
                        window.location.href = "../EditStudent.php";
                    </script>
                    <?php
                } elseif ($ukuran > 1048576) {
                    ?>
                    <script type="text/javascript">
                        alert("Maksimal Ukuran 1 Mb");
                        window.location.href = "../EditStudent.php";
                    </script>
                    <?php
                } elseif (in_array($ekstensi, $ekstensi_gambar) == false) {
                    ?>
                    <script type="text/javascript">
                        alert("Format File Salah");
                        window.location.href = "../EditStudent.php";
                    </script>
                    <?php
                } else {
                    move_uploaded_file($lokasi_sem, "../../assets/images/" . $nama);
                    return $nama;
                }
            }
        }

        $nisn = $_POST['nisn'];
        $kode_kelas = $_POST['kode_kelas'];
        $kode_jurusan = $_POST['kode_jurusan'];
        $npsn = $row_admin['npsn'];
        $nipd = $_POST['nipd'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $password = md5($nisn);
        $id_jk = $_POST['id_jk'];
        $id_agama = $_POST['id_agama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $gambarLama = $_POST['gambarLama'];
        $status = $_POST['status'];

        $nik_wali = $_POST['nik_wali'];

        $password_wali = md5($nik_wali);
        $nama_wali = $_POST['nama_wali'];
        $alamat_wali = $_POST['alamat_wali'];
        //$tempat_lahir_wali = $_POST['tempat_lahir'];
        //$tanggal_lahir_wali = $_POST['tanggal_lahir'];
        //$id_jk_wali = $_POST['id_jk'];
        $no_hp_wali = $_POST['no_hp_wali'];
        //$gambar_wali = upload_gambar();
        $status_keluarga = $_POST['status_keluarga'];
        //$pekerjaan_wali = $_POST['pekerjaan'];
        $status_wali = 'Aktif';

        $tempat_lahir_wali = "";
        $tanggal_lahir_wali = "0000-00-00";
        $id_jk_wali = "0";
        $gambar_wali = "";
        $pekerjaan_wali = "";

        if ($_FILES["gambar"]["error"] == 4)
            $gambar = $gambarLama;
        else
            $gambar	= upload_gambar();


        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
        //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($npsn))
            echo "<script>alert('Anda Harus Memasukkan Angka pada NPSN')</script>";
        else {
            $query = "UPDATE tb_siswa SET
                kode_kelas='$kode_kelas',
                kode_jurusan='$kode_jurusan',
                npsn='$npsn',
                nipd='$nipd',
                nik_wali='$nik_wali',
                nama='$nama',
                tempat_lahir='$tempat_lahir',
                tanggal_lahir='$tanggal_lahir',
                id_jk='$id_jk',
                id_agama='$id_agama',
                alamat='$alamat',
                email='$email',
                no_hp='$no_hp',
                foto='$gambar',
                status='$status'
                WHERE nisn='$nisn'";

            $query_wali = "UPDATE tb_orangtua SET
                nama='$nama_wali',
                password='$password_wali',
                alamat='$alamat_wali',
                tempat_lahir='$tempat_lahir_wali',
                tanggal_lahir='$tanggal_lahir_wali',
                id_jk='$id_jk_wali',
                no_hp='$no_hp_wali',
                foto='$gambar_wali',
                status_keluarga='$status_keluarga',
                pekerjaan='$pekerjaan_wali',
                status='$status_wali'
                WHERE nik_wali='$nik_wali'";

            if (mysqli_query($conn, $query) && mysqli_query($conn, $query_wali)) {
                ?>
                <script type="text/javascript">
                    alert("Data Siswa Berhasil Diperbaharui");
                    window.location.href = "StudentTable.php";
                </script>
                <?php
            }
            else {
                ?>
                <script type="text/javascript">
                    alert("Data Siswa Gagal Diperbaharui, Silahkan Coba Lagi");
                    window.location.href = "StudentTable.php";
                </script>
                <?php
            }
        }
    }
?>