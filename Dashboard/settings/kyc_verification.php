<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // Redirect the user to the login page
  header("Location: ../../index.php");
  exit();
}

// Get the logged-in user's ID
$user_id = $_SESSION['user_id'];

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the KYC details from the form
  $name = $_POST['name'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];
  $id_type = $_POST['id_type'];

  // Get the file details
  $front_image = $_FILES['front_image']['name'];
  $back_image = $_FILES['back_image']['name'];
  $front_temp = $_FILES['front_image']['tmp_name'];
  $back_temp = $_FILES['back_image']['tmp_name'];
  $front_ext = pathinfo($front_image, PATHINFO_EXTENSION);
  $back_ext = pathinfo($back_image, PATHINFO_EXTENSION);

  // Generate a unique filename for the front image
  $front_filename = uniqid('front_', true) . '.' . $front_ext;

  // Generate a unique filename for the back image
  $back_filename = uniqid('back_', true) . '.' . $back_ext;

  // Set the file paths for the front and back images
  $front_path = 'uploads/kyc/front/' . $front_filename;
  $back_path = 'uploads/kyc/back/' . $back_filename;

  // Move the uploaded files to the uploads directory
  move_uploaded_file($front_temp, $front_path);
  move_uploaded_file($back_temp, $back_path);

  // Insert the KYC details into the database
  $query = "INSERT INTO kyc_verification (user_id, name, address, dob, id_type, front_image, back_image, status) VALUES ('$user_id', '$name', '$address', '$dob', '$id_type', '$front_path', '$back_path', 'pending')";

  if (mysqli_query($conn, $query)) {
    // KYC verification details submitted successfully
    echo "KYC verification details submitted successfully";
  } else {
    // There was an error submitting the KYC verification details
    echo "Error: " . mysqli_error($conn);
  }
}
?>
