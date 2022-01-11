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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Akademik</a></li>
                            <li class="breadcrumb-item active"><a href="StudentTask.php">Tugas Siswa</a></li>
                            <li class="breadcrumb-item active"><a href="#p">Tugas Siswa Detail</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Materi E-Learning</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <h5 style="margin-top: 20px; margin-left: 20px">Jurusan</h5>
                            <h5 style="margin-left: 20px">Kelas</h5>
                            <h5 style="margin-left: 20px">Mata Pelajaran</h5>
                            <h5 style="margin-left: 20px">Guru</h5>
                        </div>
                        <div class="col-lg-9">
                            <?php
                                $kode_jurusan = $_GET['jurusan'];
                                $kode_kelas = $_GET['kelas'];
                                $kode_mapel = $_GET['mapel'];
                                $nip = $_GET['nip'];

                                $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$kode_jurusan."' LIMIT 1";
                                $query_jurusan = $conn->query($sql_jurusan);
                                $row_jurusan = $query_jurusan->fetch_assoc();
                                
                                $sql_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$kode_jurusan."' AND kode_kelas='".$kode_kelas."' LIMIT 1";
                                $query_kelas = $conn->query($sql_kelas);
                                $row_kelas = $query_kelas->fetch_assoc();

                                $sql_mapel = "SELECT * FROM tb_mapel WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$kode_jurusan."' AND kode_kelas='".substr($kode_kelas,0,2)."' AND kode_mapel='".$kode_mapel."' LIMIT 1";
                                $query_mapel = $conn->query($sql_mapel);
                                $row_mapel = $query_mapel->fetch_assoc();

                                $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$_GET['nip']."'";
                                $query_guru = $conn->query($sql_guru);
                                $row_guru = $query_guru->fetch_assoc();
                            ?>
                            <h5 style="margin-top: 20px">: <?php echo $row_jurusan['nama_jurusan']; ?></h5>
                            <h5>: <?php echo $row_kelas['nama_kelas']; ?></h5>
                            <h5>: <?php echo $row_mapel['nama']; ?></h5>
                            <h5>: <?php echo $row_guru['nama']; ?></h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Pertemuan Ke</th>
                                        <th>Judul</th>
                                        <th>Materi</th>
                                        <th>Link Video</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $sql_elerning = "SELECT * FROM tb_tugas WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$kode_jurusan."' AND kode_kelas='".$kode_kelas."' AND kode_mapel='".$kode_mapel."' AND nip='".$nip."'" ;
                                        $query_elerning = mysqli_query($conn, $sql_elerning);
                                        $no = 1;
                                        while ($row = $query_elerning->fetch_assoc()) {
                                    ?>
                                    <tr>
                                       
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><a target="_blank" class="btn btn-outline-primary" href="../assets/files/<?php echo $row['tugas']; ?>" >Download</a></td>
                                        <?php
                                            if(!empty($row['video']))
                                                echo '<td><a target="_blank" class="btn btn-outline-warning" href="'.$row['video'].'">Link Video</a></td>';
                                            else
                                                echo '<td><a class="btn btn-dark" style="color: black; background-color: lightgrey;">Link Video</a></td>';
                                        ?>
                                        <td><?php echo $row['tgl_upload']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>>
            </div>
        </div>
<?php 
include 'footer.php';
 ?>