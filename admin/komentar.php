<?php
require_once('../config.php');
session_start();
if(!isset($_SESSION['login'])){
    header("location: ".$web_url."admin/login");
    exit;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Anda Memasuki Dashboard saat ini Pada : <?php echo date("d-m-Y"); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="index.php?halaman=ceritauser"><i class="fa fa-desktop fa-3x"></i> Cerita User </a>                </li>
                    <li>
                    <li>
                        <a  href="index.php?halaman=tambah"><i class="fa fa-desktop fa-3x"></i> Tambah Cerita </a>                </li>
                    <li>
                        <a  href="komentar.php"><i class="fa fa-edit fa-3x"></i> Daftar Komentar </a>
                    </li>	
                    <li>
                        <a  href="user.php"><i class="fa fa-edit fa-3x"></i> Daftar User </a>
                    </li>
                    <li>
                        <a  href="index.php?halaman=ubahpass"><i class="fa fa-qrcode fa-3x"></i> Ubah Password</a>
                    </li>
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
            <?php
            if(isset($_GET['halaman'])) {
                if ($_GET['halaman']=='hapus') {
                    $db->query("DELETE FROM komentar WHERE id_komentar='$_GET[id]'");

                    echo "<script>alert('Komentar Terhapus');</script>";
                    echo "<script>location='komentar.php';</script>";
                }
            }else{ ?>
            
            <?php $jumlah = mysqli_query($db, "SELECT * FROM komentar");
                  $jokok = mysqli_num_rows($jumlah);
            ?>
            <div class="well">
            <h1>Kumpulan Komentar</h1><br>
            <h4>Menampilkan seluruh komentar yang berjumlah <?= $jokok ?> komentar</h4>
            </div>
                
                    
                
            
            
            
            <form method="GET">
    
                <div class="form-group">
                
                    <input type="text" name="search" class="form-control" placeholder="search">
                    <button class="btn btn-success">Search</button>
            
                </div>
    
            </form><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>id berita / lokasi</th>
                        <th>tanggal komen</th>
                        <th>nama</th>
                        <th>isi</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <?php 
                $search = @htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_GET['search'])));

                if($search != '') {
                    $komentar = mysqli_query($db, "SELECT * FROM komentar WHERE nama_komentar LIKE '%".$search."%' OR isi_komentar LIKE '%".$search."%' "); 
                    echo "<center><h2>Result <font color='green'>".$search."</font></h2></center><br><br>";
                }else{
                    $komentar = mysqli_query($db, "SELECT * FROM komentar");
                }
                $no = 1;
                
                if (mysqli_num_rows($komentar) > 0) {
                    # code...
                
                    while($ambil = mysqli_fetch_assoc($komentar)) {
                ?>
                <tbody>
                    <tr>
                        <td><?=$no++?></td>
                        <td><a href="../cerita/?cerita_id=<?php echo base64_encode($ambil['id_crt']); ?>" target="_blank" rel="noopener noreferrer">Lokasi Komen</a></td>
                        <td><?= $ambil['tanggal_komentar']; ?></td>
                        <td><?= $ambil['nama_komentar']; ?></td>
                        <td><?= $ambil['isi_komentar']; ?></td>
                        <td><a href="komentar.php?halaman=hapus&id=<?=$ambil['id_komentar'];?>"><button class="btn btn-danger">Hapus</button></a></td>
                    </tr>
                </tbody>
                <?php } }else{ ?>
                <div class="container">
                    <div class="well">
                        <center>
                            <h3>Tidak Ada Data <font color="red"><?=$search?></font></h3>
                        </center>
                    </div>
                </div>
            </table>
            
            <?php } } ?>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>