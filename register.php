<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: Dashboard/index.php");
        die();
    }

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    include 'config.php';
    $msg = "";

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
        $code = mysqli_real_escape_string($conn, md5(rand()));
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been used.</div>";
        } else {
            if ($password === $confirm_password) {
                
                $sql = "INSERT INTO `users`(address, username, phone, country, state, city, name, email, password, code) VALUES('$address', '$username', '$phone', '$country', '$state', '$city', '$name', '$email', '$password', '$code')" or die('query failed');
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<div style='display: none;'>";
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'mail.rifelinktech.com.ng';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'admin@rifelinktech.com.ng';                     //SMTP username
                        $mail->Password   = 'Oluwasemiloremi';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('Admin@tamopei.com');
                        $mail->addAddress($email);

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'no reply';
                        $mail->Body    = 'Here is the verification link <b><a href="http://localhost/total/?verification='.$code.'">http://localhost/total/?verification='.$code.'</a></b>';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
                    $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
            
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tamopei | Register</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/btn.css">
    <link rel="stylesheet" href="css/intlTelInput.css">
  
  <script src="js/countrystatecity.js?v2"></script>


</head>
<body>

   <div id="textbox">
  <p class="alignleft"><a href="">
                        <img src="./img/colorLogo.png" alt="">
                    </a></p>
  <p class="alignright-btn"> Already have an account? <span><a href="index.php"> Login now </a></span></p>
  <div style="clear: both;"></div>
</div>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>register now</h3>
                        <?php echo $msg; ?>
                        <input type="text" name="name" placeholder="Full Name" class="box" required>
      <input type="email" name="email" placeholder="Email" class="box" required>
      <input type="text" name="username" placeholder="Username" class="box" required>
      <input type="tel" name="phone" id="phone" Placeholder="Phone Number" required maxlength="15">
      <input type="text" name="address" placeholder="Address" class="box" required>
      <select name="country" class="countries form-control; box" id="countryId" required>
    <option value="">Select Country</option>
</select>
<select name="state" class="states form-control; box" id="stateId" required>
    <option value="">Select State</option>
</select>
<select name="city" class="cities form-control; box" id="cityId" required>
    <option value="">Select City</option>
</select>

      <!---<input type="password" name="password" placeholder="Password" class="box" id="password" required>----->
      <input type="password" name="password" placeholder="Password" class="box" autocomplete="current-password" id="password" required>
  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-confirm"></span>
  <input type="password" name="confirm-password" placeholder="Confirm password" class="box" autocomplete="current-password" id="password-field" required>
  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
  <input type="hidden" name="referral_id" value="<?php echo $referred_id ?>">
      <!--<input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">--->
      <button name="submit" class="btn" type="submit">Create Your Account</button>
      <!---<h4><a href="#">Forget Password?</a></h4>---->
   </form>

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
    <script>
   $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script>
   $(".toggle-confirm").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

<script src="js/intlTelInput.js"></script>
<script src="js/countrystatecity.js"></script>
    <script>
    // Vanilla Javascript
    var input = document.querySelector("#phone");
    window.intlTelInput(input,({
      // options here
    }));

    $(document).ready(function() {
        $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          $('#phone').val("");
          $('#phone').val("+"+countryCode+" "+ $('#phone').val());
       });
    });
  </script>

</body>

</html>