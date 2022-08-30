<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Login - MAJETSCO </title>
  <link rel="stylesheet" href="login_style.css">
</head>
<body>
<div class='brand'>
  <a href='https://www.jamiecoulter.co.uk' target='_blank'>
    <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/logo.png'>
  </a>
</div>
<div class='login'>
  <div class='login_title'>
    <span>Login to your account</span>
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
          <a href='#'>Forgotten password?</a>
        </div>
      </div>
    </form>
  </div>
<script src="login.js"></script>
</body>
</html>
