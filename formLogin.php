<?php

// Membuat session
    session_start();

    //Jika tombol login ditekan
    if(isset($_POST['login'])){

      // Menghubungkan dengan file koneksi dan class login
    include_once "koneksi.php";
    include_once "auth.php";

    $auth = new Auth;

// Memindahkan variable
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $auth->login($username, $password);
}

// Pengkondisian jika password atau username salah
if (isset($_GET['error']) && $_GET['error'] == 1) {
    $error = $_GET["error"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="login-container">
    <!-- Form Login  -->
    <form action="" method="post">     
      <h2>Login</h2>
      <div class="input-group">
          <?php if(isset($error)): ?>
                <p style="color : red">Username / Password salah</p>
                <?php endif; ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <!-- Tombol untuk men-trigger fungsi login diatas -->
      <button name="login" type="submit">Login</button>
    </form>
  </div>
</body>
</html>
