<section class="music-player" data-music="1">
    <section class="music-container">
        <section class="music-option">
            <button class="music-play-back"><i class="fas fa-step-backward"></i></button>
            <button class="music-play" data-num='1'><i class="fas fa-play"></i></button>
            <button class="music-play-forwards"><i class="fas fa-step-forward"></i></button>
        </section>
        <p class="music-icon"><i class="far fa-spin fa-compact-disc"></i></p>
    </section>
</section>

<nav class="navbar">
    <section class="container">
        <section class="container-left">
            <img src="<?= $web_url; ?>assets/img/horrorstory.svg" alt="HorrorStory Logo" srcset="<?= $web_url; ?>assets/img/horrorstory.svg" class="navbar-logo" />
        </section>
        <section class="container-right">
            <button class="navbar-toggle">
                <span class="icon"></span>
                <span class="icon"></span>
                <span class="icon"></span>
            </button>
            <section class="navbar-menu">
                <ul>
                    <div>
                        <li class="navbar-menu-close">&times;</li>
                        <li><a href="<?= $web_url; ?>">Home</a></li>
                        <li><a href="<?= $web_url; ?>tentang">Tentang</a></li>
                        <li><a href="<?= $web_url; ?>donasi">Donasi</a></li>
                        <li><input type="search" placeholder="Cari judul / pencipta cerita" class="navbar-input"></li>
                    </div>
                    <div class="navbar-menu-right">
                        <?php if (isset($_SESSION['id'])) { ?>
                            <li class="navbar-menu-user"><a href="<?= $web_url; ?>user/" class="navbar-profile"><img src="https://cdn.statically.io/avatar/shape=circle/<?= htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_SESSION['name']))); ?>" alt="<?=$_SESSION['name']; ?>" class="profile-small"> &nbsp; <?= htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_SESSION['name']))); ?></a></li>
                            <li><a href="<?= $web_url; ?>cerita/ceritaku">Ceritaku</a></li>
                            <li><a href="<?= $web_url; ?>cerita/buat">Buat Cerita</a></li>
                            <li><a href="<?= $web_url; ?>actions/logout">Logout</a></li>
                        <?php } else { ?>
                            <li><a href="<?= $web_url; ?>registrasi">Register</a></li>
                            <li><a href="<?= $web_url; ?>login">Login</a></li>
                        <?php } ?>
                    </div>
                </ul>
            </section>
        </section>
    </section>
</nav>