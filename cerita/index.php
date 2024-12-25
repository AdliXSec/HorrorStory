<?php
require_once('../config.php');
session_start();

if (isset($_GET['cerita_id'])) {
    $id = base64_decode($_GET['cerita_id']);
    if ($id < 0) {
        header('location: '.$web_url);
        exit;
    } else if (!is_numeric($id)) {
        header('location: '.$web_url);
        exit;
    }
}


if (isset($_POST['hapus_komentar'])) {
    $query = $db->query("DELETE FROM komentar WHERE id_komentar = '".$_POST['id_komen']."'");
    if ($query) {
        echo "<script>window.alert('Komentar berhasil dihapus!')</script>";
    } else {
        echo "<script>window.alert('Komentar gagal dihapus!')</script>";
    }
}

// setcookie('total', 'total', time()+120);

if (isset($_GET['cerita_id'])) {
    if ($_GET['cerita_id'] !== '') {
        $id = base64_decode(htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_GET['cerita_id']))));
        $query = $db->query("SELECT * FROM cerita WHERE id_cerita = '$id'");
        
        if (mysqli_num_rows($query) > 0) {
            while ($row = $query->fetch_assoc()) {
                $comment = $db->query("SELECT * FROM komentar WHERE id_crt = '".$row['id_cerita']."'");
                $web_title = $row['judul_cerita']." - HorrorStory";
                $web_desc = "HorrorStory - ".$row['deskripsi_cerita'];
                include('../components/head.php');
?>

<main class="wrapper">
    <?php include('../components/navbar.php'); ?>
    <?php if (isset($_SESSION['id'])) { ?>
    <div class="preload-container">
        <img class="preload-foto" src="<?= $web_url; ?>assets/img/thumbnail-cerita/<?= $row['foto_cerita']; ?>" alt="<?= $row['judul_cerita']; ?>">
        <h3><?= $row['judul_cerita']; ?></h3>
        <p class="preload-text">Loading...</p>
    </div>
    <?php } ?>
    <section class="cerita-container">
        <section class="cerita-header">
            <img src="<?= $web_url; ?>assets/img/thumbnail-cerita/<?= $row['foto_cerita']; ?>"
                alt="<?= $row['judul_cerita']; ?>" class="cerita-header-background">
            <section class="container">
                <section class="container-left">
                    <img src="<?=$web_url; ?>assets/img/thumbnail-cerita/<?= $row['foto_cerita']; ?>"
                        alt="<?= $row['judul_cerita']; ?>">
                </section>
                <section class="container-right">
                    <a href="<?= $web_url; ?>profile?username=<?= base64_encode($row['pencipta_cerita']); ?>" class="profile"><img src="https://cdn.statically.io/avatar/shape=circle/<?= $row["pencipta_cerita"]; ?>" alt="<?= $row["pencipta_cerita"]; ?>" class="icon"> <?= $row['pencipta_cerita']; ?></a>
                    <h2 class="cerita-judul"><?= $row['judul_cerita']; ?></h2>
                    <p><?= $row['deskripsi_cerita']; ?></p>
                    <section class="cerita-info">
                        <p><i class="far fa-thumbs-up"></i> <?= $row['cerita_like']; ?> &nbsp; &nbsp; <i class="far fa-comment"></i> <?= mysqli_num_rows($comment); ?></p>
                    </section>
                </section>
            </section>
        </section>
        <?php if (!isset($_SESSION['id'])) { ?>
        <section class="cerita-body">
            <div class="container">
                <p><?= substr($row['isi_cerita'], 0, 400); ?></p>
                <div class="cerita-cropped"></div>
                <a href="<?= $web_url; ?>login?source=<?= $_GET['cerita_id']; ?>" class="cerita-login">Baca
                    selengkapnya</a>
            </div>
        </section>
        <?php } else { 
            if (isset($_POST['like'])) {
                $cekLike = $db->query("SELECT * FROM like_history WHERE user_mail = '".$_SESSION['mail']."' AND cerita_id = '".$row['id_cerita']."'");

                if (mysqli_num_rows($cekLike) > 0) {
                    echo "<script>window.alert('Kamu sudah menyukai cerita ini')</script>";
                } else {
                    $tambahLike = $db->query("UPDATE cerita SET cerita_like = '".($row['cerita_like'] + 1)."' WHERE id_cerita = '".$row['id_cerita']."'");
                    $tambahHistory = $db->query("INSERT INTO like_history(cerita_id,user_mail) VALUES('".$row['id_cerita']."','".$_SESSION['mail']."')");
                    echo "<script>window.alert('Kamu menyukai cerita ini')</script>";
                }
            }
            
            ?>
            <section class="cerita-body">
                <div class="container">
                    <p><?= $row['isi_cerita']; ?></p>
                    <form class="cerita_like" method="post">
                        <p class="cerita-alert">Suka dengan cerita ini? <button type="submit" class="cerita-button" name="like"><i class="far fa-thumbs-up"></i> Like</button></p>
                    </form>
                </div>
            </section>
            <section class="cerita-komentar">
                <div class="container">
                    <h2>komentar</h2>
                    <?php
                    if (isset($_POST['komen'])) {
                        
                        $user = $_SESSION['mail'];
                        $cek = $db->query("SELECT * FROM komentar WHERE id_crt = '".$id."' AND nama_komentar = '".$_SESSION['name']."' AND user_mail = '".$_SESSION['mail']."'");
                        $isi = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['isi'])));

                        if (mysqli_num_rows($cek)< 20) {
                            # code...
                        
                            if ($isi === "") {
                                echo "<script>window.alert('Mohon isi form komentarnya')</script>";
                            } else {
                                $tgl = date("Y-m-d");
                                $tambahh = $db->query("INSERT INTO komentar(id_crt, nama_komentar, user_mail, tanggal_komentar, isi_komentar) VALUES('".$row['id_cerita']."','".$_SESSION['name']."','".$_SESSION['mail']."','".$tgl."','".$isi."')");

                                if ($tambahh) {
                                    echo "<script>window.alert('Berhasil menambahkan komentar!')</script>";
                                } else {
                                    echo "<script>window.alert('Gagal submit komentar, silahkan coba lagi')</script>";
                                }
                            }
                        }else{
                            echo "<script>window.alert('anda mencapai batas komentar!, batas komentar 20 komentar')</script>";
                        }
                    } 
                    ?>
                    <section class="cerita-komentar-form">
                        <form method="post">
                            <textarea name="isi" rows="8" id="komenku"></textarea>
                            <button type="submit" name="komen">Submit</button>
                        </form>
                    </section>
                    <section class="cerita-komentar-row">
                        <?php
                        $allComment = $db->query("SELECT * FROM komentar WHERE id_crt = '".$row['id_cerita']."' ORDER BY id_komentar DESC");
                        
                        while ($komen = $allComment->fetch_assoc()) { 
                        ?>
                            <section class="komentar">
                                <p class="komentar-user"><img src="https://cdn.statically.io/avatar/shape=circle/<?= $komen["nama_komentar"]; ?>" alt="<?= $komen["nama_komentar"]; ?>" class="profile-small"> &nbsp; <?= $komen['nama_komentar']; ?></p>
                                <small><?= $komen['tanggal_komentar']; ?></small>
                                <p class="komen"><?= $komen['isi_komentar']; ?></p>
                                <?php if ($komen['user_mail'] === $_SESSION['mail']) { ?>
                                    <form class="komentar-opsi" method="post">
                                        <input type="text" value="<?= $komen['id_komentar']; ?>" name="id_komen"/>
                                        <button type="submit" name="hapus_komentar"><i class="far fa-trash"></i> hapus</button>
                                    </form>
                                <?php } ?>
                            </section>  
                        <?php } ?>
                    </section>
                </div>

            </section>
        <?php } ?>
    </section>
    
