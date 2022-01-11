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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                    <li class="breadcrumb-item active"><a href="ParentTable.php">Orang Tua</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">

                <div class="card">
                        <div class="card-header">
                        <h1 class="card-title">Data Orang Tua</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="color: black;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No KTP</th>
                                        <th>Alamat</th>
                                        <th>Nama Anak</th>
                                        <th>No Hp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $sql_ortu = "SELECT DISTINCT tb_orangtua.nik_wali, tb_orangtua.password, tb_orangtua.nama, tb_orangtua.alamat,
                                        tb_orangtua.tempat_lahir, tb_orangtua.tanggal_lahir, tb_orangtua.id_jk, tb_orangtua.no_hp,
                                        tb_orangtua.foto, tb_orangtua.status_keluarga, tb_orangtua.pekerjaan, tb_orangtua.status, tb_siswa.nama nama_siswa FROM tb_siswa 
                                        LEFT JOIN tb_orangtua ON tb_siswa.nik_wali=tb_orangtua.nik_wali WHERE tb_siswa.npsn='".$row_admin['npsn']."'";
                                        $query_ortu = $conn->query($sql_ortu);
                                        while($row_ortu = $query_ortu->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row_ortu['nama']; ?></td>
                                            <td><?php echo $row_ortu['nik_wali']; ?></td>
                                            <td><?php echo $row_ortu['alamat']; ?></td>
                                            <td><?php echo $row_ortu['nama_siswa']; ?></td>
                                            <td><?php echo $row_ortu['no_hp']; ?></td>
                                            
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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