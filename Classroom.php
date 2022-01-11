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
                    <li class="breadcrumb-item active"><a href="Classroom.php">Kelas</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Data Kelas</h1>
                    </div>
                    <div class="justify-content-end card-header">
                        <a href="AddClassroom.php" class="btn btn-outline-primary"><i
                        class="icon icon-window-add"></i> Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="" method="POST">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!--<th>Kode Kelas</th>-->
                                            <th>Nama Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Jurusan</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                                $no = 1;
                                                $sql_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."'";
                                                $query_kelas = $conn->query($sql_kelas);
                                                while ($row = $query_kelas->fetch_assoc()) { 
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <!-- <td><?php echo $row['kode_kelas']; ?></td> -->
                                            <td><?php echo $row['nama_kelas']; ?></td>
                                            <?php
                                                $sql_wali_kelas = "SELECT * FROM tb_guru WHERE nip='".$row['nip']."' AND id_tgs_tambahan='4' LIMIT 1";
                                                $query_wali_kelas = $conn->query($sql_wali_kelas);

                                                if($query_wali_kelas->num_rows>0) {
                                                    $row_wali_kelas = $query_wali_kelas->fetch_assoc();
                                                    echo "<td>".$row_wali_kelas['nama']."</td>";
                                                }
                                                else echo "<td class='text-danger'>Invalid NIP</td>";
                                            ?>
                                            <?php 
                                                $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan ='".$row['kode_jurusan']."' LIMIT 1" ;
                                                $query_jurusan = $conn->query($sql_jurusan);
                                                $row_jurusan = $query_jurusan->fetch_assoc();      
                                            ?>
                                            <td><?php echo $row_jurusan['nama_jurusan']; ?></td>
                                            <?php 
                                                $sql_jumlah = "SELECT * FROM tb_siswa WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan ='".$row['kode_jurusan']."' AND kode_kelas='".$row['kode_kelas']."'" ;
                                                $query_jumlah = $conn->query($sql_jumlah);  
                                            ?>
                                            <td><?php echo $query_jumlah->num_rows; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td>
                                                <span>
                                                    <a  href="" type="button" data-toggle="modal" data-target="#basicModal<?php echo $no; ?>" class="btn btn-outline-primary" >Edit</a> 
                                                    <div class="modal fade" id="basicModal<?php echo $no; ?>">
                                                        <form action="" method="POST" >
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Ubah NIP Wali Kelas</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-12 mt-3">
                                                                        <div class="form-group row text-dark">
                                                                            <label class="col-lg-4 col-form-label" for="val-skill">Wali Kelas
                                                                                <!-- <span class="text-danger">*</span> -->
                                                                            </label> 
                                                                            <div class="col-lg-6">
                                                                                <?php
                                                                                    $sql_wali_kelas_selected = "SELECT * FROM tb_guru WHERE nip='".$row['nip']."' LIMIT 1";
                                                                                    $query_wali_kelas_selected = $conn->query($sql_wali_kelas_selected);
                                                                                    $id_wali_kelas_selected = $query_wali_kelas_selected->fetch_assoc();
                                                                                    if($id_wali_kelas_selected->num_rows>0)
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
                                                                    </div>
                                                                    
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="ubah" value="<?php echo $row_admin['npsn']." ".$row['kode_jurusan']." ".$row['kode_kelas']." ".$row['tahun_akademik']; ?>" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <button name="hapus" value="<?php echo $row['kode_jurusan']." ".$row['kode_kelas']; ?>" class="btn btn-outline-danger">Hapus</button>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php } ?>
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
<?php include 'footer.php';?>
<?php
    if(isset($_POST['hapus'])) {
        $kode = explode(" ",$_POST['hapus']);
        $sql_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$kode[0]."' AND kode_kelas='".$kode[1]."' LIMIT 1";
        $query_kelas = $conn->query($sql_kelas);
        $row_kelas = $query_kelas->fetch_assoc();
        
        $sql_update = "UPDATE tb_guru SET id_tgs_tambahan='0' WHERE nip='".$row_kelas['nip']."'";
        $query_update = $conn->query($sql_update);
        
        $sql_hapus = "DELETE FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$kode[0]."' AND kode_kelas='".$kode[1]."'";
        $query_hapus = $conn->query($sql_hapus);

        if($query_update && $query_hapus)
            echo "<script>alert('Berhasil Dihapus'); window.location.href='Classroom.php'; </script>";
        else
            echo "<script>alert('Gagal Dihapus')</script>";
    }
    
    if(isset($_POST['ubah'])) {
        $oldNip = $_POST['oldNip'];
        $nip = $_POST['nip'];
        $kode = explode(" ",$_POST['ubah']);
        $sql = "UPDATE tb_kelas SET nip='".$nip."' WHERE npsn='".$kode[0]."' AND kode_jurusan='".$kode[1]."' AND kode_kelas='".$kode[2]."' AND tahun_akademik='".$kode[3]."'";
        $sql_update_demoted = "UPDATE tb_guru SET id_tgs_tambahan='0' WHERE nip='".$oldNip."'";
        $sql_update = "UPDATE tb_guru SET id_tgs_tambahan='4' WHERE nip='".$nip."'";

        if ($conn->query($sql) && $conn->query($sql_update_demoted) && $conn->query($sql_update)) {
            echo '<script type="text/javascript">
                alert("Data Kelas Berhasil Diperbaharui");
                window.location.href = "Classroom.php";
            </script>';
        } else {
            echo '<script type="text/javascript">
                alert("Data Kelas Gagal Diperbaharui");
                window.location.href = "Classroom.php";
            </script>';
        }
    }
?>