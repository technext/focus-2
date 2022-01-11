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
                <?php
                    $sql_admin = "SELECT * FROM tb_admin WHERE username='".$_SESSION['username']."' LIMIT 1";
                    $query_admin = $conn->query($sql_admin);
                    $row_admin = $query_admin->fetch_assoc();
                ?>
                <h4>Selamat Datang, <?php echo $row_admin['nama']; ?></h4>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Nilai</a></li>
                    <li class="breadcrumb-item active"><a href="NilaiUTS.php">Nilai UTS</a></li>
                    <li class="breadcrumb-item active"><a href="NilaiUTSDetail.php">Detail Nilai UTS</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-3">
                            <h5 style="margin-top: 20px; margin-left: 20px">Mata Pelajaran</h5>
                            <h5 style="margin-left: 20px">Kelas</h5>
                            <h5 style="margin-left: 20px">Jurusan</h5>
                            <h5 style="margin-left: 20px">Guru Mata Pelajaran</h5>
                        </div>
                        <div class="col-lg-9">
                            <?php
                                $jurusan = $_GET['jurusan']; 
                                $kelas = $_GET['kelas'];
                                $mapel = $_GET['mapel'];
                                $nip = $_GET['nip'];
                                
                                $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$jurusan."'";
                                $query_jurusan = $conn->query($sql_jurusan);
                                $row_jurusan = $query_jurusan->fetch_assoc();
                                
                                $sql_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$jurusan."' AND kode_kelas='".$kelas."'";
                                $query_kelas = $conn->query($sql_kelas);
                                $row_kelas = $query_kelas->fetch_assoc();
                                
                                $sql_mapel = "SELECT * FROM tb_mapel WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$jurusan."' AND kode_kelas='".substr($kelas,0,2)."' AND kode_mapel='".$mapel."'";
                                $query_mapel = $conn->query($sql_mapel);
                                $row_mapel = $query_mapel->fetch_assoc();
                                
                                $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$nip."'";
                                $query_guru = $conn->query($sql_guru);
                                $row_guru = $query_guru->fetch_assoc();
                            ?>
                            <h5 style="margin-top: 20px">: <?php echo $row_mapel['nama'] ?></h5>
                            <h5>: <?php echo $row_kelas['nama_kelas'] ?></h5>
                            <h5>: <?php echo $row_jurusan['nama_jurusan'] ?></h5>
                            <h5>: <?php echo $row_guru['nama'] ?></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="color: black;">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Nilai</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1; 
                                    $sql_nilai = "SELECT * FROM tb_uas WHERE kode_mapel='".$mapel."'" ;
                                    $query_nilai = $conn->query($sql_nilai);
                                    while($row = $query_nilai->fetch_assoc()) {
                                        $sql_siswa = "SELECT * FROM tb_siswa WHERE nisn='".$row['nisn']."'";
                                        $query_siswa = $conn->query($sql_siswa);
                                        $row_siswa = $query_siswa->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nisn'] ?></td>
                                        <td><?php echo $row_siswa['nama'] ?></td>
                                        <td><?php echo $row['nilai']; ?></td>
                                        <?php
                                            $sql_mapel = "SELECT * FROM tb_mapel WHERE kode_mapel='".$mapel."'";
                                            $query_mapel = $conn->query($sql_mapel);
                                            $row_mapel = $query_mapel->fetch_assoc();
                                            if($row_mapel['kkm'] > $row['nilai'])
                                                echo "<td class='text-danger'>Gagal</td>";
                                            else
                                                echo "<td>Lulus</td>"
                                        ?>
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