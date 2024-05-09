<?php 

    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $data_user = [
        'username' => 'admin',
        'password' => 'abd7372bba55577590736ef6cb3533c6'
    ]; 

    //Kalau username dan passwordnya benar
    if(($username == $data_user['username']) && (md5($password) == $data_user['password'])){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $data_user;
        header("location: listBarang.php");
    }else{
        session_start();
        session_destroy();
        header("location: formLogin.php");
    }



?>