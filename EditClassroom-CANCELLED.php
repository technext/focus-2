<?php 
    session_start();
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
                            <?php
                                $sql_kelas = "SELECT * FROM tb_kelas WHERE kode_kelas='".$_GET['kode_kelas']."' LIMIT 1";
                                $query_kelas = $conn->query($sql_kelas);
                                $row = $query_kelas->fetch_assoc();
                            ?>
                            <form class="form-valide" action=""  method="POST" enctype="multipart/form-data">
                                <div class="row" style="margin-left: auto;">
                                    <div class="col-xl-6">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">Kode Kelas
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" value="<?php echo $row['kode_kelas'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">Tahun Akademik
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" value="<?php echo $row['tahun_akademik'] ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-website">Nama Kelas </label>
                                                <div class="col-lg-6">
                                                    <div class="form-row">
                                                        <?php $nama_kelas = explode("-",$row['nama_kelas']); ?>
                                                        <div class="form-group col-md-6">
                                                            <select id="inputState" name="kelas" class="form-control">
                                                                <option value="10" <?php if($nama_kelas[0]==10) echo selected; ?>>X</option>
                                                                <option value="11" <?php if($nama_kelas[0]==11) echo selected; ?>>XI</option>
                                                                <option value="12" <?php if($nama_kelas[0]==12) echo selected; ?>>XII</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <input type="number" min="1" max="99" class="form-control" id="sub_kelas" name="sub_kelas" value="<?php echo $nama_kelas[1]; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Wali Kelas
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
                                            <label class="col-lg-4 col-form-label" for="val-skill">Jurusan
                                                <!-- <span class="text-danger">*</span> -->
                                            </label>
                                            <div class="col-lg-6">
                                                <select id="inputState" class="form-control" name="kode_jurusan" >
                                                    <?php
                                                        $sql_jurusan = "SELECT * FROM tb_jurusan WHERE kode_jurusan='".$row['kode_jurusan']."' LIMIT 1";
                                                        $query_jurusan = $conn->query($sql_jurusan);
                                                        $id_jurusan = $query_jurusan->fetch_assoc();

                                                        $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' ";
                                                        $query_jurusan = $conn->query($sql_jurusan);
                                                    ?>
                                                    <option value="">Silahkan dipilih</option> 
                                                    <?php
                                                        while($row_jurusan = $query_jurusan->fetch_assoc()) {
                                                            if($id_jurusan['kode_jurusan'] == $row_jurusan['kode_jurusan'])
                                                                echo "<option value='".$row_jurusan['kode_jurusan']."' selected>".$row_jurusan['nama_jurusan']."</option>";
                                                            else
                                                                echo "<option value='".$row_jurusan['kode_jurusan']."'>".$row_jurusan['nama_jurusan']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <label class="col-lg-4 col-form-label"  for="val-skill">Status
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="radio" name="status" value="Aktif" <?php if($row['status']=='Aktif') echo 'checked'?>>
                                                    <label style="color:black; padding:4px">Aktif</label>
                                                <input type="radio" name="status" value="Tidak Aktif" <?php if($row['status']=='Tidak Aktif') echo 'checked'?>>
                                                <label style="color:black; padding:4px">Tidak Aktif</label>
                                            </div>
                                        </div>
                                        <div class="form-group row text-dark">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="edit" value="<?php echo $row['kode_kelas']; ?>" class="btn btn-primary">Simpan</button>
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
    
    if(isset($_POST['edit'])) {
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
        
        $oldNip = $_POST['oldNip'];

        // if (!preg_match("/^[a-zA-Z0-9]*$/", $nama))
            //     echo "<script>alert('Hanya Huruf dan Angka yang Diperbolehkan!')</script>";
        if (!is_numeric($npsn))
            echo "<script>alert('Anda Harus Memasukkan Angka pada NPSN')</script>";
        else {
            $query_kelas = "UPDATE tb_kelas SET nama_kelas='$nama_kelas', nip='$nip', npsn='$npsn', kode_jurusan='$kode_jurusan', tahun_akademik='$tahun_akademik', status='$status' WHERE kode_kelas='$kode_kelas'";
            
            if($nip!=$oldNip) {
                $query_update = "UPDATE tb_guru SET id_tgs_tambahan='4' WHERE nip='".$nip."'";
                $query_update_demoted = "UPDATE tb_guru SET id_tgs_tambahan='0' WHERE nip='".$oldNip."'";

                if ($conn->query($query_kelas)) {
                    ?>
                    <script type="text/javascript">
                        alert("<?php echo $query_kelas; ?>");
                        window.location.href = "EditClassroom.php?kode_kelas=<?php echo $kode_kelas; ?>";
                    </script>
                    <?php
                } else {
                    ?>
                    <script type="text/javascript">
                        alert("<?php echo $query_kelas; ?>");
                        window.location.href = "EditClassroom.php?kode_kelas=<?php echo $kode_kelas; ?>";
                    </script>
                    <?php
                }
            }
            else {
                if ($conn->query($query_kelas)) {
                    ?>
                    <script type="text/javascript">
                        alert("Data Kelas Berhasil Diperbaharui");
                        window.location.href = "EditClassroom.php?kode_kelas=<?php echo $kode_kelas; ?>";
                    </script>
                    <?php
                } else {
                    ?>
                    <script type="text/javascript">
                        alert("<?php echo $query_kelas; ?>");
                        window.location.href = "EditClassroom.php?kode_kelas=<?php echo $kode_kelas; ?>";
                    </script>
                    <?php
                }
            }
            
        }
    }
?>