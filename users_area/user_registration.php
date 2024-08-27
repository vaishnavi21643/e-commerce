<?php
include('../includes/connect.php');
include('../functions/common_function.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="admin/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">

    
    <style>
      /* Apply the custom font to the text inside the .bg-light div */
      .bg-light {
        font-family: 'Caveat', Algerian;
        font-family: 'Whisper', Algerian;
      }

      body{
        background-color:#f7f4e6;
      }
      
      
  </style>
</head>
<body >
    
<div class="container-fluid ">
  <h2 class="text-center "><strong><i>New user registration </i></strong></h2>
  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4" >
          <!-- username feild -->
          <label for="user_username" class="form-label">Username</label>
          <input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off" required="required" name="user_username">
        </div>

        <div class="form-outline mb-4">
          <!-- email feild -->
          <label for="user_email" class="form-label">Email</label>
          <input type="text" id="user_email" class="form-control" placeholder="enter your email" autocomplete="off" required="required" name="user_email">
        </div>

        <!-- image -->
        <div class="form-outline mb-4">
          <label for="user_image" class="form-label">User image</label>
          <input type="file" id="user_image" class="form-control" placeholder="enter your image" autocomplete="off" required="required" name="user_image">
        </div>

        <div class="form-outline mb-4">
          <!-- email feild -->
          <label for="user_password" class="form-label">password</label>
          <input type="password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off" required="required" name="user_password">
        </div>

        <div class="form-outline mb-4">
          <!-- email feild -->
          <label for="conf_user_password" class="form-label">Confirm password</label>
          <input type="password" id="conf_user_password" class="form-control" placeholder="confirm password" autocomplete="off" required="required" name="conf_user_password">
        </div>

        <div class="form-outline mb-4" >
          <!-- username feild -->
          <label for="user_address" class="form-label">Address</label>
          <input type="text" id="user_address" class="form-control" placeholder="enter your address" autocomplete="off" required="required" name="user_address">
        </div>

        <div class="form-outline mb-4" >
          <!-- contact feild -->
          <label for="user_contact" class="form-label">Contact</label>
          <input type="text" id="user_contact" class="form-control" placeholder="enter your contact" autocomplete="off" required="required" name="user_contact">
        </div>

        <div class="mt-4 pt-2">
          <input type="submit" value="Register" class="bg-secondary py-2 px-3 border-1" name="user_register">

          <p class="small fw-bold mt-2 pt-1 mb-4">Already have an account ?<a href="user_login.php" class="text-danger"> Login </a></p>
        </div>


      </form>
    </div>
  </div>
</div>
<!-- <div>
  <img src="../images/cart.png" alt="" srcset="">
</div> -->






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<?php
if(isset($_POST['user_register'])){
$user_username=$_POST['user_username'];
$user_email=$_POST['user_email'];

$user_password=$_POST['user_password'];
$hash_password=password_hash($user_password,PASSWORD_DEFAULT);
$conf_user_password=$_POST['conf_user_password'];
$user_address=$_POST['user_address'];
$user_contact=$_POST['user_contact'];
$user_image=$_FILES['user_image']['name'];
$user_image_tmp=$_FILES['user_image']['tmp_name'];
$user_ip=getIPAddress();


//select 

$select_query = "SELECT * FROM `user_table` WHERE username=?";
$stmt_select = mysqli_prepare($con, $select_query);
mysqli_stmt_bind_param($stmt_select, "s", $user_username);
mysqli_stmt_execute($stmt_select);
$result_query = mysqli_stmt_get_result($stmt_select);
$rows_count = mysqli_num_rows($result_query);

if ($rows_count > 0) {
    echo "<script> alert('Username already exists') </script>";


mysqli_stmt_close($stmt_select);

}
else if($user_password!=$conf_user_password){
  echo "<script> alert('Password do not match') </script>";

}else{

  //insert query
move_uploaded_file($user_image_tmp,"./user_images/$user_image");

$insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $insert_query);

mysqli_stmt_bind_param($stmt, "sssssss", $user_username, $user_email, $hash_password, $user_image, $user_ip, $user_address, $user_contact);

if (mysqli_stmt_execute($stmt)) {
    echo "<script> alert('Data inserted successfully') </script>";
} else {
    die('Error: ' . mysqli_error($con));
}

mysqli_stmt_close($stmt);






}

//selecting cart items 

$select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
  $_SESSION['username']=$user_username;
  echo "<script> alert('you have items in your cart')</script>";
  echo "<script> window.open('checkout.php','_self')</script>";
}else{
  echo "<script> window.open('../index.php','_self')</script>";
}


}


?>