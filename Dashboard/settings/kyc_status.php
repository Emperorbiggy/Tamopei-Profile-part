<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
}

// Include database connection
include '../../config.php';

// Retrieve KYC verification status
$user_id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT * FROM kyc_verification WHERE user_id = '$user_id'");
$kyc_status = mysqli_fetch_assoc($query);

// Check if KYC verification is pending
if ($kyc_status['status'] == 'pending') {
  echo "Your KYC verification is still pending.";
} else {
  // Display KYC verification form
?>
  <form action="submit_kyc_verification.php" enctype="multipart/form-data" >
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

		<button type="submit" class="btn" name="submit_kyc_verification">Submit</button>
  </form>
<?php
}
?>
