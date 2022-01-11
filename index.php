<?php
    session_start();
    if($_SESSION['level'] != "2") header('location: ../login.php');
    include '../db.php';
    include 'top.php';
    include 'samping.php';
?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-sm-6">
                        <div class="welcome-text">
                            <?php
                                $sql_admin = "SELECT * FROM tb_admin WHERE username='".$_SESSION['username']."' LIMIT 1";
                                $query_admin = $conn->query($sql_admin);
                                $row_admin = $query_admin->fetch_assoc();
                            ?>
                            <h4>Selamat Datang, <?php echo $row_admin['nama']; ?></h4>
                            <!-- <p class="mb-0">SMA Negeri 11 Medan</p> -->
                        </div>
                    </div>
            </div>
             <style type="text/css">
                        .card{
                            border-radius: 20px;
                            color: white;
                        }
                        .card:hover{
                            background-color: lightgreen;
                            color: white;
                        }
                        .stat-text{
                            color: white;
                        }
                    </style>
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                    <a href="StudentTable.php">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">AKADEMIK </div>
                                    <img src="images/school.png" width="40%;">
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <a href="#">
                    <div class="col-lg-3 col-sm-3">
                    <a href="DetailSchool.php">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">SEKOLAH</div>
                                    <img src="images/admin.png" width="40%;">
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                    <a href="StudentAbsence.php">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">ABSENSI</div>
                                    <img src="images/schedule.png" width="40%;">
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                    <a href="NilaiUTS.php">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">NILAI</div>
                                    <img src="images/schedule.png" width="40%;">
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                   
                    
                    <!-- /# column -->
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grafik Pengguna</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-8">
                                        <div id="morris-bar-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
       <?php include 'footer.php'
 ?>