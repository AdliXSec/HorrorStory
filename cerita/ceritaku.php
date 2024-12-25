<?php
require_once('../config.php');
session_start();

if (!isset($_SESSION['id'])) {
    header("location: ".$web_url."login");
    exit;
} else {
    $web_title = "Ceritaku - HorrorStory";
    $web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";
    include('../components/head.php');
?>

<main class="wrapper">
    <?php include('../components/navbar.php'); ?>
    <div class="container content">
        <h1>Ceritaku</h1>
        <p>List cerita yang sudah kamu submit</p>
        <small>*note: jika cerita kamu sudah tidak ada dilist, berarti cerita kamu sudah dipublish</small>

        <?php
        $cek = $db->query("SELECT * FROM cerita_user WHERE pencipta_cu = '".$_SESSION['name']."' ORDER BY id_cu DESC");
        if (mysqli_num_rows($cek) > 0) {
        ?>
        <section class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="status">Status</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Isi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $db->query("SELECT * FROM cerita_user WHERE pencipta_cu = '".$_SESSION['name']."' ORDER BY id_cu DESC");
                    $no = 1;

                    while ($row = $query->fetch_assoc()) {
                        if ($row['status']=='uploaded') {
                            $text = 'uploaded';
                        }else{
                            $text = 'waiting';
                        }
                        
                    ?>

                        <tr>
                            <td class="nomer"><?= $no++; ?></td>
                            <td><span class="<?= $row['status'] ?>"><?=$text;?></span></td>
                            <td><?= $row['judul_cu']; ?></td>
                            <td><?= $row['deskripsi_cu']; ?></td>
                            <td class="isi"><?= htmlentities(htmlentities(mysqli_real_escape_string($db, $row['isi_cu']))); ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <?php } else { ?>
            <br><br><br>
        <center><h3>Belum ada cerita yang disubmit</h3></center>
        <?php } ?>
    </div>
</main>

<?php
    include('../components/footer.php');
}
?>