<?php if (isset($_SESSION['id'])) {
?>
<script>
    (() => {
        'use strict';

        if (document.getElementById('komenku').value.match(/"|'|=|\+|-|<|>|`/gi)) {
            let a = document.getElementById('komenku').value.replace(/"|'|=|\+|-|<|>|`/gi, "");
            document.getElementById('komenku').value = a.replace(a, "Kerenn");
        }

        const preload = document.querySelector('.preload-container'),
                preloadText = document.querySelector('.preload-text');
        const changedText = setInterval(() => {
            const dataText = ['Loading.','Loading..','Loading...'];
            if (preloadText.innerText === dataText[2]) {
                preloadText.innerText = dataText[0];
            } else if (preloadText.innerText === dataText[0]) {
                preloadText.innerText = dataText[1];
            } else if (preloadText.innerText === dataText[1]) {
                preloadText.innerText = dataText[2];
            } 
        }, 500);

        window.addEventListener('load', () => {
            setTimeout(() => {
                preload.classList.add('hide');
                changedText.clearInterval();
            }, 2500);
        });
    })();
</script>
<?php
}

                include('../components/footer.php');
            }
        } else {
            echo "<script>window.alert('Cerita tidak tersedia'); window.location.replace('".$web_url."');</script>";
            exit;
        }
    } else {
        header('location: '.$web_url);
        exit;
    }
} else {
    header('location: '.$web_url);
    exit;
}
?>