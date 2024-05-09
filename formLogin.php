
<?php 
    session_start();
    // if (isset($_SESSION['login'])){
    //     header("location: listBarang.php");
    // }

    if(isset($_POST['login'])){
    include_once "koneksi.php";
    include_once "auth.php";

    $auth = new Auth;


    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $auth->login($username, $password);
}

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
<style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}

.login-container {
  max-width: 400px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  margin-bottom: 20px;
  text-align: center;
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
}

.input-group input {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

</style>
</head>
<body>
  <div class="login-container">
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
      <button name="login" type="submit">Login</button>
    </form>
  </div>
</body>
</html>
