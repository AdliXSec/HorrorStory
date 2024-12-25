<?php 
require_once('config.php');
session_start();

$name = base64_decode(htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_GET['username']))));

$query = $db->query("SELECT * FROM cerita WHERE pencipta_cerita = '".$name."'");
$tampil = $query->fetch_array();

if (mysqli_num_rows($query) > 0) {
    $web_title = $tampil['pencipta_cerita']." - HorrorStory";
    $web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";
    $web_link = $web_url."profile?username=".base64_encode($name);

    include('components/head.php');

?>

<main class="wrapper">
    <?php include('components/navbar.php'); ?>
    <section class="content">
        <section class="container">
            <section class="profile-header">
                <img src="https://cdn.statically.io/avatar/shape=circle/<?= $tampil['pencipta_cerita']; ?>" alt="<?= $tampil['pencipta_cerita']; ?>" class="icon">
                <div class="profile-header-user">
                    <h2><?= $name; ?></h2>
                    <p><?= mysqli_num_rows($query); ?> cerita sudah dipublish oleh <?= $tampil['pencipta_cerita']; ?></p>
                </div>
            </section>
            <div class="profile-body">
                <div class="list-grid">
                    <?php
                    $query2 = $db->query("SELECT * FROM cerita WHERE pencipta_cerita = '".$name."'");

                    while ($ambil = $query2->fetch_assoc()) {
                        $comment = $db->query("SELECT * FROM komentar WHERE id_crt='".$ambil['id_cerita']."'");
                    ?>
                        <section class="grid-item">
                            <img src="<?=$web_url; ?>assets/img/thumbnail-cerita/<?= $ambil["foto_cerita"]; ?>" alt="Cerita 1" class="grid-item-thumbnail">
                            <a href="<?=$web_url; ?>cerita/?cerita_id=<?= base64_encode($ambil["id_cerita"]); ?>" class="grid-item-body">
                                <h3><?= $ambil["judul_cerita"]; ?></h3>
                                <p><?= $ambil["deskripsi_cerita"]; ?></p>
                                <small class="grid-item-author"><img src="https://cdn.statically.io/avatar/shape=circle/<?= $ambil["pencipta_cerita"]; ?>" alt="<?= $ambil["pencipta_cerita"]; ?>" class="icon"> <?= $ambil["pencipta_cerita"]; ?></small>
                                <section class="grid-item-bottom">
                                    <small><i class="icon far fa-thumbs-up"></i> <?= $ambil['cerita_like']; ?></small>
                                    <small><i class="icon far fa-comment"></i> <?= mysqli_num_rows($comment); ?></small>
                                </section>
                            </a>
                        </section>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    </section>
</main>

<?php
    include('components/footer.php');
} else {
    echo "<script>window.alert('User ini belum membuat cerita'); window.location.replace('".$web_url."cerita/buat')</script>";
    // header("location: ".$web_url);
}

?>