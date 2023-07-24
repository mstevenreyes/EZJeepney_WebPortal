<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - EZ JEEPNEY</title>
  <link rel="stylesheet" href="css/login_style.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
  <script src="https://kit.fontawesome.com/a398ec554b.js" crossorigin="anonymous"></script>
</head>
<body>
<div class='login'>
  <div class='login_title'>
    <!-- <p><img src="images/majetsco-logo.png" alt="logo"></p> -->
    <img src="images/ez-jeepney-logo-text.png" alt=""><br>
    <i class="fa-solid fa-user-tie fa-xs"></i> <br><span>Dispatcher Login</span>
  </div>
  <div class='login_fields'>
    <form action="admin_login.inc.php" method="POST">
      <div class='login_fields__user'>
        <div class='icon'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'>
        </div>
        <input name="username" placeholder='Username' type='text' value="superadmin" autocomplete="off">
      </div>
      <div class='login_fields__password'>
        <div class='icon'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
        </div>
        <input name="password" placeholder='Password' value="superadmin123" type='password'>
      </div>
      <div class='login_fields__submit'>
        <input type='submit' name="submit" value='Log In'>
        <a href="signup.php"><button class="btn btn-danger my-0" type="button">Sign up</button></a>
        <div class='forgot'>
          <!-- <a href='#'>Forgotten password?</a> -->
        </div>
      </div>
    </form>
  </div>
<script src="login.js"></script>
</body>
</html>
