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
                    <li class="breadcrumb-item active"><a href="Department.php">Jurusan</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">

                <div class="card">
                        <div class="card-header">
                        <h1 class="card-title">Data Jurusan</h1>
                    </div>
                    <div class="justify-content-end card-header">
                        <a href="AddDepartment.php" class="btn btn-outline-primary"><i
                        class="icon icon-window-add"></i> Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="" method="POST">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!--<th>Kode Jurusan</th>-->
                                            <th>Nama Jurusan</th>
                                            <th>Ketua Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn ='".$row_admin['npsn']."'" ;
                                            $query_jurusan = $conn->query($sql_jurusan);
                                            while ($row = mysqli_fetch_array($query_jurusan)) {            
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <!--<td><?php echo $row['kode_jurusan']; ?></td>-->
                                                <td><?php echo $row['nama_jurusan']; ?></td>
                                                <?php
                                                    $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$row['nip']."' LIMIT 1";
                                                    $query_guru = $conn->query($sql_guru);
                                                    $row_guru = $query_guru->fetch_assoc();
                                                ?>
                                                <?php if($query_guru->num_rows>0) echo "<td>".$row_guru['nama']."</td>"; else echo "<td class='text-danger'>Invalid NIP</td>" ?>
                                                <td>
                                                    <span>
                                                       <button name="hapus" value="<?php echo $row['kode_jurusan']; ?>" class="btn btn-outline-danger">Hapus</button>
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
<?php include 'footer.php';?>
<?php
    if(isset($_POST['hapus'])) {
        $kode_jurusan = $_POST['hapus'];
        $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$kode_jurusan."' LIMIT 1";
        $query_jurusan = $conn->query($sql_jurusan);
        $row_jurusan = $query_jurusan->fetch_assoc();
        
        $sql_update = "UPDATE tb_guru SET id_tgs_tambahan='0' WHERE nip='".$row_jurusan['nip']."'";
        $query_update = $conn->query($sql_update);

        $sql_hapus = "DELETE FROM tb_jurusan WHERE kode_jurusan='".$kode_jurusan."'";
        $query_hapus = $conn->query($sql_hapus);

        if($query_update && $query_hapus)
            echo "<script>alert('Berhasil Dihapus'); window.location.href='Department.php'; </script>";
        else
            echo "<script>alert('Gagal Dihapus.')</script>";
    }
?>