<?php
require_once('config.php');
session_start();

$web_title = 'Login - HorrorStory';
$web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";

if (isset($_GET['source'])) {
    $id = base64_decode($_GET['source']);
    if ($id < 0) {
        header('location: '.$web_url);
        exit;
    } else if (!is_numeric($id)) {
        header('location: '.$web_url);
        exit;
    }
}


if (isset($_SESSION['id'])) {
    header('location: '.$web_url);
    exit;
} else {
    include('components/head.php');
    // patc bug csrf
    if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }
    
    if (isset($_POST['submit'])) {
        if ($_SESSION['token'] == $_POST['token']) {
            unset($_SESSION['token']);
            $usrmail = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['usermail'])));
            $usrpass = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['userpass'])));

            $query = $db->query("SELECT * FROM user WHERE gmail_user = '$usrmail' AND password_user = md5('$usrpass')");
            $row = $query->fetch_assoc();

            if (mysqli_num_rows($query) > 0) {
                $_SESSION['id'] = $row['id_user'];
                $_SESSION['name'] = $row['username_user'];
                $_SESSION['mail'] = $row['gmail_user'];

                if (isset($_GET['source'])) {
                    header("location: ".$web_url."cerita/?cerita_id=".$_GET['source']);
                    exit;
                } else {
                    header('location: '.$web_url);
                    exit;
                }
            } else {
                echo "<script>window.alert('user tidak ditemukan'); window.location.replace('".$web_url."login');</script>";
                exit;
            }
        }
    }
?>

    <main class="wrapper">
        <?php include('components/navbar.php'); ?>
        <img src="<?= $web_url; ?>assets/img/background/login-background.jpg" srcset="<?= $web_url; ?>assets/img/background/login-background.jpg" class="form-background" alt="Login Background"/>
        <section class="form">
            <form class="container" method="post">
                <img src="<?= $web_url; ?>assets/img/horrorstory.svg" alt="HorrorStory Logo" srcset="<?= $web_url; ?>assets/img/horrorstory.svg" class="form-logo" />
                <h2>Login</h2>
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                <section class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="usermail" autofocus autocomplete="off" id="email" placeholder="Email address" class="form-input" />
                </section>
                <section class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="userpass" autocomplete="off" id="pass" placeholder="Password" class="form-input" />
                </section>
                <p>Lupa password? <a href="">klik disini</a></p>
                <button type="submit" class="form-submit" name="submit">Login</button>
                <p>Belum punya akun? <a href="<?= $web_url; ?>registrasi">registrasi disini</a></p>
            </form>
        </section>
    </main>

    <script src="<?= $web_url; ?>assets/js/main.js"></script>
</body>
</html>
<?php
}
?>