<?php
require_once('../config.php');
session_start();

$web_title = "Buat Cerita - HorrorStory";
$web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";


if (!isset($_SESSION['id'])) {
    header("location: ".$web_url."login");
    exit;
} else {
    include('../components/head.php');

    // patc bug csrf
    if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    
    if (isset($_POST['submit'])) {
        // patc bug csrf
        if ($_SESSION['token'] == $_POST['token']) {
            unset($_SESSION['token']);
            $author = $_SESSION['name'];
            $judul = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['judul'])));
            $deskripsi = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['desc'])));
            $isi = mysqli_real_escape_string($db, $_POST['isicerita']);

            if ($judul !== "" && $deskripsi !== "" && $isi !== "") {
                $query = $db->query("INSERT INTO cerita_user(judul_cu,deskripsi_cu,isi_cu,pencipta_cu,status) VALUES('".$judul."','".$deskripsi."','".$isi."','".$author."','alert')");

                if ($query) {
                    echo "<script>alert('cerita berhasil di kirim, tunggu hingga admin memverifikasi cerita kamu dan akan di tampilkan'); window.location.replace('".$web_url."cerita/buat')</script>";
                } else {
                    echo "<script>window.alert('Cerita gagal dibuat')</script>";
                }
            } else {
                echo "<script>window.alert('Mohon untuk mengisi formnya')</script>";
            }
        }
    }
?>

<main class="wrapper">
    <?php include('../components/navbar.php'); ?>
    <section class="content">
        <div class="container">
            <h1>Submit Cerita Kamu</h1>
            <p>Kirim cerita kamu kemudian cerita kamu akan direview oleh tim kita dan akan dipublish.</p>

            <form method="post" class="buat-form">
                <!-- patch bug csrf -->
                <input type="hidden" name="token" value="<?=$_SESSION['token'];?>">
                <section class="buat-form-group">
                    <label for="judul">Judul Cerita</label>
                    <input type="text" name="judul" id="judul" autocomplete="off" placeholder="Judul Cerita">
                </section>
                <section class="buat-form-group">
                    <label for="desc">Deskripsi Cerita, *Note: hanya memuat 200 huruf</label>
                    <textarea rows="8" name="desc" id="desc" autocomplete="off" placeholder="Deskripsi Cerita"></textarea>
                </section>
                <section class="buat-form-group">
                    <label for="cerita">Isi Cerita</label>
                    <textarea name="isicerita" id="ckeditor" rows="12"></textarea>
                </section>
                <button type="submit" name="submit">Submit Cerita</button>
            </form>
        </div>
    </section>
</main>
<script>
    'use strict';
    CKEDITOR.replace('isicerita');
</script>

<?php
    include('../components/footer.php');
}
?>