<?php
require_once('config.php');
session_start();

$web_title = 'Registrasi - HorrorStory';
$web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";



if (isset($_SESSION['id'])) {
    header('location: '.$web_url);
    exit;
} else {
    include('components/head.php');
    // patc bug csrf
    if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    if (isset($_POST['submit']) && $_SESSION['token'] == $_POST['token']) {
        
        unset($_SESSION['token']);
        $username = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['usrname'])));
        $usermail = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['usrmail'])));
        $userpass = md5(htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['usrpass']))));
        
        $cek = $db->query("SELECT * FROM user WHERE username_user = '".$username."'");
        $cek2 = $db->query("SELECT * FROM user WHERE gmail_user = '".$usermail."'");
        
        if ($usermail !== "" && $userpass !== "" && $username !== "") {
            if (mysqli_num_rows($cek) < 1) {
                if (mysqli_num_rows($cek2) < 1) {
                    $query = $db->query("INSERT INTO user(username_user,gmail_user,password_user) VALUES('$username','$usermail','$userpass')");
                
                    if ($query) {
                        echo "<script>window.alert('Registrasi berhasil! silahkan login'); window.location.replace('".$web_url."login');</script>";
                    } else {
                        echo "<script>window.alert('Registrasi gagal! silahkan coba lagi')</script>";
                    }
                } else {
                    echo "<script>window.alert('Email sudah digunakan!')</script>";
                }

            } else {
                echo "<script>window.alert('Username sudah digunakan!')</script>";
            }
        } else {
            echo "<script>window.alert('Email dan password tidak boleh kosong!')</script>";
        }
        
    }

?>

<body>
    <main class="wrapper">
        <?php include('components/navbar.php'); ?>
        <img src="<?= $web_url; ?>assets/img/background/regist-background.jpg" srcset="<?= $web_url; ?>assets/img/background/regist-background.jpg" class="form-background" alt="Login Background"/>
        <form class="form" method="POST">
            <section class="container">
                <img src="<?= $web_url; ?>assets/img/horrorstory.svg" alt="HorrorStory Logo" srcset="<?= $web_url; ?>assets/img/horrorstory.svg" class="form-logo" />
                <h2>Registrasi</h2>
                <input type="hidden" name="token" value="<?=$_SESSION['token'];?>">
                <section class="form-group">
                    <label for="name">Nama kamu</label>
                    <input type="text" name="usrname" autofocus autocomplete="off" id="name" placeholder="Nama kamu" class="form-input" />
                </section>
                <section class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="usrmail" autocomplete="off" id="email" placeholder="Email address" class="form-input" />
                </section>
                <section class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="usrpass" autocomplete="off" id="pass" placeholder="Password" class="form-input" />
                </section>
                <button type="submit" class="form-submit" name="submit">Login</button>
                <p>Sudah punya akun? <a href="<?= $web_url; ?>login">login disini</a></p>
            </section>
        </form>
    </main>

    <script src="<?= $web_url; ?>assets/js/main.js"></script>
</body>
</html>
<?php
}
?>