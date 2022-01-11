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
                    <li class="breadcrumb-item active"><a href="StudentTable.php">Siswa</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                        <div class="card-header">
                        <h1 class="card-title">Data Siswa</h1>
                    </div>
                    <div class="justify-content-end card-header">
                        <a href="AddStudent.php" class="btn btn-outline-primary"><i
                        class="icon icon-window-add"></i> Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="" method="POST">
                                <table id="example" class="display" style="color: black;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>NPSN</th>
                                            <th>NIPD</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jurusan</th>
                                            <th>Kelas</th>
                                            <th>Nama Wali</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql_siswa = "SELECT * FROM tb_siswa WHERE npsn='".$row_admin['npsn']."'";
                                            $query_siswa = $conn->query($sql_siswa);
                                            while ($row = mysqli_fetch_array($query_siswa)) { ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['nisn']; ?></td>
                                                <td><?php echo $row['npsn']; ?></td>
                                                <td><?php echo $row['nipd']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <?php
                                                    $sql_jurusan = "SELECT * FROM tb_jurusan WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."' LIMIT 1";
                                                    $query_jurusan = $conn->query($sql_jurusan);
                                                    $row_jurusan = $query_jurusan->fetch_assoc();
                                                ?>
                                                <td><?php echo $row_jurusan['nama_jurusan']; ?></td>
                                                <?php
                                                    $sql_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."' AND kode_kelas='".$row['kode_kelas']."' LIMIT 1";
                                                    $query_kelas = $conn->query($sql_kelas);
                                                    if($query_kelas->num_rows>0) {
                                                        $row_kelas = $query_kelas->fetch_assoc();
                                                        echo "<td>".$row_kelas['nama_kelas']."</td>";
                                                    }
                                                    else
                                                        echo "<td class='text-danger'>Nama Kelas Tidak Valid</td>";
                                                ?>
                                                <?php
                                                    // $sql_wali_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$row_admin['npsn']."' AND kode_jurusan='".$row['kode_jurusan']."' AND kode_kelas='".$row['kode_kelas']."' LIMIT 1";
                                                    // $query_wali_kelas = $conn->query($sql_wali_kelas);
                                                    // $row_wali_kelas = $query_wali_kelas->fetch_assoc();

                                                    // $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$row_wali_kelas['nip']."' LIMIT 1";
                                                    // $query_guru = $conn->query($sql_guru);

                                                    $sql_ortu = "SELECT * FROM tb_orangtua WHERE nik_wali='".$row['nik_wali']."' LIMIT 1";
                                                    $query_ortu = $conn->query($sql_ortu);
                                                    if($query_ortu->num_rows>0) {
                                                        $row_ortu = $query_ortu->fetch_assoc();
                                                        echo "<td>".$row_ortu['nama']."</td>";
                                                    }
                                                    else
                                                        echo "<td class='text-danger'>Invalid NIK</td>";
                                                ?>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><span>
                                                <a href="EditStudent.php?nisn=<?php echo $row['nisn']; ?>" class="btn btn-outline-primary">Edit</a> 
                                                <button class="btn btn-outline-danger" type="submit" name="hapus" value="<?php echo $row['nisn']." ".$row['nik_wali']; ?>">Hapus</button>
                                                </span>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
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
    if(isset($_POST['hapus'])) {
        $kode = explode(" ", $_POST['hapus']);
        $sql_siswa = "SELECT * FROM tb_siswa WHERE nik_wali='".$kode[1]."'";
        $query_siswa = $conn->query($sql_siswa);
        if($query_siswa->num_rows==1)
            $conn->query("DELETE FROM tb_orangtua WHERE nik_wali='".$kode[1]."'");
        
        $delete_siswa = "DELETE FROM tb_siswa WHERE nisn='".$kode[0]."'";
        if($conn->query($delete_siswa)) echo "<script>alert('Berhasil Dihapus'); window.location.href= 'StudentTable.php'</script>";
        else echo "<script>alert('Gagal Dihapus');</script>";
    }
?>