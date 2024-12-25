<?php
require_once('config.php');
session_start();

$web_title = "Donasi - HorrorStory";
$web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";
$web_link = $web_url."donasi";

include('components/head.php');

?>

<main class="wrapper">
    <?php include('components/navbar.php'); ?>
    <section class="container content">
        <h1>Donasi</h1>
        <p>Support kami dengan memberi donasi untuk mengembangkan terus website ini<br/>kamu bisa donasi ke nomer ini: 089636356114</p>
        <p>Terimakasih banyak! selamat membaca</p>
        <div class="donasi-row">
            <img src="https://seeklogo.com/images/D/dana-e-wallet-app-logo-F56CE2EEE0-seeklogo.com.png" alt="logo DANA">
            <img src="https://www.freepnglogos.com/uploads/shopee-logo-png/shopee-logo-digital-economy-forum-mdcc-1.png" alt="logo Shopee">
            <img src="<?= $web_url; ?>assets/img/gopay.svg" alt="Logo Gopay">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo_purple.svg" alt="Logo OVO">
        </div>
    </section>
</main>

<?php include('components/footer.php'); ?>