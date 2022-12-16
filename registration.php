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
<body>
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
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
            exit();
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
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
          //header("Location: dashboard.php");
          echo  "<div class='form'>
          <h3>You are LOGIN successfully.</h3><br/>
          <p class='link'>Click here to <a href='login.php'>Login</a></p>
          </div>";
           exit();
      } else {
          echo "<div class='form'>
                <h3>Incorrect Email/password.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
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
          <a href="#">Forgot your password?</a>
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
              To keep connected with us please login with your personal info
            </p>
            <button class="ghost" id="signIn" style="color: rgb(255, 255, 255)">
              Sign In
            </button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
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