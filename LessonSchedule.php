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
                    <li class="breadcrumb-item active"><a href="LessonSchedule.php">Jadwal Mata Pelajaran</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Jadwal Mata pelajaran</h1>
                    </div>
                    <div class="justify-content-end card-header">
                        <a href="AddLessonSchedule.php" class="btn btn-outline-primary"><i
                        class="icon icon-window-add"></i>Tambah</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!--<th>Kode Jadwal</th>-->
                                            <th>Mata Pelajaran</th>
                                            <th>Guru Mapel</th>
                                            <th>Jurusan</th>
                                            <th>Kelas</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql_jwl = "SELECT * FROM tb_jadwal_mapel WHERE npsn='".$row_admin['npsn']."'";
                                            $query_jwl = $conn->query($sql_jwl);
                                            while ($row = $query_jwl->fetch_assoc()) {
                                                $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."'";
                                                $query_jurusan = $conn->query($sql_jurusan);
                                                $row_jurusan = $query_jurusan->fetch_assoc();
                                                
                                                $sql_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_kelas='".$row['kode_kelas']."' AND kode_jurusan='".$row['kode_jurusan']."'";
                                                $query_kelas = $conn->query($sql_kelas);
                                                $row_kelas = $query_kelas->fetch_assoc();
                                                
                                                $sql_mapel = "SELECT * FROM tb_mapel WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."' AND kode_kelas='".substr($row['kode_kelas'],0,2)."' AND kode_mapel='".$row['kode_mapel']."'";
                                                $query_mapel = $conn->query($sql_mapel);
                                                $row_mapel = $query_mapel->fetch_assoc();
                                                
                                                $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$row['nip']."'";
                                                $query_guru = $conn->query($sql_guru);
                                                $row_guru = $query_guru->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <!--<td><?php echo $row['kode_mapel']; ?></td>-->
                                                <td><?php echo $row_mapel['nama']; ?></td>
                                                <td><?php echo $row_guru['nama']; ?></td>
                                                <td><?php echo $row_jurusan['nama_jurusan']; ?></td>
                                                <td><?php echo $row_kelas['nama_kelas']; ?></td>
                                                <td><?php echo $row['hari']; ?></td>
                                                <td><?php echo $row['jam_mulai']; ?> - <?php echo $row['jam_selesai']; ?></td>
                                                <td>
                                                    <span>
                                                        <a data-toggle="modal" data-target="#basicModal<?php echo $no; ?>" href="" class="btn btn-outline-primary">Edit</a> 
                                                        <button name="hapus" value="<?php echo $row['kode_mapel']." ".$row['kode_kelas']; ?>" class="btn btn-outline-danger">Hapus</button>
                                                        <div class="modal fade" id="basicModal<?php echo $no; ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"> Edit Jadwal Mapel</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                    </div>
                                                                    
                                                                    <form class="form-valide" action="" method="post">
                                                                        <div class="col-xl-12 mt-3">
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-4 col-form-label" for="val-skill">Nama Guru
                                                                                    <!-- <span class="text-danger">*</span> -->
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                <select id="inputState" class="form-control" name="nip">
                                                                                    <?php
                                                                                        $sql_guru_selected = "SELECT * FROM tb_guru WHERE nip='".$row['nip']."'";
                                                                                        $query_guru_selected = $conn->query($sql_guru_selected);
                                                                                        $row_guru_selected = $query_guru_selected->fetch_assoc();
    
                                                                                        $sql_guru = "SELECT * FROM tb_guru WHERE npsn='".$row_admin['npsn']."'";
                                                                                        $query_guru = $conn->query($sql_guru);
                                                                                        
                                                                                        while($row_guru = $query_guru->fetch_assoc()) {
                                                                                            if($row_guru_selected['nip'] == $row_guru['nip'])
                                                                                                echo "<option value='".$row_guru['nip']."' selected>".$row_guru['nama']."</option>";
                                                                                            else
                                                                                                echo "<option value='".$row_guru['nip']."'>".$row_guru['nama']."</option>";
                                                                                        }
                                                                                    ?>  
                                                                                 </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-4 col-form-label" for="val-skill">Hari
                                                                                    <!-- <span class="text-danger">*</span> -->
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <select class="form-control" id="hari" name="hari">
                                                                                        <?php
                                                                                            if($row['hari'] == "Senin") echo "<option value='Senin' selected>Senin</option>";
                                                                                            else echo "<option value='Senin'>Senin</option>";
                                                                                            if($row['hari'] == "Selasa") echo "<option value='Selasa' selected>Selasa</option>";
                                                                                            else echo "<option value='Selasa'>Selasa</option>";
                                                                                            if($row['hari'] == "Rabu") echo "<option value='Rabu' selected>Rabu</option>";
                                                                                            else echo "<option value='Rabu'>Rabu</option>";
                                                                                            if($row['hari'] == "Kamis") echo "<option value='Kamis' selected>Kamis</option>";
                                                                                            else echo "<option value='Kamis'>Kamis</option>";
                                                                                            if($row['hari'] == "Jumat") echo "<option value='Jumat' selected>Jumat</option>";
                                                                                            else echo "<option value='Jumat'>Jumat</option>";
                                                                                            if($row['hari'] == "Sabtu") echo "<option value='Sabtu' selected>Sabtu</option>";
                                                                                            else echo "<option value='Sabtu'>Sabtu</option>";
                                                                                            if($row['hari'] == "Minggu") echo "<option value='Minggu' selected>Minggu</option>";
                                                                                            else echo "<option value='Minggu'>Minggu</option>";
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                            
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-4 col-form-label" for="val-skill">Tahun Akademik
                                                                                    <!-- <span class="text-danger">*</span> -->
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="text" name="tahun_akademik" value="<?php echo $row['tahun_akademik'] ?>" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-4 col-form-label" for="val-skill">Jam Mulai
                                                                                    <!-- <span class="text-danger">*</span> -->
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="time" name="jam_mulai" value="<?php echo $row['jam_mulai'] ?>"   required>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-4 col-form-label" for="val-skill">Jam Selesai
                                                                                    <!-- <span class="text-danger">*</span> -->
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="time" name="jam_selesai" value="<?php echo $row['jam_selesai'] ?>" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary" name="ubah" value="<?php echo $row['kode_mapel']." ".$row['kode_kelas']; ?>">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
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
    if(isset($_POST['hapus'])) {
        $kode = explode(" ",$_POST['hapus']);
        
        $sql_hapus = "DELETE FROM tb_jadwal_mapel WHERE npsn='".$row_admin['npsn']."' AND kode_mapel='".$kode[0]."' AND kode_kelas='".$kode[1]."'";
        $query_hapus = $conn->query($sql_hapus);

        if($query_hapus)
            echo "<script>alert('Berhasil Dihapus'); window.location.href='LessonSchedule.php'; </script>";
        else
            echo "<script>alert('Gagal Dihapus')</script>";
    }
    
    if(isset($_POST['ubah'])) {
        $kode = explode(" ",$_POST['ubah']);
        $nip = $_POST['nip'];
        $hari = $_POST['hari'];
        $tahun_akademik = $_POST['tahun_akademik'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        
        $sql_update = "UPDATE tb_jadwal_mapel SET nip='".$nip."', hari='".$hari."', tahun_akademik='".$tahun_akademik."', jam_mulai='".$jam_mulai."', jam_selesai='".$jam_selesai."' WHERE kode_mapel='".$kode[0]."' AND kode_kelas='".$kode[1]."'";
        
        if ($conn->query($sql_update)) {
            echo '<script type="text/javascript">
                alert("Data Jadwal Berhasil Diperbaharui");
                window.location.href = "LessonSchedule.php";
            </script>';
        } else {
            echo '<script type="text/javascript">
                alert("Data Jadwal Gagal Diperbaharui");
                window.location.href = "LessonSchedule.php";
            </script>';
        }
    }
?>