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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Absensi</a></li>
                <li class="breadcrumb-item active"><a href="StudentTeacher.php">Absensi Guru</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="example" class="display" style="color: black;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                    <th>Tanggal</th>
                                    <th>Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $sql_absensi_guru = "SELECT * FROM tb_absensi_guru";
                                    $query_absensi_guru = $conn->query($sql_absensi_guru);
                                    while ($row = $query_absensi_guru->fetch_assoc()) {
                                ?>
                                <tr>
                                    <?php
                                        $sql_guru = "SELECT * FROM tb_guru WHERE npsn='".$row_admin['npsn']."' AND nip='".$row['nip']."'";
                                        $query_guru = $conn->query($sql_guru);
                                        if($query_guru->num_rows>0) {
                                    ?>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nip']; ?></td>
                                    <?php
                                        $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$row['nip']."' LIMIT 1";
                                        $query_guru = $conn->query($sql_guru);
                                        $row_guru = $query_guru->fetch_assoc();
                                    ?>
                                    <td><?php echo $row_guru['nama']; ?></td>
                                    <td><?php echo $row['tanggal']; ?></td>
                                    <td><?php echo $row['kehadiran']; ?></td>
                                </tr>
                                <?php   } 
                                    } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include 'footer.php';
?>