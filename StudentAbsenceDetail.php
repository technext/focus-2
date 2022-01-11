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
                    <li class="breadcrumb-item active"><a href="StudentAbsence.php">Absensi Siswa</a></li>
                    <li class="breadcrumb-item active"><a href="StudentAbsenceDetail.php">Detail Absensi Siswa</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-3">
                             <h5 style="margin-left: 20px; margin-top:20px;">Nama Kelas</h5>
                             <h5 style="margin-left: 20px;">Mata Pelajaran</h5>
                             <h5 style="margin-left: 20px;">Guru Mata Pelajaran</h5>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <?php
                                $jurusan = $_GET['jurusan'];
                                $kelas = $_GET['kelas'];
                                $mapel = $_GET['mapel'];
                                $nip = $_GET['nip'];
                                
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
                             <h5>: <?php echo $row_kelas['nama_kelas']; ?></h5>
                             <h5>: <?php echo $row_mapel['nama']; ?></h5>
                             <h5>: <?php echo $row_guru['nama']; ?></h5>
                        </div>
                        <div class="col-lg-3 " align="right">
                            <form action="" method="post">
                            <a data-toggle="modal" data-target="#basicModal" class="btn btn-outline-secondary mt-2 mr-2" >Export Data</a>
                            </form>
                            <div class="modal fade" id="basicModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Export Data</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form action="ExportAbsensiSiswa.php" method="post">
                                            <div class="col-xl-12 mt-3">
                                                <div class="form-group row text-dark" align="center">
                                                    <label class="col-lg-6 col-form-label" for="val-website">Bulan
                                                    </label>
                                                    <div class="col-lg-6">
                                                       <select class="form-control" style=" margin-bottom: 25px;" name="bulan">
                                                            <option selected>Pilih Bulan</option>
                                                            <option value="1">Januari</option>
                                                            <option value="2">Februari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April</option>
                                                            <option value="5">Mei</option>
                                                            <option value="6">Juni</option>
                                                            <option value="7">Juli</option>
                                                            <option value="8">Agustus</option>
                                                            <option value="9">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="export" value="<?php echo $row_admin['npsn']." ".$jurusan." ".$kelas." ".$mapel." ".$nip; ?>">Export</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div col>
                                    <select class="form-control" style="margin-left:20px; margin-bottom: 25px;" name="tanggal">
                                        <option selected>Tanggal</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17"7>17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                </div>
                                <div col>
                                    <select class="form-control" style="margin-left:50px; margin-bottom: 25px;" name="bulan">
                                        <option selected>Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div col>
                                    <select class="form-control" style="margin-left:80px; margin-bottom: 25px;" name="tahun">
                                        <option selected>Tahun</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2020</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                                <div col>
                                    <button type="submit" name="cari" class="btn btn-primary" style="margin-left:110px; width:100px; margin-bottom:25px;">Cari</button>
                                </div>
                            <div class="table-responsive">
                            <table id="example" class="display" style="color: black;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Tanggal</th>
                                        <th>Kehadiran</th>
                                    </tr>
                                </thead>
                                <?php
                                    if(isset($_POST['cari'])) {
                                ?>
                                <tbody>
                                    <?php
                                        $tanggal = $_POST['tanggal'];
                                        if(strlen($tanggal) == 1) $tanggal = "0".$tanggal;
                                        $bulan = $_POST['bulan'];
                                        if(strlen($bulan) == 1) $bulan = "0".$bulan;
                                        $tahun = $_POST['tahun'];
                                        
                                        $date = $tahun."-".$bulan."-".$tanggal;
                                        $no = 1;
                                        $sql_absensi_siswa = "SELECT * FROM tb_absensi_siswa WHERE kode_mapel='$mapel' AND tanggal='$date'";
                                        $query_absensi_siswa = $conn->query($sql_absensi_siswa);
                                        while ($row = $query_absensi_siswa->fetch_assoc()) {
                                            $sql_nama = "SELECT * FROM tb_siswa WHERE nisn='".$row['nisn']."' LIMIT 1";
                                            $query_nama = $conn->query($sql_nama);
                                            $row_nama = $query_nama->fetch_assoc();
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nisn']; ?></td>
                                        <td><?php echo $row_nama['nama']; ?></td>
                                        <td><?php echo $row['tanggal']; ?></td>
                                        <td><?php echo $row['kehadiran']; ?></td>
                                    </tr>
                                <?php   }
                                    }
                                    else {
                                        $no = 1;
                                        $sql_absensi_siswa = "SELECT * FROM tb_absensi_siswa WHERE kode_mapel='$mapel'";
                                        $query_absensi_siswa = $conn->query($sql_absensi_siswa);
                                        while ($row = $query_absensi_siswa->fetch_assoc()) {
                                            $sql_nama = "SELECT * FROM tb_siswa WHERE nisn='".$row['nisn']."' LIMIT 1";
                                            $query_nama = $conn->query($sql_nama);
                                            $row_nama = $query_nama->fetch_assoc();
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nisn']; ?></td>
                                        <td><?php echo $row_nama['nama']; ?></td>
                                        <td><?php echo $row['tanggal']; ?></td>
                                        <td><?php echo $row['kehadiran']; ?></td>
                                    </tr>
                                        <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include 'footer.php';
?>