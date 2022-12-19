<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="logIn.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body style="background-image: url('https://wallpaper.dog/large/20498591.jpg'); background-size: cover;">
  <?php
    require('db.php');
    if (isset($_REQUEST['FirstName'])) {
        $FirstName = stripslashes($_REQUEST['FirstName']);
        $FirstName = mysqli_real_escape_string($con, $FirstName);
        $LastName = stripslashes($_REQUEST['LastName']);
        $LastName = mysqli_real_escape_string($con, $LastName);
        $Email    = stripslashes($_REQUEST['Email']);
        $Email    = mysqli_real_escape_string($con, $Email);
        $Password = stripslashes($_REQUEST['Password']);
        $Password = mysqli_real_escape_string($con, $Password);
        $query    = "INSERT into `users` (FirstName, LastName, Email, Password)
                     VALUES ('$FirstName', '$LastName', '$Email', '" . $Password . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            system("firstmain.html");
            exit();
        } else {
            echo "<div class='form style='background-color: #00000086; border: 1px solid black''>
            <h3 style='background-color:red;width:500px; text-align:center; font-size:30px; color: white'>Required fields are missing.</h3><br/>
            <p class='link' style='width:500px; text-align:center; font-size:30px; color: Black'>Click here to <a href='registration.php' style='background-color: blue; font-size:30px; color: white; border-radius:10%'>Registration</a> again.</p>
                  </div>";
        }
    } 
    if (isset($_POST['Email'])) {
      $Email = stripslashes($_REQUEST['Email']);
      $Email = mysqli_real_escape_string($con, $Email);
      $Password = stripslashes($_REQUEST['Password']);
      $Password = mysqli_real_escape_string($con, $Password);
      $query    = "SELECT * FROM `users` WHERE Email='$Email'
                   AND Password='" . $Password . "'";
      $result = mysqli_query($con, $query) or die("Error: counln't connect".mysqli_connect_error());
      $rows = mysqli_num_rows($result);
      if ($rows == 1) {
          $_SESSION['Email'] = $Email;
          system("firstmain.html");
           exit();
      } else {
          echo "<div class='form' style='background-color: #00000086; border: 1px solid black'>
                <h3 style='background-color:red;width:500px; text-align:center; font-size:30px; color: white'>Incorrect Email/password.</h3><br/>
                <p class='link' style='width:500px; text-align:center; font-size:30px; color: Black'>Click here to <a href='registration.php' style='background-color: blue; font-size:30px; color: white; border-radius:10%'>Login</a> again.</p>
                </div>";
      }
  }
    else {
?>
<div class="container" id="container">
      <div class="form-container sign-up-container">
        <form action="#" method="post">
          <h1>Create Account</h1>
          <input type="text" placeholder="FirstName" name="FirstName" />
          <input type="text" placeholder="LastName" name="LastName" />
          <input type="email" placeholder="Email" name="Email" />
          <input type="password" placeholder="Password" name="Password" />
          <button>
            Sign Up
          </button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form action="#" method="post">
          <h1>Sign in</h1>
          <input type="email" placeholder="Email" name="Email" />
          <input type="password" placeholder="Password" name="Password" />
          <button>
            Sign In
          </button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>
            Enter data to travel around the world of Genshin!
            </p>
            <button class="ghost" id="signIn" style="color: rgb(255, 255, 255)">
              Sign In
            </button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Welcome to the world of Genshin Impact</p>
            <button class="ghost" id="signUp" style="color: rgb(255, 255, 255)">
              Sign Up
            </button>
          </div>
        </div>
      </div>
    </div>
    <script src="LogIn.js"></script>
<?php
    }
?>
</body>
</html>