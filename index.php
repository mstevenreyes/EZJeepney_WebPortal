<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - MAJETSCO</title>
  <link rel="stylesheet" href="css/login_style.css">
</head>
<body>
<div class='login'>
  <div class='login_fields'>
      <div class='login_fields__submit index' >
        <div>
          <h3>Welcome, Select Login</h3>
        </div>
        <div style="width: 200px;position:relative;left:30px;">
        <form action="emp_login.php" method="POST">
          <input type='submit' name="submit" value='Employee'>
        </form>
        </div>
        <div style="width: 300px;position:relative;left:30px;">
        <form action="admin_login.php" method="POST">
          <input type='submit' name="submit" value='Admin'>
        </form>
        </div>
      </div>
  </div>
<script src="login.js"></script>
</body>
</html>
