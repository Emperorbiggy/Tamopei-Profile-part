<?php
session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../../index.php");
        die();
    }

    include '../../config.php';
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
    $fetch = mysqli_fetch_assoc($query);
}
if(isset($_POST['update_profile'])){

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
 
    mysqli_query($conn, "UPDATE `users` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');
 
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
 
    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
       if($update_pass != $old_pass){
          $message[] = 'old password not matched!';
       }elseif($new_pass != $confirm_pass){
          $message[] = 'confirm password not matched!';
       }else{
          mysqli_query($conn, "UPDATE `users` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
          $message[] = 'password updated successfully!';
       }
    }
 
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/'.$update_image;
 
    if(!empty($update_image)){
       if($update_image_size > 2000000){
          $message[] = 'image is too large';
       }else{
          $image_update_query = mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
          if($image_update_query){
             move_uploaded_file($update_image_tmp_name, $update_image_folder);
          }
          $message[] = 'image updated succssfully!';
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="fontsawesome/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="color.css">
    <link rel="stylesheet" href="./style/style.css">

    <link rel="stylesheet" href="./style/sendmoney.css">
    
    
    
    <title>Tamopie Home</title>
</head>

<body>
    <div class="container">
        <aside class="">
            <div class="top">
                <div class="logo">

                    <h2><a href="">
                            <img src="./img/colorLogo.png" alt="">
                        </a></h2>
                </div>
            </div>

            <div class="sidebar">
                <a href="" class="active">
                    <span class="b material-icons-sharp">
                        grid_view
                    </span>
                    <h3 class="b">Dashboard</h3>
                </a>
                <a href=""><span class="b material-icons-sharp">
                        account_balance
                    </span>
                    <h3 class="b">Banks</h3>
                    </span>
                </a>
                <a href=""><span class="b material-icons-sharp">
                        add
                    </span>
                    <h3 class="b">Orders</h3>
                    </span>
                </a>
                <a href=""><span class="b material-icons-sharp">
                        notifications_none
                    </span>
                    <h3 class="b">Notifications</h3>
                    <div class="circle">
                        <h3 class="white">23</h3>
                    </div>
                    </span>
                </a>
                <a href=""><span class="b material-icons-sharp">
                        history
                    </span>
                    <h3 class="b">History</h3>
                    </span>
                </a>
                <a href=""><span class="b material-icons-sharp">
                        tune
                    </span>
                    <h3 class="b">Settings</h3>
                    </span>
                </a>
                <a href="../../logout.php"><span class="b material-icons-sharp">
                        power_settings_new
                    </span>
                    <h3 class="b">Log out</h3>
                    </span>
                </a>
            </div>
        </aside>
        <main>
        <div class="table-section-o">
    <table>
      <thead>
        <tr>
          <th onclick="toggleTable(0)"><i class="fa-regular fa-user"></i><span>Profile</span></th>
          <th onclick="toggleTable(01)"><i class="fa-solid fa fa-bank"></i><span>Banks</span></th>
          <th onclick="toggleTable(1)"><i class="fa-solid fa fa-file"></i><span>KYC Verification</span></th>
          <th onclick="toggleTable(2)"><i class="fa-solid fa-exchange"></i></i><span>Referral</span></th>
          <th onclick="toggleTable(3)"><i class="fa-solid fa-level-up"></i></i><span>Level</span></th>
        </tr>
      </thead>
      <td show colspan="5" class="table-content">
              <div class="table-info">
              
              <form action="" method="post" enctype="">
    <label for="username" class="label">Full Name:</label>
    <input type="text" name="update_name" class="box" value="<?php echo $fetch['name']; ?>"readonly><br><br>
    <label for="username" class="label">UserName:</label>
    <input type="text" id="username" name="username" class="box" value="<?php echo $fetch['username']; ?>"readonly><br><br>
    <label for="username" class="label">Email:</label>
    <input type="email" id="email" name="email" class="box" value="<?php echo $fetch['email']; ?>"readonly><br><br>
    <label for="username" class="label">Phone Number:</label>
    <input type="tel" id="phone" name="phone" class="box" value="<?php echo $fetch['phone']; ?>"readonly><br><br>
    <label for="username" class="label">Country:</label>
    <input type="text" id="countryId" name="country" class="countries form-control; box" value="<?php echo $fetch['country']; ?>"readonly><br><br>
    <!--<label for="username" class="label">Upload Picture:</label>
    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box"><br></br>--->
    <div class="inputBox">
    
            
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <label>old password :</label>
            <input type="password" name="update_pass" placeholder="Enter Your Previous Password" class="box"><br></br>
            <label class="label">New Password :</label>
            <input type="password" name="new_pass" placeholder="Create A new password" class="box"><br></br>
            <label class="label">Confirm Password :</label>
            <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box"><br></br>
         </div>

         <input type="submit" value="Submit" name="update_profile" class="btn">
</form>
<td show colspan="5" class="table-content">
              <div class="table-info">
              <form method="POST" action="submit_bank_details.php">
  <label for="bank_name">Bank Name:</label>
  <input type="text" id="bank_name" name="bank_name" class="box" value=""><br>

  <label for="account_number">Account Number:</label>
  <input type="text" id="account_number" name="account_number" class="box" value=""><br>

  <label for="account_name">Account Name:</label>
  <input type="text" id="account_name" name="account_name" class="box" value=""><br>

  <input type="submit" value="Submit" class="btn">
</form>
<td show colspan="5" class="table-content">
              <div class="table-info">
                
              <form action="kyc_verification.php" enctype="multipart/form-data" class="kyc_form" >
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" class="box" value="<?php echo $fetch['name']; ?>" required readonly><br></br>
		
		<label for="address">Address:</label>
		<input type="text" id="address" name="address" class="box" value=" <?php echo $fetch['address']; ?>" required readonly><br></br>
		
		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob" class="box" required><br></br>

		<label for="id_type">ID Card Type:</label>
		<select id="id_type" name="id_type" class="box" required><br></br>
			<option value="">Select ID Card Type</option>
			<option value="Driving License">Driving License</option>
			<option value="Passport">Passport</option>
			<option value="National ID Card">National ID Card</option>
		</select><br></br>

		<label for="front_image">ID Card Front:</label>
		<input type="file" class="box" id="front_image" name="front_image" accept=".png, .jpg, .jpeg" required><br></br>

		<label for="back_image">ID Card Back:</label>
		<input type="file" class="box" id="back_image" name="back_image" accept=".png, .jpg, .jpeg" required><br></br>

		<button type="submit" class="btn" name="kyc_verification">Submit</button>
	</form>
        </div>
        <td show colspan="5" class="table-content">
              <div class="table-info">
</div>
<td show colspan="5" class="table-content">
              <div class="table-info">


      </div>
      <td show colspan="5" class="table-content">
              <div class="table-info">
      <h2>Referral Link</h2>
    <p><?php echo $referral_link; ?></p>
</div>
        </main>
        </div>













      
      
<!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 15349164;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/15349164/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->

          <script src="./forms.js"></script>
    <script src="./userSettings.js"></script>
    <script src="./script.js"></script>
        
</body>

</html>