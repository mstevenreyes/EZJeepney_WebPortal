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
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
<div class='login'>
  <div class='login_title'>
    <!-- <p><img src="images/majetsco-logo.png" alt="logo"></p> -->
    <img src="images/ez-jeepney-logo-text.png" alt=""><br>
    <!-- <i class="fa-solid fa-user-tie fa-xs"></i>  -->          <i class="fa-solid fa-key fa-xs" style="color: grey;position:relative;top:3px"></i>

    <br><span>Security Check <br><h5>Please Enter the code in your Microsoft Authenticator App.</h5></span>
  </div>
  <div class='login_fields'>
    <form action="admin_login.inc.php" method="POST">
      <div class='login_fields__user'>
        <div class='icon'>
          <!-- <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'> -->
        </div>
        <input name="otp" id="otp" type='text' autocomplete="off">
      </div>
      <div class='login_fields__submit'>
        <button type='button' name="submit" id="otp-submit">Submit</button>
      </div>
      <div class="get-code-wrapper">
          <button type="button" id="get-code">How to get code?</button>
      </div>
    </form>
  </div>
</div>
<!-- FORM POPUP -->
  <div class="form-popup" id="view-present-driver">
    <div class="container form-wrapper add-report-container">
        <button class="btn close-button" id="close-form">Close</button>
          <div class="row">
            Step 1: Download Microsoft Authenticator in the App Store.
            <p><img src="images/otp-step-1.jpg" alt="otp-step-1" width="200px"></p>
          </div>
          <div class="row">
            Step 2: Open the app, and click add > Scan QR Code > Scan the QR.
            <p><img src="images/qr-code.png" alt="qr-code" width="200px"></p>
          </div>
        </div>
    </div>
            <!-- ============================================================= -->
  <!-- All Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" ></script> 
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- DATE RANGE PICKER JAVASCRIPT IMPORTS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- <script src="login.js"></script> -->
<script>
    $('#otp-submit').click(function(){
        var otpCode = $('#otp').val();
        console.log(otpCode);
        const settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://otp-authenticator.p.rapidapi.com/validate/",
        "method": "POST",
        "headers": {
            "content-type": "application/x-www-form-urlencoded",
            "X-RapidAPI-Key": "09619a2d81msh96b54ec94a455fep1066dfjsn65238a18984e",
            "X-RapidAPI-Host": "otp-authenticator.p.rapidapi.com"
        },
        "data": {
            "secret": "CD4PXLBMLXWGUT4X",
            "code": otpCode
        }
        };

        $.ajax(settings).done(function (response) {
            if(response == "True"){
                window.location.href = "admin/a_dashboard";
            }else{
                alert("Incorrect OTP code.");                
            }
        });
    });
    $(document).ready(function(){
      $('#get-code').click(function(){
        $('.form-popup').show();
      });
      $('.close-button').click(function(){
        $('.form-popup').hide();
      });
    });
</script>

</body>
</html>
