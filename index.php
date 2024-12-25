<?php
require_once('config.php');
session_start();

$web_title = 'HorrorStory';
$web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";

include('components/head.php');
?>

<main class="wrapper">
    <?php include('components/navbar.php'); ?>
    <div class="alert-container">
        <div class="alert-welcome"></div>
    </div>
    <?php include('components/hero.php'); ?>
    <?php include('components/list_cerita.php'); ?>
</main>
<script>
    (() => {
        'use strict';

        const welcomeAlert = document.querySelector('.alert-container'),
              alertContainer = document.querySelector('.alert-welcome');
        
        function setGreeting(text) {
            alertContainer.innerHTML = text;
        }

        window.addEventListener('load', () => {
            var hours = new Date().getHours();

            if (hours >= 0 && hours <= 5) {
                setGreeting("Selamat pagi sobat pecinta horror");
            } else if (hours > 5 && hours <= 10) {
                setGreeting("Selamat pagi menjelang siang sobat pecinta horror");
            } else if (hours > 10 && hours <= 14) {
                setGreeting("Selamat siang sobat pecinta horror");
            } else if (hours > 14 && hours <= 20) {
                setGreeting("Selamat sore sobat pecinta horror");
            } else if (hours > 20 && hours <= 23) {
                setGreeting("Selamat malam sobat pecinta horror");
            }

            setTimeout(() => {
                welcomeAlert.classList.add('show');

                setTimeout(() => {
                    welcomeAlert.classList.remove('show');
                }, 5000);
            }, 500);
        });
    })();
</script>
<?php include('components/footer.php'); ?>