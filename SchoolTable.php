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
                    <h4>Selamat Datang, <?php echo $row_admin['nama']; ?></h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Sekolah</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 justify-content-start">
                                <h3>Data Sekolah </h3>
                            </div>
                            <div class="col-lg-6 justify-content-end " align="right">
                                <a href="AddSchool.php" class="btn btn-outline-primary"><i class="icon icon-window-add"></i> Tambah</a>
                            </div>
                        </div>
                            <div class="table-responsive mt-3">
                                <form action="" method="POST">
                                    <table id="example" class="display" style="color: black;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NPSN</th>
                                                <th>Nama Sekolah</th>
                                                <th>Kepala Sekolah</th>
                                                <th>No Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                $sql_sekolah = "SELECT * FROM tb_sekolah";
                                                $query_sekolah = $conn->query($sql_sekolah);
                                                while ($row_sekolah = $query_sekolah->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row_sekolah['npsn']; ?></td>
                                                <td><?php echo $row_sekolah['nama']; ?></td>
                                                <?php
                                                    $sql_guru = "SELECT * FROM tb_guru WHERE npsn='".$row_sekolah['npsn']."' AND nip='".$row_sekolah['nip']."' LIMIT 1";
                                                    $query_guru = $conn->query($sql_guru);
                                                    if($query_guru->num_rows>0) {
                                                        $row_guru = $query_guru->fetch_assoc();
                                                        echo "<td>".$row_guru['nama']."</td>";
                                                    }
                                                    else echo "<td class='text-danger'>Invalid NIP</td>";
                                                ?>
                                                <td><?php echo $row_sekolah['no_telepon']; ?></td>
                                                <td>
                                                    <span> 
                                                        <a href="DetailSchool.php?npsn=<?php echo $row_sekolah['npsn']; ?>" class="btn btn-outline-primary">Detail</a> 
                                                        <button name="hapus" value="<?php echo $row_sekolah['npsn']; ?>" class="btn btn-outline-danger">Hapus</button>
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
</div>
<?php include 'footer.php'?>
<?php
    if(isset($_POST['hapus'])) {
        $npsn = $_POST['hapus'];
        $sql_hapus = "DELETE FROM tb_sekolah WHERE npsn='".$npsn."'";
        $query_hapus = $conn->query($sql_hapus);
        if($query_hapus)
            echo "<script>alert('Berhasil Dihapus'); window.location.href='SchoolTable.php'; </script>";
        else
            echo "<script>alert('Gagal Dihapus.')</script>";
    }
?>