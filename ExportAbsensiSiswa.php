<?php
    include '../db.php';
    $kode = explode(" ",$_POST['export']);
    $bulan = $_POST['bulan'];
    $filename = "absensi_siswa-".$bulan.".xls";
    
    header("Content-Type: application/vnd-ms-excel"); 
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    $npsn = $kode[0];
    $jurusan = $kode[1];
    $kelas = $kode[2];
    $mapel = $kode[3];
    $nip = $kode[4];
    
    $sql_kelas = "SELECT * FROM tb_kelas WHERE npsn='".$npsn."' AND kode_jurusan='".$jurusan."' AND kode_kelas='".$kelas."'";
    $query_kelas = $conn->query($sql_kelas);
    $row_kelas = $query_kelas->fetch_assoc();
    
    $sql_mapel = "SELECT * FROM tb_mapel WHERE npsn='".$npsn."' AND kode_jurusan='".$jurusan."' AND kode_kelas='".substr($kelas,0,2)."' AND kode_mapel='".$mapel."'";
    $query_mapel = $conn->query($sql_mapel);
    $row_mapel = $query_mapel->fetch_assoc();
    
    $sql_guru = "SELECT * FROM tb_guru WHERE nip='".$nip."'";
    $query_guru = $conn->query($sql_guru);
    $row_guru = $query_guru->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rekapitulasi Absensi Bulanan Siswa</title>
</head>

