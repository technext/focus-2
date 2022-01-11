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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Import</a></li>
                </ol>
            </div>
        </div>
        <div class="row" align="center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Import Data (.xls)</h4>
                    </div>
                    <div class="card-body mt-5">
                        <div class="form-validation">
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-xl-12" align="center">
                                            <div class="form-group row text-dark" >
                                                <label class="col-lg-3 col-form-label" for="val-skill"><h4 align="left">Siswa</h4>
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                 <div class="col-lg-6" align="center">
                                                    <input type="file" name="file_siswa" class="btn btn-secondary" style="background-color: #39B44a; border-color: #39B44a; width:220px;">
                                                    <input type="submit" name="import_siswa" id="import" value="Import" class="btn btn-secondary " style="background-color: #39B44a; border-color: #39B44a; width:65px; height:42px;">
                                                </div>
                                                <div class="col-lg-3" align="center">
                                                    <input type="submit" name="" id="download" value="Download Template" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a; font-size:12px;">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-3 col-form-label" for="val-skill"><h4 align="left">Guru</h4>
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                  <div class="col-lg-6" align="center">
                                                   <input type="file" name="file_guru" class="btn btn-secondary" style="background-color: #39B44a; border-color: #39B44a; width:220px;">
                                                    <input type="submit" name="import_siswa" id="import" value="Import" class="btn btn-secondary " style="background-color: #39B44a; border-color: #39B44a; width:65px; height:42px;">
                                                </div>
                                                <div class="col-lg-3" align="center">
                                                    <input type="submit" name="" id="download" value="Download Template" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a; font-size:12px;">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-3 col-form-label" for="val-skill"><h4 align="left">Jurusan</h4>
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                  <div class="col-lg-6" align="center">
                                                     <input type="file" name="file_guru" class="btn btn-secondary" style="background-color: #39B44a; border-color: #39B44a; width:220px;">
                                                     <input type="submit" name="import_siswa" id="import" value="Import" class="btn btn-secondary " style="background-color: #39B44a; border-color: #39B44a; width:65px; height:42px;">
                                                </div>
                                                <div class="col-lg-3" align="center">
                                                    <input type="submit" name="" id="download" value="Download Template" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a; font-size:12px;">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-3 col-form-label" for="val-skill"><h4 align="left">Kelas</h4>
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                  <div class="col-lg-6" align="center">
                                                    <input type="file" name="file_guru" class="btn btn-secondary" style="background-color: #39B44a; border-color: #39B44a; width:220px;">
                                                    <input type="submit" name="import_siswa" id="import" value="Import" class="btn btn-secondary " style="background-color: #39B44a; border-color: #39B44a; width:65px; height:42px;">
                                                </div>
                                                <div class="col-lg-3" align="center">
                                                    <input type="submit" name="" id="download" value="Download Template" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a; font-size:12px;">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-3 col-form-label" for="val-skill"><h4 align="left">Mata Pelajaran</h4> 
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                  <div class="col-lg-6" align="center">
                                                     <input type="file" name="file_guru" class="btn btn-secondary" style="background-color: #39B44a; border-color: #39B44a; width:220px;">
                                                    <input type="submit" name="import_siswa" id="import" value="Import" class="btn btn-secondary " style="background-color: #39B44a; border-color: #39B44a; width:65px; height:42px;">
                                                </div>
                                                <div class="col-lg-3" align="center">
                                                    <input type="submit" name="" id="download" value="Download Template" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a; font-size:12px;">
                                                </div>
                                            </div>
    
                                            <div class="form-group row text-dark">
                                                <label class="col-lg-3 col-form-label" for="val-skill"><h4 align="left">Jadwal Mapel</h4>
                                                    <!-- <span class="text-danger">*</span> -->
                                                </label>
                                                  <div class="col-lg-6" align="center">
                                                    <input type="file" name="file_guru" class="btn btn-secondary" style="background-color: #39B44a; border-color: #39B44a; width:220px;">
                                                    <input type="submit" name="import_siswa" id="import" value="Import" class="btn btn-secondary " style="background-color: #39B44a; border-color: #39B44a; width:65px; height:42px;">
                                                </div>
                                                <div class="col-lg-3" align="center">
                                                    <input type="submit" name="" id="download" value="Download Template" class="btn btn-secondary btn-block" style="background-color: #39B44a; border-color: #39B44a; font-size:12px;">
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
</div>
<?php
    include 'footer.php';
    
    //import siswa
    if(isset($_POST['import_siswa'])) {
        $name = $_FILES["file_siswa"]["name"];
        $ext = explode(".", $name);
        $ext = strtolower(end($ext));
        $ext_import = ["csv"];
        
        $filename = $_FILES["file_siswa"]["tmp_name"];
        if(in_array($ext, $ext_import) == false)
            echo "<script>alert('Invalid File: Please Upload CSV File.');</script>";  
        else if($_FILES["file_siswa"]["size"] > 0)
        {
            $file_d = fopen($filename, "r");
            $content = fread($file_d, filesize($filename));
            fclose($file_d);
            $comma = substr_count($content,',');
            $semiColon = substr_count($content,';');
            if($comma>0) $delimiter = ',';
            else if($semiColon>0) $delimiter = ';';
            
            $file = fopen($filename, "r");
            $value_siswa = "";
            $value_wali = "";
            $first = false;
            while (($getData = fgetcsv($file, 10000, $delimiter)) !== FALSE) {
                if(!$first)
                    $first = true;
                else {
                    $getData[0] = preg_replace("/[^0-9]/", "", $getData[0]);
                    
                    $nisn = $getData[0];
                    
                    $jurusan = $getData[8];
                    $kode_jurusan = $row_admin['npsn'].strtolower($jurusan);
                    
                    $kelas = $getData[9];
                    if($kelas == "X") $kelas = "10";
                    else if($kelas == "XI") $kelas = "11";
                    else if($kelas == "XII") $kelas = "12";
                    $subkelas = $getData[10];
                    if(strlen($subkelas)==1) $subkelas = "0".$subkelas;
                    $kode_kelas = $kelas.$subkelas;
                    
                    $npsn = $row_admin['npsn'];
                    $nipd = $getData[1];
                    $nama = $getData[2];
                    $tempat_lahir = $getData[3];
                    $tanggal_lahir = $getData[4];
                    $password = md5("12345678");
                    
                    // $jenis_kelamin = $getData[5];
                    // $sql_jk = "SELECT * FROM id_jk WHERE nama='".$jenis_kelamin."'";
                    // $query_jk = $conn->query($sql_jk);
                    // $row_jk = $query_jk->fetch_assoc();
                    // $id_jk = $row_jk['id'];
                    
                    if($getData[5] == "Laki-laki" || $getData[5] == "Pria") $id_jk = 1;
                    else if($getData[5] == "Perempuan" || $getData[5] == "Wanita") $id_jk = 2;
                    
                    // $agama = $getData[6];
                    // $sql_agama = "SELECT * FROM id_agama WHERE nama='$agama'";
                    // $query_agama = $conn->query($sql_agama);
                    // $row_agama = $query_agama->fetch_assoc();
                    // $id_agama = $row_agama['id'];
                    
                    if($getData[6] == "Islam") $id_agama = 1;
                    if($getData[6] == "Kristen Protestan") $id_agama = 2;
                    if($getData[6] == "Kristen Katolik") $id_agama = 3;
                    if($getData[6] == "Hindu") $id_agama = 4;
                    if($getData[6] == "Buddha") $id_agama = 5;
                    if($getData[6] == "Konghucu") $id_agama = 6;
                    
                    $alamat = $getData[7];
                    $email = $getData[11];
                    $no_hp = $getData[12];
                    $gambar = "";
                    $status = "Aktif";
                    
                    $nik_wali = $getData[13];
                    
                    $password_wali = md5("12345678");
                    $nama_wali = $getData[14];
                    $alamat_wali = $getData[15];
                    $no_hp_wali = $getData[16];
                    $status_keluarga = $getData[17];
                    $status_wali = "Aktif";
                    
                    //default value
                    $tempat_lahir_wali = "";
                    $tanggal_lahir_wali = "0000-00-00";
                    $id_jk_wali = "1";
                    $gambar_wali = "";
                    $pekerjaan_wali = "";
                    //$value = $value."('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$row_agama['id']."','".$row_jk['id']."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."','".$getData[16]."'),";
                    //if(!empty($nisn)) $value_siswa = $value_siswa."('$nisn','$kode_kelas','$kode_jurusan','$npsn','$nipd','$nik_wali','$nama','$tempat_lahir','$tanggal_lahir','$password','$id_jk','$id_agama','$alamat','$email','$no_hp','$gambar','$status'),";
                    if(!empty($nisn)) $value_siswa = $value_siswa."('$nisn','','','$npsn','','$nik_wali','','$tempat_lahir','$tanggal_lahir','$password','$id_jk','$id_agama','','$email','$no_hp','$gambar','$status'),";
                    if(!empty($nik_wali)) $value_wali = $value_wali."('$nik_wali','$password_wali','$nama_wali','$alamat_wali','$tempat_lahir_wali','$tanggal_lahir_wali','$id_jk_wali','$no_hp_wali','$gambar_wali','$status_keluarga','$pekerjaan_wali','$status_wali'),";
                }
            }
                
            $value_siswa = substr($value_siswa,0,-1);
            $value_wali = substr($value_wali,0,-1);
            $sql_siswa = "INSERT INTO tb_siswa VALUES ".$value_siswa;
            $sql_wali = "INSERT INTO tb_orangtua VALUES ".$value_wali;
            
            if($conn->query($sql_wali)) {
                $conn->query($sql_siswa);
                echo "<script>alert('CSV File has been successfully Imported.');</script>"; 
            }
            else if($conn->query($sql_siswa)) {
                while (($getData = fgetcsv($file, 10000, $delimiter)) !== FALSE) {
                    if(!$first)
                        $first = true;
                    else {
                        $nik_wali = $getData[13];
                        
                        $password_wali = md5("12345678");
                        $nama_wali = $getData[14];
                        $alamat_wali = $getData[15];
                        $no_hp_wali = $getData[16];
                        $status_keluarga = $getData[17];
                        $status_wali = "Aktif";
                        
                        //default value
                        $tempat_lahir_wali = "";
                        $tanggal_lahir_wali = "0000-00-00";
                        $id_jk_wali = "0";
                        $gambar_wali = "";
                        $pekerjaan_wali = "";
                        
                        $sql_ortu = "SELECT * FROM tb_orangtua WHERE nik_wali='".$nik_wali."'";
                        $query_ortu = $conn->query($sql_ortu);
                        if($query_ortu->num_rows>0) {
                            $sql_wali = "UPDATE tb_orangtua SET
                            password='$password_wali',
                            nama='$nama_wali',
                            alamat='$alamat_wali',
                            tempat_lahir='$tempat_lahir_wali',
                            tanggal_lahir='$tanggal_lahir_wali',
                            id_jk='$id_jk_wali',
                            no_hp='$no_hp_wali',
                            foto='$gambar_wali',
                            status_keluarga='$status_keluarga',
                            pekerjaan='$pekerjaan_wali',
                            status='$status_wali'
                            WHERE nik_wali='".$nik_wali."'";
                            
                        }
                        else {
                            $sql_wali = "INSERT INTO tb_orangtua VALUES (
                                '$nik_wali',
                                '$password_wali',
                                '$nama_wali',
                                '$alamat_wali',
                                '$tempat_lahir_wali',
                                '$tanggal_lahir_wali',
                                '$id_jk_wali',
                                '$no_hp_wali',
                                '$gambar_wali',
                                '$status_keluarga',
                                '$pekerjaan_wali',
                                '$status_wali'
                                )";
                        }
                    }
                    if(!empty($nik_wali)) $conn->query($sql_wali);
                }
                echo "<script>alert('CSV File has been successfully Imported and Updated.');</script>"; 
            }
            else
                //echo mysqli_error($conn);
                echo "<script>alert('There are Duplicate NISN!');</script>";  
            fclose($file);
       }
    }
    
    
?>