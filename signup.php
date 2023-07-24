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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
<div class='login'>
  <div class='login_title'>
    <!-- <p><img src="images/majetsco-logo.png" alt="logo"></p> -->
    <img src="images/ez-jeepney-logo-text.png" alt=""><br>
    <i class="fa-solid fa-user-tie fa-xs"></i> <br><span>Cooperative Signup</span>
    <span ><h5 style="text-align: center;">Please enter your cooperative details.</h5></span>
  </div>
  <div class='login_fields'>
    <form action="signup.inc.php" method="POST">
      <div class='login_fields__user'>
        <div class='icon' style="color: whitesmoke">
            <i class="fa-solid fa-building"></i>
        </div>
        <input name="cooperative" placeholder='Cooperative Name' type='text' autocomplete="off">
      </div>
      <div class='login_fields__user'>
        <div class='icon' style="color: whitesmoke">
          <i class="fa-solid fa-envelope"></i>
        </div>
        <input name="email" placeholder='Email Address' type='text' autocomplete="off">
      </div>
      <div class='login_fields__user'>
        <div class='icon' style="color: whitesmoke">
            <i class="fa-solid fa-user"></i>
        </div>
        <input name="username" placeholder='Username' type='text' autocomplete="off">
      </div>
      <div class='login_fields__password'>
        <div class='icon' style="color: whitesmoke">
            <i class="fa-solid fa-lock"></i>
        </div>
        <input name="password" placeholder='Password' type='password'>
      </div>
      <div class='login_fields__submit'>
        <input type='submit' name="submit" value='SIGN UP'>
        <div class='forgot'>
          <!-- <a href='#'>Forgotten password?</a> -->
        </div>
      </div>
    </form>
  </div>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</body>
</html>
