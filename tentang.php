<?php
require_once('config.php');
session_start();

$web_title = "Tentang - HorrroStory";
$web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";

include('components/head.php');

?>

<main class="wrapper">
    <?php include('components/navbar.php'); ?>
    <section class="container content">
        <h1>Tentang</h1>
        <center><img src="<?= $web_url; ?>assets/img/horrorstory.svg" alt="HorrorStory Logo" style="width: 70%; margin: 1rem 0;"></center>
        <p>HorrorStory adalah platform seperti Wattpad untuk membaca-membaca cerita horror. Platform membaca cerita horror ini dibuat menggunakan PHP native dan menggunakan SASS.</p>
        <p>Website ini di ciptakan dengan tujuan mengumpulkan para penggemar cerita horror agar mereka dapat membaca cerita yang seru sekaligus horror tanpa di pungut biaya (free).</p>
        <p>Di website ini kamu bukan hanya membaca cerita, tapi kamu juga bisa membagikan pengalaman horror kamu disini loh, kamu juga bisa sharing sharing dan mendapatkan teman baru, kamu juga bisa membagikan pengalaman horror kamu.</p>
        <p>Dan yang pasti, di website ini data pribadi kamu aman, website ini sudah terverifikasi dan aman dari serangan orang tidak bertanggung jawab.</p>
    </section>
</main>

<?php
include('components/footer.php');
?>