<body>
	<h2>Rekapitulasi Absensi Bulanan Siswa</h2>
	
    <table>
		<tr >
			<td colspan="2">Tahun Ajaran</td>
			<td>:</td>
			<td>2022</td>	
			<td colspan="19"></td>
			<td colspan="2">Mata Pelajaran</td>
			<td>:</td>
			<td colspan="2">Matematika</td>
		</tr>
		
		
		<tr >
			<td colspan="2">Kelas</td>
			<td>:</td>
			<td>X-01</td>	
			<td colspan="19"></td>
			<td colspan="2">Guru Mapel</td>
			<td>:</td>
			<td colspan="2">Radifan, S.Pd</td>
		</tr>
		
		<tr style="text-align:center;">
			<td colspan="28"><br/></td>
		</tr>
		<tr>
			<td colspan="28"><br/></td>
		</tr>
		<tr>
			<td colspan="28"><br/></td>
		</tr>
		<tr>
			<td colspan="28"><br/></td>
		</tr>
		
		<tr style="text-align:center;">
			<td rowspan="3" style="border:1px solid black">No</td>
			<td rowspan="3" style="border:1px solid black">NPSN</td>
			<td rowspan="3" colspan="2" style="border:1px solid black">Nama Siswa</td>
			<td colspan="24" style="border:1px solid black"> Bulan </td>

		</tr>
		
		<tr style="text-align:center;">
			<td colspan="4" style="border:1px solid black">Minggu Ke-1</td>
			<td colspan="4" style="border:1px solid black">Minggu Ke-2</td>
			<td colspan="4" style="border:1px solid black">Minggu Ke-3</td>
			<td colspan="4" style="border:1px solid black">Minggu Ke-4</td>
			<td colspan="4" style="border:1px solid black">Minggu Ke-5</td>
			<td colspan="4" style="border:1px solid black"> Total </td>
		</tr>
		<tr style="text-align:center;">
			<td style="border:1px solid black">Hadir</td>
			<td style="border:1px solid black">Sakit</td>
			<td style="border:1px solid black">Izin</td>
			<td style="border:1px solid black">Alfa</td>
			<td style="border:1px solid black">Hadir</td>
			<td style="border:1px solid black">Sakit</td>
			<td style="border:1px solid black">Izin</td>
			<td style="border:1px solid black">Alfa</td>
			<td style="border:1px solid black">Hadir</td>
			<td style="border:1px solid black">Sakit</td>
			<td style="border:1px solid black">Izin</td>
			<td style="border:1px solid black">Alfa</td>
			<td style="border:1px solid black">Hadir</td>
			<td style="border:1px solid black">Sakit</td>
			<td style="border:1px solid black">Izin</td>
			<td style="border:1px solid black">Alfa</td>
			<td style="border:1px solid black">Hadir</td>
			<td style="border:1px solid black">Sakit</td>
			<td style="border:1px solid black">Izin</td>
			<td style="border:1px solid black">Alfa</td>
			<td style="border:1px solid black">Hadir</td>
			<td style="border:1px solid black">Sakit</td>
			<td style="border:1px solid black">Izin</td>
			<td style="border:1px solid black">Alfa</td>
		</tr>
		<?php
		    $no = 1;
		    $sql_absensi_siswa = "SELECT DISTINCT nisn FROM tb_absensi_siswa WHERE kode_mapel='$mapel'";
		    $query_absensi_siswa = $conn->query($sql_absensi_siswa);
		    while($row = $query_absensi_siswa->fetch_assoc()) {
		?>
		<tr style="text-align:center;">
			<td style="border:1px solid black"><?php echo $no++; ?></td>
			<!--<td><?php echo $npsn; ?></td>-->
			<?php
			    $sql_siswa = "SELECT * FROM tb_siswa WHERE nisn='".$row['nisn']."'";
			    $query_siswa = $conn->query($sql_siswa);
			    $row_siswa = $query_siswa->fetch_assoc();
			?>
			<td style="border:1px solid black"><?php echo $row['nisn']; ?></td>
			<td colspan="2" style="text-align:left; border:1px solid black"><?php echo $row_siswa['nama']; ?></td>
			<?php
			    $tahun = "2022";
			    $sql_hadir_1 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Hadir' AND tanggal BETWEEN '".$tahun."-".$bulan."-1' AND '".$tahun."-".$bulan."-7'";
			    $query_hadir_1 = $conn->query($sql_hadir_1);
			    
			    $sql_sakit_1 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Sakit' AND tanggal BETWEEN '".$tahun."-".$bulan."-1' AND '".$tahun."-".$bulan."-7'";
			    $query_sakit_1 = $conn->query($sql_sakit_1);
			    
			    $sql_izin_1 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Izin' AND tanggal BETWEEN '".$tahun."-".$bulan."-1' AND '".$tahun."-".$bulan."-7'";
			    $query_izin_1 = $conn->query($sql_izin_1);
			    
			    $sql_alpa_1 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Alpa' AND tanggal BETWEEN '".$tahun."-".$bulan."-1' AND '".$tahun."-".$bulan."-7'";
			    $query_alpa_1 = $conn->query($sql_alpa_1);
			?>
			<td style="border:1px solid black"><?php echo $query_hadir_1->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_sakit_1->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_izin_1->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_alpa_1->num_rows; ?></td>
            <?php
			    $sql_hadir_2 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Hadir' AND tanggal BETWEEN '".$tahun."-".$bulan."-8' AND '".$tahun."-".$bulan."-14'";
			    $query_hadir_2 = $conn->query($sql_hadir_2);
			    
			    $sql_sakit_2 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Sakit' AND tanggal BETWEEN '".$tahun."-".$bulan."-8' AND '".$tahun."-".$bulan."-14'";
			    $query_sakit_2 = $conn->query($sql_sakit_2);
			    
			    $sql_izin_2 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Izin' AND tanggal BETWEEN '".$tahun."-".$bulan."-8' AND '".$tahun."-".$bulan."-14'";
			    $query_izin_2 = $conn->query($sql_izin_2);
			    
			    $sql_alpa_2 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Alpa' AND tanggal BETWEEN '".$tahun."-".$bulan."-8' AND '".$tahun."-".$bulan."-14'";
			    $query_alpa_2 = $conn->query($sql_alpa_2);
			?>
			<td style="border:1px solid black"><?php echo $query_hadir_2->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_sakit_2->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_izin_2->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_alpa_2->num_rows; ?></td>
			<?php
			    $sql_hadir_3 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Hadir' AND tanggal BETWEEN '".$tahun."-".$bulan."-15' AND '".$tahun."-".$bulan."-21'";
			    $query_hadir_3 = $conn->query($sql_hadir_3);
			    
			    $sql_sakit_3 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Sakit' AND tanggal BETWEEN '".$tahun."-".$bulan."-15' AND '".$tahun."-".$bulan."-21'";
			    $query_sakit_3 = $conn->query($sql_sakit_3);
			    
			    $sql_izin_3 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Izin' AND tanggal BETWEEN '".$tahun."-".$bulan."-15' AND '".$tahun."-".$bulan."-21'";
			    $query_izin_3 = $conn->query($sql_izin_3);
			    
			    $sql_alpa_3 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Alpa' AND tanggal BETWEEN '".$tahun."-".$bulan."-15' AND '".$tahun."-".$bulan."-21'";
			    $query_alpa_3 = $conn->query($sql_alpa_3);
			?>
			<td style="border:1px solid black"><?php echo $query_hadir_3->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_sakit_3->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_izin_3->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_alpa_3->num_rows; ?></td>
			<?php
			    $sql_hadir_4 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Hadir' AND tanggal BETWEEN '".$tahun."-".$bulan."-22' AND '".$tahun."-".$bulan."-28'";
			    $query_hadir_4 = $conn->query($sql_hadir_4);
			    
			    $sql_sakit_4 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Sakit' AND tanggal BETWEEN '".$tahun."-".$bulan."-22' AND '".$tahun."-".$bulan."-28'";
			    $query_sakit_4 = $conn->query($sql_sakit_4);
			    
			    $sql_izin_4 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Izin' AND tanggal BETWEEN '".$tahun."-".$bulan."-22' AND '".$tahun."-".$bulan."-28'";
			    $query_izin_4 = $conn->query($sql_izin_4);
			    
			    $sql_alpa_4 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Alpa' AND tanggal BETWEEN '".$tahun."-".$bulan."-22' AND '".$tahun."-".$bulan."-28'";
			    $query_alpa_4 = $conn->query($sql_alpa_4);
			?>
			<td style="border:1px solid black"><?php echo $query_hadir_4->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_sakit_4->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_izin_4->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_alpa_4->num_rows; ?></td>
			<?php
			    $sql_hadir_5 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Hadir' AND tanggal BETWEEN '".$tahun."-".$bulan."-29' AND '".$tahun."-".$bulan."-31'";
			    $query_hadir_5 = $conn->query($sql_hadir_5);
			    
			    $sql_sakit_5 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Sakit' AND tanggal BETWEEN '".$tahun."-".$bulan."-29' AND '".$tahun."-".$bulan."-31'";
			    $query_sakit_5 = $conn->query($sql_sakit_5);
			    
			    $sql_izin_5 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Izin' AND tanggal BETWEEN '".$tahun."-".$bulan."-29' AND '".$tahun."-".$bulan."-31'";
			    $query_izin_5 = $conn->query($sql_izin_5);
			    
			    $sql_alpa_5 = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Alpa' AND tanggal BETWEEN '".$tahun."-".$bulan."-29' AND '".$tahun."-".$bulan."-31'";
			    $query_alpa_5 = $conn->query($sql_alpa_5);
			?>
			<td style="border:1px solid black"><?php echo $query_hadir_5->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_sakit_5->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_izin_5->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_alpa_5->num_rows; ?></td>
			<?php
			    $sql_hadir = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Hadir' AND tanggal BETWEEN '".$tahun."-".$bulan."-1' AND '".$tahun."-".$bulan."-31'";
			    $query_hadir = $conn->query($sql_hadir);
			    
			    $sql_sakit = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Sakit' AND tanggal BETWEEN '".$tahun."-".$bulan."-1' AND '".$tahun."-".$bulan."-31'";
			    $query_sakit = $conn->query($sql_sakit);
			    
			    $sql_izin = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Izin' AND tanggal BETWEEN '".$tahun."-".$bulan."-1' AND '".$tahun."-".$bulan."-31'";
			    $query_izin = $conn->query($sql_izin);
			    
			    $sql_alpa = "SELECT kehadiran FROM tb_absensi_siswa WHERE nisn='".$row['nisn']."' AND kehadiran='Alpa' AND tanggal BETWEEN '".$tahun."-".$bulan."-1' AND '".$tahun."-".$bulan."-31'";
			    $query_alpa = $conn->query($sql_alpa);
			?>
			<td style="border:1px solid black"><?php echo $query_hadir->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_sakit->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_izin->num_rows; ?></td>
			<td style="border:1px solid black"><?php echo $query_alpa->num_rows; ?></td>
		</tr>
		<?php } ?>
	</table>
	</td>

</body>
</html>