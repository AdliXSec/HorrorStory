<?php
require_once("config.php");
session_start();

$query = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_GET["query"])));

$web_title = "Hasil pencarian untuk: ".$query;
$web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";

if (isset($query)) {
    include('components/head.php');
?>

<main class="wrapper">
    <?php include('components/navbar.php'); ?>
    <section class="list content">
        <section class="container">
            <h2>Hasil pencarian untuk: <?= $query; ?></h2>
            <br/><br/>
            <section class="list-grid">
                <?php
                $cerita = $db->query("SELECT * FROM cerita WHERE judul_cerita LIKE '%".$query."%' OR pencipta_cerita LIKE '%".$query."%'");
                if (mysqli_num_rows($cerita) > 0) {
                    while ($row = $cerita->fetch_assoc()) {
                        $comment = $db->query("SELECT * FROM komentar WHERE id_crt='".$row['id_cerita']."'");
                ?>

                    <section class="grid-item">
                        <img src="<?=$web_url; ?>assets/img/thumbnail-cerita/<?= $row["foto_cerita"]; ?>" alt="Cerita 1" class="grid-item-thumbnail">
                        <a href="<?=$web_url; ?>cerita/?cerita_id=<?= base64_encode($row["id_cerita"]); ?>" class="grid-item-body">
                            <h3><?= $row["judul_cerita"]; ?></h3>
                            <p><?= $row["deskripsi_cerita"]; ?></p>
                            <small class="grid-item-author"><img src="https://cdn.statically.io/avatar/shape=circle/<?= $row["pencipta_cerita"]; ?>" alt="<?= $row["pencipta_cerita"]; ?>" class="icon"> <?= $row["pencipta_cerita"]; ?></small>
                            <section class="grid-item-bottom">
                                <small><i class="icon far fa-thumbs-up"></i> <?= $row['cerita_like']; ?></small>
                                <small><i class="icon far fa-comment"></i> <?= mysqli_num_rows($comment); ?></small>
                            </section>
                        </a>
                    </section>

                <?php
                    }
                } ?>
            </section>
            <br/>
            <h3>Profile</h3>
            <section class="profile-grid">
                <?php
                $cerita = $db->query("SELECT * FROM cerita WHERE pencipta_cerita LIKE '%".$query."%'");
                if (mysqli_num_rows($cerita) > 0) {
                    while ($row = $cerita->fetch_assoc()) {
                        $comment = $db->query("SELECT * FROM komentar WHERE id_crt='".$row['id_cerita']."'");
                        $query2 = $db->query("SELECT * FROM cerita WHERE pencipta_cerita = '".$row['pencipta_cerita']."'");
                ?>

                    <section class="grid-item">
                        <a href="<?= $web_url; ?>profile?username=<?= base64_encode($row['pencipta_cerita']); ?>" class="grid-item-container">
                            <img src="https://cdn.statically.io/avatar/shape=circle/<?= $row["pencipta_cerita"]; ?>" alt="<?= $row["pencipta_cerita"]; ?>" class="profile">
                            <h2><?= $row['pencipta_cerita']; ?></h2>
                            <p><?= mysqli_num_rows($query2); ?> Cerita</p>
                        </a>
                    </section>

                <?php
                    }
                }
                ?>
            </section>
        </section>
    </section>
</main>

<?php
    include('components/footer.php');
} else {
    header("location: ".$web_url);
}
?>