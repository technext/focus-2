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
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Guru Mapel</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $sql_jwl = "SELECT * FROM tb_jadwal_mapel WHERE npsn='".$row_admin['npsn']."'";
                                        $query_jwl = $conn->query($sql_jwl);
                                        while ($row = $query_jwl->fetch_assoc()) {
                                            // $query_mapel = "SELECT * FROM tb_mapel WHERE kode_mapel='".$row['kode_mapel']."' " ;
                                            $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."'";
                                            $query_jurusan = $conn->query($sql_jurusan);
                                            $row_jurusan = $query_jurusan->fetch_assoc();
                                            
                                            $sql_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_kelas='".$row['kode_kelas']."' AND kode_jurusan='".$row['kode_jurusan']."'";
                                            $query_kelas = $conn->query($sql_kelas);
                                            $row_kelas = $query_kelas->fetch_assoc();
                                            
                                            $sql_mapel = "SELECT * FROM tb_mapel WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."' AND kode_kelas='".substr($row['kode_kelas'],0,2)."' AND kode_mapel='".$row['kode_mapel']."'";
                                            $query_mapel = $conn->query($sql_mapel);
                                            $row_mapel = $query_mapel->fetch_assoc();
                                            
                                            $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$row['nip']."'";
                                            $query_guru = $conn->query($sql_guru);
                                            $row_guru = $query_guru->fetch_assoc();
                                    ?>
                                                
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row_mapel['nama']; ?></td>
                                        <td><?php echo $row_kelas['nama_kelas']; ?></td>
                                        <td><?php echo $row_jurusan['nama_jurusan']; ?></td>
                                        <?php if($query_guru->num_rows>0) echo "<td>".$row_guru['nama']."</td>"; else echo "<td class='text-danger'>Invalid NIP</td>"; ?>
                                        <td><?php echo $row['hari']; ?></td>
                                        <td><?php echo $row['jam_mulai']; ?> - <?php echo $row['jam_selesai']; ?></td>
                                        <td><span>
                                        <a class="btn btn-outline-primary" href="StudentAbsenceDetail.php?mapel=<?php echo $row['kode_mapel']; ?>&kelas=<?php echo $row['kode_kelas']; ?>&jurusan=<?php echo $row['kode_jurusan']; ?>&nip=<?php echo $row['nip']; ?>" data-toggle="tooltip"data-placement="top" title="Edit">Detail</a>
                                        </td>
                                    </tr>
                                    <?php  } ?>   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                          
            </div>
        </div>     
<?php 
include 'footer.php';
 ?>