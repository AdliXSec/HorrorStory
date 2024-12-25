<?php
require_once('../config.php');
session_start();
if(!isset($_SESSION['login'])){
    header("location: ".$web_url."admin/login");
    exit;
}else{
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
   <script src="ckeditor/ckeditor.js"></script>
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
                <a class="navbar-brand" href="index.php"><?php echo $_SESSION['nama'];?></a> 
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
                    if($_GET['halaman']=='hapus') {


                        $ambil = $db->query("SELECT * FROM cerita WHERE id_cerita = '$_GET[id]'");
                        $pecah = $ambil->fetch_assoc();
                        $fotoberita = $pecah['foto_cerita'];
                        if(file_exists("../assets/img/thumbnail-cerita/$fotoberita")) {
                            unlink("../assets/img/thumbnail-cerita/$fotoberita");
                        }

                        $db->query("DELETE FROM cerita WHERE id_cerita='$_GET[id]'");
                        $db->query("DELETE FROM komentar WHERE id_crt='$_GET[id]'");

                        echo "<script>alert('cerita Terhapus');</script>";
                        echo "<script>location='index.php';</script>";


                    }elseif($_GET['halaman']=='hapuscu'){


                        $db->query("DELETE FROM cerita_user WHERE id_cu='$_GET[id]'");

                        echo "<script>alert('cerita Terhapus');</script>";
                        echo "<script>location='index.php?halaman=ceritauser';</script>";


                    }elseif($_GET['halaman']=='tambah') { ?>

                    <div class="well">
                        <h1>Tambah cerita</h1><br>
                    </div>
                        <form method="POST" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <label>Judul cerita</label>
                                <input type="text" name="judul" class="form-control" placeholder="judul cerita" required>
                            </div>
                            <div class="form-group">
                                <label>deskripsi cerita</label>
                                <input type="text" name="deskripsi" class="form-control" placeholder="deskripsi cerita" required>
                            </div>
                            <div class="form-group">
                                <label>Isi cerita</label>
                                <textarea name="isi" id="tambah" cols="30" rows="10" class="form-control" placeholder="isi cerita"></textarea>
                            </div>
                            <div class="form-group">
                                <label>pencipta cerita</label>
                                <input type="text" name="pencipta" class="form-control" placeholder="pencipta cerita" required>
                            </div>
                            <div class="form-group">
                                <label>Cover Cerita</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </form>
                        <script>
                            CKEDITOR.replace( 'tambah' );
                        </script>
                        <?php 
    
                        if(isset($_POST['submit'])){
                            if (!empty($_POST['isi'])) {
                                $isi = $_POST['isi'];
                            }else{
                                echo "<script>alert('Silahkan Masukkan isi cerita terlebih dahulu')</script>";
                                exit;
                            }
                            $tanggal = date("Ymd");
                            $nama = $_FILES['foto']['name'];
                            $lokasi = $_FILES['foto']['tmp_name'];
                            move_uploaded_file($lokasi, "../assets/img/thumbnail-cerita/" .$nama);
        
                            mysqli_query($db, "INSERT INTO cerita
                            (foto_cerita,judul_cerita,deskripsi_cerita,isi_cerita,pencipta_cerita)
                            VALUES('$nama','$_POST[judul]','$_POST[deskripsi]','$_POST[isi]','$_POST[pencipta]')");

                            echo "<script>alert('cerita berhasil di tambahkan')</script>";
                            echo "<script>location='index.php'</script>";
                        }
                        ?>


            <?php   }elseif ($_GET['halaman']=='ubahpass') { ?>
                <div class="well">
                    <h1>Ubah Password</h1>
                </div><br>
                <form method="post">
                    <div class="form-group">
                        <label>Masukkan gmail Lama</label>
                        <input type="text" name="gmail1" class="form-control" placeholder="Masukkan gmail Lama" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Masukkan Password Lama</label>
                        <input type="text" name="password1" class="form-control" placeholder="Masukkan Password Lama" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Masukkan Username Baru</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username Baru" required>
                    </div> <div class="form-group">
                        <label>Masukkan gmail baru</label>
                        <input type="text" name="gmail" class="form-control" placeholder="Masukkan gmail baru" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Masukkan Password Baru</label>
                        <input type="text" name="password" class="form-control" placeholder="Masukkan password Baru" required>
                    </div>
                    <button type="submit" class="btn btn-warning" name="submit">Ubah Password</button>
                </form><br>
                        <?php
                        if (isset($_POST['submit'])) {
                            $gmail1 = mysqli_real_escape_string($db, $_POST['gmail1']);
                            $password1 = mysqli_real_escape_string($db, $_POST['password1']);
                            $username = mysqli_real_escape_string($db, $_POST['username']);
                            $gmail = mysqli_real_escape_string($db, $_POST['gmail']);
                            $password = mysqli_real_escape_string($db, $_POST['password']);
                            $kueri = mysqli_query($db, "SELECT * FROM login WHERE gmail_login = '$gmail1' AND pass_login = md5('$password1')");
                            if (mysqli_num_rows($kueri)==1) {
                                mysqli_query($db, "UPDATE login SET user_login = '$username', gmail_login = '$gmail', pass_login = md5('$password') WHERE gmail_login = '$gmail1'");

                                echo "<center><div class='well'><font color='green' size='4px'>password lama berhasil di ubah</font></div></center>";
                            }else{
                                echo "<center><div class='well'><font color='red' size='4px'>password lama salah</font></div></center>";
                            }
                            
                            
                        }
                        ?>
            <?php   }elseif ($_GET['halaman']=='tambahadmin') { ?>
                <div class="well">
                    <h1>Tambah admin</h1>
                </div><br>
                <form method="post">
                    <div class="form-group">
                        <label>Masukkan username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Masukkan gmail</label>
                        <input type="text" name="gmail" class="form-control" placeholder="Masukkan gmail" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Masukkan password</label>
                        <input type="text" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-warning" name="submit">Tambah admin</button>
                </form><br>
                    <?php

                    if(isset($_POST['submit'])) {
                        
                        $nama = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['username'])));
                        $email = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['gmail'])));
                        $password = md5(htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['password']))));

                        $query = mysqli_query($db, "SELECT * FROM login WHERE gmail_login = '$email'");
                        $ambil = mysqli_fetch_assoc($query);
                        
                        if (mysqli_num_rows($query)>0) {
                            echo "<script>alert('maaf gmail sudah di gunakan')</script>";
                            
                            exit;
                        }else {
                            mysqli_query($db, "INSERT INTO login
                            (user_login,gmail_login,pass_login)
                            VALUES('$nama','$email','$password')");

                            echo "<script>alert('berhasil registrasi')</script>";
                            echo "<script>location='login.php'</script>";
                            exit;
                        }
                        
                    }

                    ?>
                
                <?php }elseif ($_GET['halaman']=='edit') { 
                
                $query = mysqli_query($db, "SELECT * FROM cerita WHERE id_cerita = '$_GET[id]'");
                // $query2 = mysqli_query($db, "SELECT * FROM cerita_user ")
                if (mysqli_num_rows($query)>0) {
                    
                    $ambil = mysqli_fetch_assoc($query);
                
                ?>
                <div class="well">
                        <h1>Edit Cerita</h1><br>
                    </div>
                        <form method="POST" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <label>Gambar</label><br>
                                <img src="../assets/img/thumbnail-cerita/<?php echo $ambil['foto_cerita']; ?>" width="290px" height="190px" alt="" srcset="">
                            </div>
                            <div class="form-group">
                                <label>Judul cerita</label>
                                <input type="text" name="judul" value="<?=$ambil['judul_cerita'];?>" class="form-control" placeholder="judul cerita" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi cerita</label>
                                <textarea name="deskripsi" cols="30" rows="10" class="form-control" placeholder="deskripsi cerita"><?=$ambil['deskripsi_cerita'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Isi cerita</label>
                                <textarea name="isi" id="tambah" cols="30" rows="10" class="form-control" placeholder="isi cerita"><?=$ambil['isi_cerita'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pencipta cerita</label>
                                <input type="text" name="pencipta" value="<?=$ambil['pencipta_cerita'];?>" class="form-control" placeholder="pencipta cerita" required>
                            </div>
                            <div class="form-group">
                                <label>Cover Cerita</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            
                            <button type="submit" name="proses" class="btn btn-success">Submit</button>
                        </form>
                        <script>
                            CKEDITOR.replace( 'tambah' );
                        </script>
                    <?php
                    

                    if (isset($_POST['proses'])) {
                        
                        

                        $filename = $_FILES['foto']['name'];
                        $lokasi = $_FILES['foto']['tmp_name'];
                        move_uploaded_file($lokasi, "../assets/img/thumbnail-cerita/" .$filename);

                        if ($filename=='') {
                            $foto = $ambil['foto_cerita'];
                            mysqli_query($db, "UPDATE cerita SET
                            foto_cerita      = '$foto', 
                            judul_cerita     = '$_POST[judul]',
                            deskripsi_cerita = '$_POST[deskripsi]',
                            isi_cerita       = '$_POST[isi]',
                            pencipta_cerita  = '$_POST[pencipta]'
                            WHERE id_cerita = '$_GET[id]'
                            ");
                            mysqli_query($db, "UPDATE cerita_user SET 
                            judul_cu     = '$_POST[judul]',
                            deskripsi_cu = '$_POST[deskripsi]',
                            isi_cu       = '$_POST[isi]',
                            pencipta_cu  = '$_POST[pencipta]'
                            WHERE judul_cu = '$ambil[judul_cerita]' AND pencipta_cu = '$ambil[pencipta_cerita]'
                            ");
                            
                        } else {
                            $foto = $ambil['foto_cerita'];
                            if(file_exists("../assets/img/thumbnail-cerita/$foto")) {
                                unlink("../assets/img/thumbnail-cerita/$foto");
                            }
                            $foto = $_FILES['foto']['name'];
                            mysqli_query($db, "UPDATE cerita SET
                            foto_cerita      = '$foto', 
                            judul_cerita     = '$_POST[judul]',
                            deskripsi_cerita = '$_POST[deskripsi]',
                            isi_cerita       = '$_POST[isi]',
                            pencipta_cerita  = '$_POST[pencipta]'
                            WHERE id_cerita = '$_GET[id]'
                            ");
                            mysqli_query($db, "UPDATE cerita_user SET 
                            judul_cu     = '$_POST[judul]',
                            deskripsi_cu = '$_POST[deskripsi]',
                            isi_cu       = '$_POST[isi]',
                            pencipta_cu  = '$_POST[pencipta]'
                            WHERE judul_cu = '$ambil[judul_cerita]' AND pencipta_cu = '$ambil[pencipta_cerita]'
                            ");
                        }

                        
                        
                        
                        echo "<script>alert('Data berhasil di ubah')</script>";
                        echo "<script>location='index.php'</script>";
                    }
                }
                    ?>
            <?php   }elseif ($_GET['halaman']=='editcu') { 
                
                $query = mysqli_query($db, "SELECT * FROM cerita_user WHERE id_cu = '$_GET[id]'");
                if (mysqli_num_rows($query)>0) {
                    
                    $ambil = mysqli_fetch_assoc($query);
                
                ?>
                <div class="well">
                        <h1>Edit Cerita User</h1><br>
                    </div>
                        <form method="POST" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <label>Judul cerita</label>
                                <input type="text" name="judul" value="<?=$ambil['judul_cu'];?>" class="form-control" placeholder="judul cerita" required>
                            </div>
                            <div class="form-group">
                                <label>deskripsi cerita</label>
                                <textarea name="deskripsi" cols="30" rows="10" class="form-control" placeholder="deskripsi cerita"><?=$ambil['deskripsi_cu'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Isi cerita</label>
                                <textarea name="isi" id="tambah" cols="30" rows="10" class="form-control" placeholder="isi cerita"><?=$ambil['isi_cu'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>pencipta cerita</label>
                                <input type="text" name="pencipta" value="<?=$ambil['pencipta_cu'];?>" class="form-control" placeholder="pencipta cerita" required>
                            </div>
                            <div class="form-group">
                                <label>status cerita</label>
                                <input type="text" name="status" value="<?=$ambil['status'];?>" class="form-control" placeholder="pencipta cerita" required>
                            </div>
                            
                            <button type="submit" name="proses" class="btn btn-success">Submit</button>
                        </form>
                        <script>
                            CKEDITOR.replace( 'tambah' );
                        </script>
                    <?php
                    

                    if (isset($_POST['proses'])) {
                        
                        

                        
                        mysqli_query($db, "UPDATE cerita_user SET
                        judul_cu     = '$_POST[judul]',
                        deskripsi_cu = '$_POST[deskripsi]',
                        isi_cu       = '$_POST[isi]',
                        pencipta_cu  = '$_POST[pencipta]',
                        status       = '$_POST[status]'
                        WHERE id_cu = '$_GET[id]'
                        ");
                            
                        
                        echo "<script>alert('Data berhasil di ubah')</script>";
                        echo "<script>location='index.php'</script>";
                    }
                }
                    ?>
            <?php   }elseif ($_GET['halaman']=='uploadcu') { 
                
                $query = mysqli_query($db, "SELECT * FROM cerita_user WHERE id_cu = '$_GET[id]'");
                if (mysqli_num_rows($query)>0) {
                    
                    $ambil = mysqli_fetch_assoc($query);
                
                ?>
                <div class="well">
                        <h1>Upload Cerita User</h1><br>
                    </div>
                        <form method="POST" enctype="multipart/form-data"> 
                            <!-- <div class="form-group">
                                <label>Gambar</label><br>
                                <img src="../assets/img/thumbnail-cerita/" width="290px" height="190px" alt="" srcset="">
                            </div> -->
                            <div class="form-group">
                                <label>Judul cerita</label>
                                <input type="text" name="judul" value="<?=$ambil['judul_cu'];?>" class="form-control" placeholder="judul cerita" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi cerita</label>
                                <textarea name="deskripsi" cols="30" rows="10" class="form-control" placeholder="deskripsi cerita"><?=$ambil['deskripsi_cu'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Isi cerita</label>
                                <textarea name="isi" id="tambah" cols="30" rows="10" class="form-control" placeholder="isi cerita"><?=$ambil['isi_cu'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Pencipta cerita</label>
                                <input type="text" name="pencipta" value="<?=$ambil['pencipta_cu'];?>" class="form-control" placeholder="pencipta cerita" required>
                            </div>
                            <div class="form-group">
                                <label>Cover Cerita</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            
                            <button type="submit" name="proses" class="btn btn-success">Submit</button>
                        </form>
                        <script>
                            CKEDITOR.replace( 'tambah' );
                        </script>
                    <?php
                    

                    if (isset($_POST['proses'])) {
                        
                        

                        $filename = $_FILES['foto']['name'];
                        $file_basename = substr($filename, 0, strripos($filename, '.')); // This returns file name
                        $file_ext = substr($filename, strripos($filename, '.')); // This returns file ext
                        $filesize = $_FILES["file"]["size"];
                        $lokasi = $_FILES['foto']['tmp_name'];
                        $rewrite = md5($file_basename) . $file_ext;
                        move_uploaded_file($lokasi, "../assets/img/thumbnail-cerita/" . $rewrite);

                        if ($filename=='') {
                            $foto = 'cerita.jpg';
                            mysqli_query($db, "INSERT INTO cerita
                            (foto_cerita,judul_cerita,deskripsi_cerita,isi_cerita,pencipta_cerita)
                            VALUES('$foto','$_POST[judul]','$_POST[deskripsi]','$_POST[isi]','$_POST[pencipta]')");
                            $db->query("UPDATE cerita_user SET status = 'uploaded' WHERE pencipta_cu = '".$_POST[pencipta]."' AND judul_cu = '".$_POST[judul]."'");
                            
                        } else {
                            mysqli_query($db, "INSERT INTO cerita
                            (foto_cerita,judul_cerita,deskripsi_cerita,isi_cerita,pencipta_cerita)
                            VALUES('$rewrite','$_POST[judul]','$_POST[deskripsi]','$_POST[isi]','$_POST[pencipta]')");
                            $db->query("UPDATE cerita_user SET status = 'uploaded' WHERE pencipta_cu = '".$_POST['pencipta']."' AND judul_cu = '".$_POST['judul']."'");                       
                        }
                         
                        
                        
                        
                        echo "<script>alert('Data berhasil di ubah')</script>";
                        echo "<script>location='index.php'</script>";
                    }   
                }
                    ?>
            <?php   }elseif ($_GET['halaman']=='ceritauser') { ?>
                    
                        <div class="well">
                            <h1>Cerita User</h1><br>
                        </div>
                            <form method="post">
                
                                <div class="form-group">
                        
                                    <input type="text" name="cari" class="form-control" placeholder="search">
                                    <button class="btn btn-success" name="goleki" >Search</button>
                        
                                </div>
                
                            </form>
                
                            <table class="table table-bordered"> 
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>judul cerita</th>
                                        <th>deskripsi cerita</th>
                                        <th>pencipta cerita</th>
                                        <th>isi cerita</th>
                                        <th>status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                    $perPage = 10;
                                    $page = isset($_GET['page']) ? (int)$_GET["page"] : 1;
                                    $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

                                    $search = @htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['cari'])));

                                    if($search != '') {
                                        $berita = "SELECT * FROM cerita_user WHERE judul_cu LIKE '%".$search."%' OR pencipta_cu LIKE '%".$search."%' "; 
                                        echo "<center><h2>Result <font color='green'>".$search."</font></h2></center><br><br>";
                                    }else{
                                        $berita = "SELECT * FROM cerita_user ORDER BY id_cu DESC LIMIT $start, $perPage";
                                    }

                                    $result = mysqli_query($db, $berita);

                                    $kuery = mysqli_query($db, "SELECT * FROM cerita_user");
                                    $total = mysqli_num_rows($kuery);

                                    $pages = ceil($total/$perPage);

                                    $i = 1;
                        
                                    if (mysqli_num_rows($result) > 0) {
                                        # code...
                                    
                                        while($ambil = mysqli_fetch_assoc($result)) {  
                                            if ($ambil['status']=='uploaded') {
                                                $text = 'uploaded';
                                                $warning = 'success';
                                            }else{
                                                $text = 'waiting';
                                                $warning = 'warning';
                                            }
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $ambil['judul_cu']; ?></td>
                                        <td><?php echo $ambil['deskripsi_cu']; ?></td>
                                        <td><b><?php echo $ambil['pencipta_cu']; ?></b></td>
                                        <td><?php echo substr($ambil['isi_cu'],0,200); ?></td>
                                        <td><button class="btn btn-<?=$warning;?>"><?=$text;?></button></td>
                                        <td>
                                            <a href="index.php?halaman=hapuscu&id=<?= $ambil['id_cu']; ?>"><button class="btn btn-danger">Hapus</button></a>
                                            <a href="index.php?halaman=editcu&id=<?= $ambil['id_cu']; ?>"><button class="btn btn-warning">edit</button></a>
                                            <a href="index.php?halaman=uploadcu&id=<?= $ambil['id_cu']; ?>"><button class="btn btn-success">upload</button></a>
                                        </td>
                                    </tr>
                                </tbody>
                                
                                <?php } }else{?>
                                <div class="container">
                                    <div class="well">
                                        <center>
                                            <h3>Tidak Ada Data <font color="red"><?=$search?></font></h3>
                                        </center>
                                    </div>
                                </div>
                                <?php }?>
                            </table>
                                <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                                    <button class="btn btn-success"><font size="3px">page : </font></button>
                                    <?php for($i=1; $i<=$pages; $i++){ ?>
                                        <a href="index.php?halaman=ceritauser&page=<?= $i ?>" class="btn btn-warning"><font size="3px"> <?= $i ?>,</font></a>
                                    <?php } ?>
                                </div><br><br>
                <?php } 
            }else{
            ?>
            <div class="well">
                <h1>Dashboard Admin</h1><br>
            </div>
                <form method="GET">
    
                    <div class="form-group">
            
                        <input type="text" name="search" class="form-control" placeholder="search">
                        <button class="btn btn-success">Search</button>
            
                    </div>
    
                </form>
    
                <table class="table table-bordered"> 
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>poster cerita</th>
                            <th>judul cerita</th>
                            <th>deskripsi cerita</th>
                            <th>pencipta cerita</th>
                            <th>isi cerita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                        $perPage = 10;
                        $page = isset($_GET['page']) ? (int)$_GET["page"] : 1;
                        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

                        $search = @htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_GET['search'])));

                        if($search != '') {
                            $berita = "SELECT * FROM cerita WHERE judul_cerita LIKE '%".$search."%' OR pencipta_cerita LIKE '%".$search."%' "; 
                            echo "<center><h2>Result <font color='green'>".$search."</font></h2></center><br><br>";
                        }else{
                            $berita = "SELECT * FROM cerita ORDER BY id_cerita DESC LIMIT $start, $perPage";
                        }

                        $result = mysqli_query($db, $berita);

                        $kuery = mysqli_query($db, "SELECT * FROM cerita");
                        $total = mysqli_num_rows($kuery);

                        $pages = ceil($total/$perPage);

                        $i = 1;
            
                        if (mysqli_num_rows($result) > 0) {
                            # code...
                        
                            while($ambil = mysqli_fetch_assoc($result)) {  
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><img src="../assets/img/thumbnail-cerita/<?php echo $ambil['foto_cerita']; ?>" alt="" width="50px" height="40px"></td>
                            <td><a href="../cerita/?cerita_id=<?= base64_encode($ambil['id_cerita']);?>" target="_blank" rel="noopener noreferrer"><?php echo $ambil['judul_cerita']; ?></a></td>
                            <td><?php echo $ambil['deskripsi_cerita']; ?></td>
                            <td><?php echo $ambil['pencipta_cerita']; ?></td>
                            <td><?php echo substr($ambil['isi_cerita'],0,200); ?></td>
                            <td>
                                <a href="index.php?halaman=hapus&id=<?= $ambil['id_cerita']; ?>"><button class="btn btn-danger">Hapus</button></a>
                                <a href="index.php?halaman=edit&id=<?= $ambil['id_cerita']; ?>"><button class="btn btn-warning">edit</button></a>
                            </td>
                        </tr>
                    </tbody>
                    
                    <?php } }else{?>
                    <div class="container">
                        <div class="well">
                            <center>
                                <h3>Tidak Ada Data <font color="red"><?=$search?></font></h3>
                            </center>
                        </div>
                    </div>
                    <?php }?>
                </table>
                    <a href="index.php?halaman=tambah"><button class="btn btn-primary">Tambah cerita</button></a>
                    <a href="index.php?halaman=tambahadmin"><button class="btn btn-primary">Tambah admin</button></a>
                    <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                        <button class="btn btn-success"><font size="3px">page : </font></button>
                        <?php for($i=1; $i<=$pages; $i++){ ?>
                            <a href="?page=<?= $i ?>" class="btn btn-warning"><font size="3px"> <?= $i ?>,</font></a>
                        <?php } ?>
                    </div><br><br>
       <?php } }?>
             <!-- /. PAGE INNER  -->
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