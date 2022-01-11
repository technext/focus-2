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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Akademik</a></li>
                    <li class="breadcrumb-item active"><a href="DetailSchool.php">Sekolah</a></li>       
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Sekolah</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-validation">
                            <?php
                                $sql_sekolah = "SELECT * FROM tb_sekolah WHERE npsn='".$row_admin['npsn']."' LIMIT 1";
                                $query_sekolah = $conn->query($sql_sekolah);
                                $row = $query_sekolah->fetch_assoc();
                            ?>
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-3">
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
                                        <div class="col-lg-12 mt-2">
                                            <input type="hidden" name="gambarLama" value="<?php echo $row ['foto'] ?>">
                                            <input type="file" name="gambar" id="image" onchange="showImage(this);" class="custom-file-input" value="../assets/images/<?php echo $row['foto']; ?>" >
                                            <label class="custom-file-label" style="width:86%;">Pilih Foto</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-8">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">NPSN
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="npsn" name="npsn" value="<?php echo $row['npsn']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">NSS
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nss" name="nss" value="<?php echo $row['nss']; ?>">
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
                                            <label class="col-lg-4 col-form-label" for="val-skill">Nama Sekolah
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
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
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kelurahan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo $row['kelurahan']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kecamatan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $row['kecamatan']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kabupaten
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kab_kota" name="kab_kota" value="<?php echo $row['kab_kota']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Provinsi
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo $row['provinsi']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kode Pos
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo $row['kode_pos']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">No Telepon
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo $row['no_telepon']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Email
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Website
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="website" name="website" value="<?php echo $row['website']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Kepala Sekolah
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <?php
                                                    $sql_wali_kelas_selected = "SELECT * FROM tb_guru WHERE nip='".$row['nip']."' LIMIT 1";
                                                    $query_wali_kelas_selected = $conn->query($sql_wali_kelas_selected);
                                                    $id_wali_kelas_selected = $query_wali_kelas_selected->fetch_assoc();
                                                    echo '<input type="hidden" name="oldNip" value="'.$id_wali_kelas_selected['nip'].'" />';
                                                ?>
                                                <select id="inputState" class="form-control" name="nip" >
                                                    <?php
                                                        $sql_wali_kelas = "SELECT * FROM tb_guru WHERE npsn='".$row_admin['npsn']."' AND (id_tgs_tambahan='0' OR nip='".$row['nip']."')";
                                                        $query_wali_kelas = $conn->query($sql_wali_kelas);
                                                    ?>
                                                    <option value="">Silahkan dipilih</option> 
                                                    <?php
                                                        while($row_wali_kelas = $query_wali_kelas->fetch_assoc()) {
                                                            if($id_wali_kelas_selected['nip'] == $row_wali_kelas['nip'])
                                                                echo "<option value='".$row_wali_kelas['nip']."' selected>".$row_wali_kelas['nama']."</option>";
                                                            else
                                                                echo "<option value='".$row_wali_kelas['nip']."'>".$row_wali_kelas['nama']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Status</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="radio" name="status" value="Aktif" <?php if($row['status']=='Aktif') echo 'checked'?>><label style="#4d4d4d; padding:4px; font-size:15px;">Aktif</label></input>
                                                <input type="radio" name="status" value="Tidak Aktif"  <?php if($row['status']=='Tidak Aktif') echo 'checked'?>><label style="#4d4d4d; padding:4px; font-size:15px;">Tidak Aktif</label></input>
                                            </div>
                                        </div>
                                                 
                                        <div class="form-group row text-dark">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="edit" id="edit" value="Simpan" class="btn btn-primary">Simpan</button>

                                                <!-- <div class="col-lg-3 " style="margin-left: auto;">
                                                <input type="submit" name="edit" id="edit" value="Simpan" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a; height: 15%">
                                                </div> -->
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

    if(isset($_POST['edit']))
    {
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
                        window.location.href = "Sekolah.php";
                    </script>
                    <?php
                } elseif ($ukuran > 1048576) {
                    ?>
                    <script type="text/javascript">
                        alert("Maksimal Ukuran 1 Mb");
                        window.location.href = "Sekolah.php";
                    </script>
                    <?php
                } elseif (in_array($ekstensi, $ekstensi_gambar) == false) {
                    ?>
                    <script type="text/javascript">
                        alert("Format File Salah");
                        window.location.href = "Sekolah.php";
                    </script>
                    <?php
                } else {
                    move_uploaded_file($lokasi_sem, "../assets/images/" . $nama);
                    return $nama;
                }
            }
        }

        $npsn = $_POST['npsn'];
        $nss = $_POST['nss'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kode_pos = $_POST['kode_pos'];
        $no_telepon = $_POST['no_telepon'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $kab_kota = $_POST['kab_kota'];
        $provinsi = $_POST['provinsi'];
        $website = $_POST['website'];
        $email = $_POST['email'];
        $gambarLama = $_POST["gambarLama"];
        $nip = $_POST['nip'];
        $oldNip = $_POST['oldNip'];
        $status = $_POST['status'];
        $gambarLama = $_POST["gambarLama"];

        if($_FILES["gambar"]["error"] == 4)
            $gambar = $gambarLama;
        else
            $gambar	= upload_gambar();

        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
        //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($nss))
            echo "<script>alert('Anda Harus Memasukkan Angka pada NSS')</script>";
        else {
            $query = "UPDATE tb_sekolah SET 
                nss='$nss',
                nama='$nama',
                alamat='$alamat',
                kode_pos='$kode_pos',
                no_telepon='$no_telepon',
                kelurahan='$kelurahan',
                kecamatan='$kecamatan',
                kab_kota='$kab_kota',
                provinsi='$provinsi',
                website='$website',
                email='$email',
                nip='$nip',
                foto='$gambar'
                WHERE npsn='$npsn'";
                
            $query_update_demoted = "UPDATE tb_guru SET id_tgs_tambahan='0' WHERE nip='".$oldNip."'";
            $query_update = "UPDATE tb_guru SET id_tgs_tambahan='1' WHERE nip='".$nip."'";
            
            if ($conn->query($query) && $conn->query($query_update_demoted) && $conn->query($query_update)) {
                ?>
                <script type="text/javascript">
                    alert("Data Sekolah Berhasil Diperbaharui");
                    window.location.href = "DetailSchool.php?npsn=<?php echo $npsn; ?>";
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert("Data Sekolah Gagal Diperbaharui, Silahkan Coba Lagi");
                    window.location.href = "DetailSchool.php?npsn=<?php echo $npsn; ?>";
                </script>
                <?php
            }
        }
    }
?>