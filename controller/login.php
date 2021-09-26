<?php

include_once "connection.php";

// mengaktifkan session php
session_start();
if (isset($_POST['login']) && ($_POST['login'] === 'login')) {

    $username = trim(strip_tags(htmlentities(addslashes(htmlspecialchars($_POST['username'])))));
    $password = trim(strip_tags(htmlentities(addslashes(htmlspecialchars($_POST['password'])))));
    // menyeleksi data admin dengan username dan password yang sesuai
    $data = mysqli_query($koneksi, "select * from admin where username='$username' and password='$password'");

    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $hak = mysqli_fetch_assoc($data);
        $_SESSION['hak'] = $hak['hak'];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['id'] = $hak['id'];
        $_SESSION['email'] = $hak['email'];
        $_SESSION['status'] = "login";
        if (isset($_POST['rememberme'])) {
            setcookie('id', $hak['username'], time() + 36000);
            setcookie('hak', $hak['hak'], time() + 36000);
            setcookie('key', hash('sha384', $hak['password']), time() + 36000);
        }
        header("location:../dashboard.php");
    } else {
        if (isset($_SESSION['auth'])) {
            //jika user gagal masuk selama 3 kali atau lebih
            if ($_SESSION['auth'] > 3 || $_SESSION['auth'] == 3) {
                //set nilai session "auth" ke 4
                $_SESSION['auth'] = 4;
                //jalankan function blokir_user
                header("location:index.php?pesan=blokir");
            }
            //jika tidak
            else {
                //session "auth" ditambah 1
                $_SESSION['auth'] = $_SESSION['auth'] + 1;
                if ($_SESSION['auth'] == 2) {

                    header("location:index.php?pesan=tersisa");
                } else if ($_SESSION['auth'] == 3) {
                    header("location:index.php?pesan=tersisa0");
                }
            }
        }
        //jika tidak ada session "auth"
        else {
            //daftarkan session "auth", dan beri nilai 1
            $_SESSION['auth'] = 1;
            //jalankan function login()
            header("location:index.php?pesan=tersisa2");
        }
    };
} else {
    header("location:index.php?pesan=belum_login");
}
