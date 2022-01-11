we<?php
    session_start();
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
                    <h4>Selamat Datang, <?php echo $row_admin['nama']; ?></h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                    <li class="breadcrumb-item active"><a href="TeacherTable.php">Guru</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h1 class="card-title">Data Guru</h1>
                    </div>
                    <div class="justify-content-end card-header">
                        <a href="AddTeacher.php" class="btn btn-outline-primary"><i
                        class="icon icon-window-add"></i> Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="" method="POST">
                                <table id="example" class="display" style="color:black;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Hp</th>
                                            <th>Jabatan</th>
                                            <th>Status pegawai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql_guru = "SELECT * FROM tb_guru WHERE npsn='".$row_admin['npsn']."'";
                                            $query_guru = $conn->query($sql_guru);
                                            while ($row = $query_guru->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row['nip']; ?></td>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <?php
                                                        $sql_jk = "SELECT * FROM id_jk WHERE id='".$row['id_jk']."' LIMIT 1";
                                                        $query_jk = $conn->query($sql_jk);

                                                        if($query_jk->num_rows>0) {
                                                            $row_jk = $query_jk->fetch_assoc();
                                                            echo "<td>".$row_jk['nama']."</td>";
                                                        }
                                                        else echo "<td class='text-danger'>Invalid</td>";
                                                    ?>
                                                    <td><?php echo $row['no_hp']; ?></td>
                                                    <?php
                                                        $sql_tgs = "SELECT * FROM id_tgs_tambahan WHERE id='".$row['id_tgs_tambahan']."' LIMIT 1";
                                                        $query_tgs = $conn->query($sql_tgs);

                                                        if($query_tgs->num_rows>0) {
                                                            $row_tgs = $query_tgs->fetch_assoc();
                                                            echo "<td>".$row_tgs['nama']."</td>";
                                                        }
                                                        else echo "<td class='text-danger'>Invalid</td>";
                                                    ?>
                                                    <td><?php echo $row['status_kepegawaian']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td>
                                                        <span>
                                                            <a href="EditTeacher.php?nip=<?php echo $row['nip']; ?>" class="btn btn-outline-primary">Edit</a> 
                                                             <button name="hapus" value="<?php echo $row['nip']; ?>" class="btn btn-outline-danger">Hapus</button>
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
<?php 
include 'footer.php';
 ?>
<?php
    if(isset($_POST['hapus'])) {
        $nip = $_POST['hapus'];
        $sql_hapus = "DELETE FROM tb_guru WHERE nip='".$nip."'";
        $query_hapus = $conn->query($sql_hapus);
        if($query_hapus)
            echo "<script>alert('Berhasil Dihapus'); window.location.href='TeacherTable.php'; </script>";
        else
            echo "<script>alert('Gagal Dihapus.')</script>";
    }
?>