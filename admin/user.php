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
                    $db->query("DELETE FROM user WHERE id_user='$_GET[id]'");

                    echo "<script>alert('user Terhapus');</script>";
                    echo "<script>location='user.php';</script>";
                }
            }else{ ?>
            
            <?php $jumlah = mysqli_query($db, "SELECT * FROM user");
                  $jokok = mysqli_num_rows($jumlah);
            ?>
            <div class="well">
            <h1>Kumpulan user</h1><br>
            <h4>Menampilkan seluruh user yang berjumlah <?= $jokok ?> user</h4>
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
                        <th>nama user</th>
                        <th>gmail user</th>
                        <th>password user</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <?php 
                $search = @htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_GET['search'])));

                if($search != '') {
                    $user = mysqli_query($db, "SELECT * FROM user WHERE username_user LIKE '%".$search."%' "); 
                    echo "<center><h2>Result <font color='green'>".$search."</font></h2></center><br><br>";
                }else{
                    $user = mysqli_query($db, "SELECT * FROM user");
                }
                $no = 1;
                
                if (mysqli_num_rows($user) > 0) {
                    # code...
                
                    while($ambil = mysqli_fetch_assoc($user)) {
                ?>
                <tbody>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?= $ambil['username_user']; ?></td>
                        <td><?= $ambil['gmail_user']; ?></td>
                        <td><?= $ambil['password_user']; ?></td>
                        <td><a href="user.php?halaman=hapus&id=<?=$ambil['id_user'];?>"><button class="btn btn-danger">Hapus</button></a></td>
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