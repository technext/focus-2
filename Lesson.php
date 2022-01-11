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
                    <li class="breadcrumb-item active"><a href="Lesson.php">Mata Pelajaran</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-6 justify-content-start card-header">
                            <h1 class="card-title">Data Mata pelajaran</h1>
                        </div>
                        <div class="col-lg-6 justify-content-end card-header" align="right">
                            <a href="AddLesson.php" class="btn btn-outline-primary"><i
                            class="icon icon-window-add"></i> Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="" method="POST">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!--<th>Kode Mata Pelajaran</th>-->
                                            <th>Mata Pelajaran</th>
                                            <th>Jurusan</th>
                                            <th>Kelas</th>
                                            <th>Kurikulum</th>
                                            <th>KKM</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql_mapel = "SELECT * FROM tb_mapel WHERE npsn='".$row_admin['npsn']."'";
                                            $query_mapel = $conn->query($sql_mapel);
                                            while ($row = $query_mapel->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <!--<td><?php echo $row['kode_mapel']; ?></td>-->
                                            <td><?php echo $row['nama']; ?></td>
                                            
                                            <?php 
                                                $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan ='".$row['kode_jurusan']."' LIMIT 1" ;
                                                $query_jurusan = $conn->query($sql_jurusan);
                                                $row_jurusan = $query_jurusan->fetch_assoc();      
                                            ?>
                                            <td><?php echo $row_jurusan['nama_jurusan']; ?></td>
                                            <?php
                                                $kode_kelas =  $row['kode_kelas'];
                                                if($kode_kelas == 10) $kelas_rmw = "X";
                                                else if($kode_kelas == 11) $kelas_rmw = "XI";
                                                else if($kode_kelas == 12) $kelas_rmw = "XII";
                                            ?>
                                            <td><?php echo $kelas_rmw; ?></td>
                                            <?php
                                                $sql_kurikulum = "SELECT * FROM tb_kurikulum WHERE kode_kurikulum='".$row['kode_kurikulum']."' LIMIT 1";
                                                $query_kurikulum = $conn->query($sql_kurikulum);
                                                $row_kurikulum = $query_kurikulum->fetch_assoc();
                                            ?>
                                            <td><?php echo $row_kurikulum['nama']; ?></td>
                                            <td><?php echo $row['kkm']; ?></td>
                                            <td>
                                                <span>
                                                    <a data-toggle="modal" data-target="#basicModal<?php echo $no; ?>" href="EditLesson.php?kode_mapel=<?php echo $row['kode_mapel']; ?>" class="btn btn-outline-primary">Edit</a> 
                                                    <button name="hapus" value="<?php echo $row['kode_mapel']; ?>" class="btn btn-outline-danger">Hapus</button>
                                                    <div class="modal fade" id="basicModal<?php echo $no; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">  Ubah Nilai KKM</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                </div>
                                                                
                                                                <form class="form-valide" action="" method="post">
                                                                    <div class="col-xl-12 mt-3">
                                                                        <div class="form-group row text-dark">
                                                                            <label class="col-lg-6 col-form-label" for="val-website">Nilai KKM
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <div class="col-lg-6">
                                                                                <input type="text" class="form-control" name="kkm" value="<?php echo $row['kkm']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                        
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" name="ubah" value="<?php echo $row['kode_mapel']; ?>">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </span>
                                            </td>
                                        </tr>
                                        <?php  } ?>                                   
                                    </tbody>
                                </table>
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

    if(isset($_POST['hapus'])) {
        $kode_mapel = $_POST['hapus'];
        $sql_hapus = "DELETE FROM tb_mapel WHERE kode_mapel='".$kode_mapel."'";
        $query_hapus = $conn->query($sql_hapus);
        if($query_hapus)
            echo "<script>alert('Berhasil Dihapus'); window.location.href='Lesson.php'; </script>";
        else
            echo "<script>alert('Gagal Dihapus.')</script>";
    }

    if(isset($_POST['ubah'])) {
        $kkm = $_POST['kkm'];
        $kode = $_POST['ubah'];
        $sql_update_nilai = "UPDATE tb_mapel SET kkm='".$kkm."' WHERE kode_mapel='".$kode."'";

        if ($conn->query($sql_update_nilai)) {
            echo '<script type="text/javascript">
                alert("Data Nilai KKM Berhasil Diperbaharui");
                window.location.href = "Lesson.php";
            </script>';
        } else {
            echo '<script type="text/javascript">
                alert("Data Nilai KKM Gagal Diperbaharui");
                window.location.href = "Lesson.php";
            </script>';
        }
    }
?>