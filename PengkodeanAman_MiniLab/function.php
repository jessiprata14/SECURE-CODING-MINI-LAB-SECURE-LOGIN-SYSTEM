<?php
session_start();

//Koneksi
$koneksi = mysqli_connect('localhost','root','','PengkodeanAman_MiniLab');

//Daftar
if(isset($_POST['register'])){
    //Jika tombol register diklik
    //========== RECAPTCHA ==========
    $secret_key = "6LcMx3YsAAAAACxRr_rfUjv-M6qTWiYZPpDqXFDE";

    if(!isset($_POST['g-recaptcha-response'])){
        echo "<script>alert('Captcha belum dicentang'); window.location.href='index.php';</script>";
        exit;
    }

    $response = $_POST['g-recaptcha-response'];

    $verify = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response"
    );

    $responseData = json_decode($verify);

    if(!$responseData->success){
        echo "<script>alert('Verifikasi captcha gagal'); window.location.href='index.php';</script>";
        exit;
    }
    // ================== END RECAPTCHA ==================

    $username = $_POST['username'];
    $password = $_POST['password']; //Murni inputan user, belum dienkripsi

    //Fungsi Enkripsi
    $epassword = password_hash($password, PASSWORD_DEFAULT);

    //Insert to db
    $insert = mysqli_query($koneksi,"INSERT INTO user (username,password) values ('$username','$epassword')");

    if($insert){
        //Jika berhasil
        header('location:index.php'); //Redirect ke halaman login
    }else{
        //Jika gagal

        echo '
        <script>
            alert("Registrasi gagal");
            window.location.href="register.php";
        </script>
        ';
    }

}

//Login
if(isset($_POST['login'])){
    //Jika tombol login diklik

        // ================== RATE LIMITING ==================
        $max_attempts = 5;
        $lock_duration = 300; // 5 menit

        if(!isset($_SESSION['login_attempts'])){
            $_SESSION['login_attempts'] = 0;
            $_SESSION['lock_time'] = 0;
        }

        if(time() < $_SESSION['lock_time']){
            $remaining = $_SESSION['lock_time'] - time();
            echo "<script>alert('Terlalu banyak percobaan login. Coba lagi dalam $remaining detik.');window.location.href='index.php';</script>";
            exit;
        }
        // ====================================================

    //========== RECAPTCHA ==========
    $secret_key = "6LcMx3YsAAAAACxRr_rfUjv-M6qTWiYZPpDqXFDE";

    if(!isset($_POST['g-recaptcha-response'])){
        echo "<script>alert('Captcha belum dicentang'); window.location.href='index.php';</script>";
        exit;
    }

    $response = $_POST['g-recaptcha-response'];

    $verify = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response"
    );

    $responseData = json_decode($verify);

    if(!$responseData->success){
        echo "<script>alert('Verifikasi captcha gagal'); window.location.href='index.php';</script>";
        exit;
    }
    // ================== END RECAPTCHA ==================

    $username = $_POST['username'];
    $password = $_POST['password']; //Murni inputan user, belum dienkripsi

    //Check to db
    $cekdb = mysqli_query($koneksi,"SELECT * FROM user where username='$username'");
    $hitung = mysqli_num_rows($cekdb);
    $pw = mysqli_fetch_array($cekdb);
    $passwordsekarang = $pw['password'];

    if($hitung>0){
        //Jika ada
        //Verifikasi password
        if(password_verify($password,$passwordsekarang)){
            //Jika password benar
            // Reset jika berhasil
            $_SESSION['login_attempts'] = 0;
            $_SESSION['lock_time'] = 0;

            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;

            header('location:home.php'); //Redirect ke halaman home
        }else{
            //JIka password salah
            $_SESSION['login_attempts']++;

            if($_SESSION['login_attempts'] >= $max_attempts){
                $_SESSION['lock_time'] = time() + $lock_duration;
                $_SESSION['login_attempts'] = 0;

                echo "<script>alert('Terlalu banyak percobaan! Akun dikunci 5 menit.');window.location.href='index.php';</script>";
            }else{
                echo "<script>alert('Password salah');window.location.href='index.php';</script>";
            }
            exit;
        }
    }else{
        //Jika gagal
        $_SESSION['login_attempts']++;
        
        echo '
        <script>
            alert("Login gagal");
            window.location.href="register.php";
        </script>
        ';
    }
}
?>