<?php
require_once('config.php');
session_start();

$web_title = "ERROR 404 - HorrorStory";
$web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";

include('components/head.php');
?>

<main class="wrapper">
    <?php include('components/navbar.php'); ?>
    <section class="container error-container">
        <img src="https://images.unsplash.com/photo-1610997634568-5b6d91505cc0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=720&q=100" alt="HorrorBackground - unsplash" class="error-background">
        <div class="error">
            <h1 class="font-horror">404</h1>
            <p>Halaman tidak ditemukan<br/>segeralah balik ke halaman awal atau kamu akan...</p>
            <a href="<?= $web_url; ?>" class="error-button">Back Home</a>
        </div>
    </section>
</main>
<script src="<?= $web_url; ?>assets/js/main.js"></script>
</body>
</html>