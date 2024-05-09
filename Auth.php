<?php

// Menghubungkan ke file koneksi
require_once "koneksi.php";

// Mendefinisikan class Auth
class Auth extends Connection\Connect{

// Membuat fungsi login
public function login ($username, $password){

    $connection = $this->getConnection();

    // MYSQL Query untuk login
    $query = "SELECT * FROM user WHERE username = ? AND password = ?";
    $result = $connection->prepare($query);


    $result->execute([$username, $password]);
    if($result->fetch()){
        session_start();
       $_SESSION['login'] = true;
        header("Location: listBarang.php");
    }else{
        header("Location: formLogin.php?error=1");
        exit();
    };
   
    }
}
?>