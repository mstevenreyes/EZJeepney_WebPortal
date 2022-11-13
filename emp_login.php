<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Login - MAJETSCO </title>
  <link rel="stylesheet" href="css/login_style.css">
  <script src="https://kit.fontawesome.com/a398ec554b.js" crossorigin="anonymous"></script>
</head>
<body>
<div class='login'>
  <div class='login_title'>
  <img src="images/ez-jeepney-logo-text.png" alt=""><br>
  <i class="fa-solid fa-user"></i><br><span>Employee Login</span>
  </div>
  <div class='login_fields'>
    <form action="emp_login.inc.php" method="POST">
      <div class='login_fields__user'>
        <div class='icon'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'>
        </div>
        <input name="username" placeholder='Username' type='text'>
      </div>
      <div class='login_fields__password'>
        <div class='icon'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
        </div>
        <input name="password" placeholder='Password' type='password'>
      </div>
      <div class='login_fields__submit'>
        <input type='submit' name="submit" value='Log In'>
        <div class='forgot'>
          <!-- <a href='#'>Forgotten password?</a> -->
        </div>
      </div>
    </form>
  </div>
<script src="login.js"></script>
</body>
</html>
