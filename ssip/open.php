<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naranne</title>  
    <link rel="stylesheet" href="naranne.css">
    <script src ="naranne.js"></script>
</head>
<body>
<div class="header-container">
    <div class='header'>
    <div class="buttonlog">
        <button class="open-button" onclick = "openLogin()">Login</button>
        <a href="guest.php"><button type="submit" class="open-button" name = "guest">Guest</button></a>
    </div>

    <div class="popuplog" id="log">
    <form method="post" action="" class="form-container">
      <label for="username"><b>Username</b></label> 
      <input type="text" placeholder="Enter your username" name="username" required>
      <br>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter your password" name="password" required> 
      <br>

      <button type="submit" name="login">Login</button>
      <button type="button" onclick="closeLogin()">Cancel</button>
    </form>
    </div>
    <?php
    include("config.php");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    session_start();

    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $login = mysqli_query($db, "SELECT username, pwd FROM admin WHERE username = '$username' and pwd ='$password'");
        if(mysqli_num_rows($login)){
            $_SESSION['login_user'] = $username;
            header("Location: http://localhost/ssip/index.php");
        } else{
            ?>
            <div class = 'logfail'>
            <div class='form-container'><p>Wrong input! Try again</p>
            <form method="POST"> <button type="submit" class="closetablebutton" name="close">Close</button></form>
            </div> </div>
            <?php
        }
    }
    ?>
    </div>
</div>
</body>
</html>