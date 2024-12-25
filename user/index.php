<?php
require_once('../config.php');
session_start();

if (!isset($_SESSION['id'])) {
    header("location: ".$web_url."login");
    exit;
} else {
    $query = $db->query("SELECT * FROM user WHERE id_user = '".$_SESSION['id']."' AND gmail_user = '".$_SESSION['mail']."'");
    $row = $query->fetch_assoc();

    $web_title = "Profile - HorrorStory";
    $web_desc = "HorrorStory - Ribuan cerita horror, mulai dari cerita fiksi hingga nyata";

    include('../components/head.php');

    if (isset($_POST['submit'])) {
        $username = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['nama'])));
        $usermail = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['email'])));
        $userpassold = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['password_lama'])));
        $userpassulang = htmlspecialchars(htmlentities(mysqli_real_escape_string($db, $_POST['password_ulang'])));

        $cek = $db->query("SELECT * FROM user WHERE password_user = md5('$userpassold')");
        $cek2 = $db->query("SELECT * FROM user WHERE username_user = '".$username."'");
        $cek3 = $db->query("SELECT * FROM user WHERE gmail_user = '".$usermail."'");

        $num = mysqli_num_rows($cek);
        $ambil = $cek->fetch_assoc();

        if ($userpassold !== "" && $userpassulang !== "") {
            if (md5($userpassold) === $ambil['password_user'] && $userpassold === $userpassulang) {
                if ($username !== "" && $usermail !== "") {
                    if ($username !== $_SESSION['name'] && $usermail === $_SESSION['mail']) { // Jika user hanya mengupdate namanya
                        $cek = $db->query("SELECT * FROM user WHERE username_user = '".$username."'");
                        if (mysqli_num_rows($cek)<1) {
                            $update = $db->query("UPDATE user SET username_user = '".$username."' WHERE id_user = '".$ambil['id_user']."' ");
                            $update2 = $db->query("UPDATE cerita SET pencipta_cerita = '".$username."' WHERE pencipta_cerita = '".$_SESSION['name']."'");
                            $update3 = $db->query("UPDATE komentar SET nama_komentar = '".$username."' WHERE nama_komentar = '".$_SESSION['name']."'");
                            $update4 = $db->query("UPDATE cerita_user SET pencipta_cu = '".$username."' WHERE pencipta_cu= '".$_SESSION['name']."'");
        
                            if ($update && $update2 && $update3 && $update4) {
                                echo "<script>window.alert('Update Berhasil! silahkan login kembali'); window.location.replace('".$web_url."actions/logout');</script>";
                            } else {
                                echo "<script>window.alert('Update gagal!')</script>";        
                            }
                        } else {
                            echo "<script>window.alert('Nama Sudah Digunakan!')</script>";
                        }
                            
                    } else if ($username === $_SESSION['name'] && $usermail !== $_SESSION['mail']) { // Jika user hanya mengupdate emailnya
                        $cek = $db->query("SELECT * FROM user WHERE gmail_user = '$usermail'");
                        if (mysqli_num_rows($cek)<1) {
                            $update = $db->query("UPDATE user SET gmail_user = '".$usermail."' WHERE id_user = '".$ambil['id_user']."' ");
                            $update2 = $db->query("UPDATE komentar SET user_mail = '".$usermail."' WHERE user_mail = '".$_SESSION['mail']."' ");
                            $update3 = $db->query("UPDATE like_history SET user_mail = '".$usermail."' WHERE user_mail = '".$_SESSION['mail']."' ");
        
                            if ($update && $update2 && $update3) {
                                echo "<script>window.alert('Update Berhasil! silahkan login kembali'); window.location.replace('".$web_url."actions/logout');</script>";
                            } else {
                                echo "<script>window.alert('Update gagal!')</script>";        
                            }
                        } else {
                            echo "<script>window.alert('Email Sudah Digunakan!')</script>";
                        }
                    } else if ($username !== $_SESSION['name'] && $usermail !== $_SESSION['mail']) { // Jika user ingin mengupdate nama dan emailnya
                        $cek = $db->query("SELECT * FROM user WHERE gmail_user = '$usermail' AND username_user = '".$username."'");
                        if (mysqli_num_rows($cek)<1) {
                            $update = $db->query("UPDATE user SET username_user = '".$username."', gmail_user = '".$usermail."' WHERE id_user = '".$ambil['id_user']."' ");
                            $update2 = $db->query("UPDATE cerita SET pencipta_cerita = '".$username."' WHERE pencipta_cerita = '".$_SESSION['name']."'");
                            $update3 = $db->query("UPDATE komentar SET nama_komentar = '".$username."', user_mail = '".$usermail."' WHERE nama_komentar = '".$_SESSION['name']."'");
                            $update4 = $db->query("UPDATE cerita_user SET pencipta_cu = '".$username."' WHERE pencipta_cu= '".$_SESSION['name']."'");
                            $update5 = $db->query("UPDATE like_history SET user_mail = '".$usermail."' WHERE user_mail = '".$_SESSION['mail']."' ");

                            if ($update && $update2 && $update3 && $update4 && $update5) {
                                echo "<script>window.alert('Update Berhasil! silahkan login kembali'); window.location.replace('".$web_url."actions/logout');</script>";
                            } else {
                                echo "<script>window.alert('Update gagal!')</script>";        
                            }
                        } else {
                            echo "<script>window.alert('Email atau Nama Sudah Digunakan!')</script>";
                        }
                    }
                } else {
                    echo "<script>window.alert('Mohon isi nama dan email kamu')</script>";    
                }
            } else {
                echo "<script>window.alert('Password yang kamu masukkan tidak sesuai')</script>";    
            }
        } else {
            echo "<script>window.alert('Mohon verifikasi password kamu')</script>";
        }
    }
?>

<main class="wrapper">
    <?php include('../components/navbar.php'); ?>
    <section class="container content">
            <section class="profile-body-container">
                <div class="profile-body-container-left">
                    <img src="https://cdn.statically.io/avatar/shape=circle/<?= $row["username_user"]; ?>" alt="<?= $row["username_user"]; ?>" class="icon">
                    <div class="profile-user">
                        <p>Profil</p>
                        <h1 style="margin-bottom: 1rem; line-height: .5;"><?= $row['username_user']; ?></h1>
                        <p><?= $row['gmail_user']; ?></p>
                    </div>
                </div>
                <div class="profile-body-container-right">
                    <h2>Setting</h2>
                    <form action="" method="post">
                        <section class="input-group">
                            <label for="nama">Nama kamu</label>
                            <input type="text" autocomplete="off" id="nama" name="nama" placeholder="Nama kamu" value="<?= $row['username_user']; ?>" />
                        </section>
                        <section class="input-group">
                            <label for="email">Email address</label>
                            <input type="email" autocomplete="off" id="email" name="email" placeholder="Email address" value="<?= $row['gmail_user']; ?>" />
                        </section>
                        <section class="input-group">
                            <label for="passlama">Verifikasi Password</label>
                            <input type="password" autocomplete="off" id="passlama" name="password_lama" placeholder="Password lama" />
                            <input type="password" autocomplete="off" id="passulang" name="password_ulang" placeholder="Ulangi password" />
                        </section>
                        <button type="submit" class="btn-submit" name="submit">Update</button>
                    </form>
                </div>
            </section>
    </section>
</main>

<?php
    include('../components/footer.php');
}
?>