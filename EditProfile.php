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
                    <h4>Hi,Super Admin</h4>
                </div>
            </div>
            <div class="col-sm-10 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Profile.php">Profile</a></li>
                    <li class="breadcrumb-item active"><a href="#">Edit Profile</a></li>       
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="welcome-text">
                            <h1>Edit Data Admin</h1>
                                
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-validation">
                            <?php
                                $sql_admin = "SELECT * FROM tb_admin WHERE username='".$_SESSION['username']."' LIMIT 1";
                                $query_admin = $conn->query($sql_admin);
                                $row = $query_admin->fetch_assoc();
                            ?>
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="assets/images/<?php echo $row['foto']; ?>" id="imagepreview"  style="width: 100%;">
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
                                        <input type="file" name="gambar" id="image" onchange="showImage(this);" class="custom-file-input" value="assets/images/<?php echo $row['foto']; ?>" >
                                        <label class="custom-file-label">Pilih Foto</label>
                                    </div>
                                </div>

                                <div class="col-lg-9">
                                
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Username</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="username" id="username"  value="<?php echo $row['username']; ?>" style="background-color: #39B44a; border-radius: 15px">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Nama Lengkap</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="nama" id="nama"   value="<?php echo $row['nama']; ?>" style="background-color: #39B44a; border-radius: 15px">
                                            </div>
                                        </div>  

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">NPSN</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="npsn" id="npsn"   value="<?php echo $row['npsn']; ?>" style="background-color: #39B44a; border-radius: 15px">
                                            </div>
                                        </div>   
                                    
                                        <!-- <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Password</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="password" id="password" placeholder="Password" style="background-color: #39B44a; border-radius: 15px">
                                            </div>
                                        </div>   -->
                                        
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Tempat Lahir </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="tempat_lahir"   value="<?php echo $row['tempat_lahir']; ?>" style="background-color: #39B44a; border-radius: 15px">
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Tanggal Lahir</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="date" class="form-control" name="tanggal_lahir"   value="<?php echo $row['tanggal_lahir']; ?>" style="background-color: #39B44a; border-radius: 15px">
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="radio" name="id_jk" value="1" <?php if($row['id_jk']=='1') echo 'checked'?>><label style="color:black; padding:4px">Pria</label></input>
                                                <input type="radio" name="id_jk" value="2" <?php if($row['id_jk']=='2') echo 'checked'?>><label style="color:black; padding:4px">Wanita</label></input>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Alamat</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="alamat"  value="<?php echo $row['alamat']; ?>" style="background-color: #39B44a; border-radius: 15px">
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Agama</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select id="inputState" class="form-control" name="id_agama" style="background-color: #39B44a; border-radius: 15px">
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

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Email</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="email"  value="<?php echo $row['email']; ?>" style="background-color: #39B44a; border-radius: 15px">
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">No Hp</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="no_hp"  value="<?php echo $row['no_hp']; ?>" style="background-color: #39B44a; border-radius: 15px">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label style="color:black; padding:8px">Status Kepegawaian</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select id="inputState" class="form-control" name="status_kepegawaian" style="background-color: #39B44a; border-radius: 15px">
                                                    <option >Pilih Status Kepegawaian</option>
                                                    <?php
                                                        if($row['status_kepegawaian'] == "PNS") {
                                                            echo '<option value="PNS" selected>PNS</option>';
                                                            echo '<option value="Non PNS">Non PNS</option>';
                                                        }
                                                        else if($row['status_kepegawaian'] == "Non PNS") {
                                                            echo '<option value="PNS">PNS</option>';
                                                            echo '<option value="Non PNS" selected>Non PNS</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-lg-4">
                                            <label style="color:black; padding:8px">Status</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="radio" name="status" value="Aktif"  <?php if($row['status']=='Aktif') echo 'checked'?>><label style="color:black; padding:4px">Aktif</label></input>
                                                <input type="radio" name="status" value="Tidak Aktif" <?php if($row['status']=='Tidak Aktif') echo 'checked'?>><label style="color:black; padding:4px">Tidak Aktif</label></input>
                                            </div>
                                        </div>
                                        
                                        <br/>
                                        <div class="col-sm-4 text-center" style="margin: auto;">
                                            <input type="submit" name="update" value="Simpan Perubahan" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a;">
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
</div>
<?php 
    include 'footer.php';
    
    if(isset($_POST['update'])) {
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
                        window.location.href = "tambah-barang.php";
                    </script>
                    <?php
                } elseif ($ukuran > 1048576) {
                    ?>
                    <script type="text/javascript">
                        alert("Maksimal Ukuran 1 Mb");
                        window.location.href = "tambah-barang.php";
                    </script>
                    <?php
                } elseif (in_array($ekstensi, $ekstensi_gambar) == false) {
                    ?>
                    <script type="text/javascript">
                        alert("Format File Salah");
                        window.location.href = "tambah-barang.php";
                    </script>
                    <?php
                } else {
                    move_uploaded_file($lokasi_sem, "assets/images/" . $nama);
                    return $nama;
                }
            }
        }
        
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $npsn = $_POST['npsn'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $id_jk = $_POST['id_jk'];
        $id_agama = $_POST['id_agama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $status_kepegawaian = $_POST['status_kepegawaian'];
        $gambarLama = $_POST["gambarLama"];
        $status = $_POST['status'];
    
        if ($_FILES["gambar"]["error"] == 4)
            $gambar = $gambarLama;
        else
            $gambar	= upload_gambar();
        
        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
        //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        // if (!is_numeric($nss))
        //     echo "<script>alert('Anda Harus Memasukkan Angka pada NSS')</script>";
        //else {
            $query = "UPDATE tb_admin SET
                    nama='$nama',
                    npsn='$npsn',
                    tempat_lahir='$tempat_lahir',
                    tanggal_lahir='$tanggal_lahir',
                    id_jk='$id_jk',
                    id_agama='$id_agama',
                    email='$email',
                    alamat='$alamat',
                    no_hp='$no_hp',
                    foto='$gambar',
                    status_kepegawaian='$status_kepegawaian',
                    status='$status'
                    WHERE username='$username'";

            if (mysqli_query($conn, $query)) {
                ?>
                <script type="text/javascript">
                    alert("Data Admin Berhasil Diperbaharui");
                    window.location.href = "profile.php";
                </script>
                <?php
            }
            else {
                ?>
                <script type="text/javascript">
                    alert("Edit Data Admin Gagal, Silahkan Coba Lagi");
                    window.location.href = "Profile.php";
                </script>
                <?php
            }
        //}
    }
?>