<?php
include('../includes/connect.php');
//include_once './functions/common_function.php';

//include('../includes/connect.php');
include('../functions/common_function.php');

@session_start();


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
        overflow-x:hidden;
      }
      
        
      
       
    
      
  </style>
</head>
<body >
    
<div class="container-fluid ">
  <h2 class="text-center mt-5">LOGIN </h2>
  <div class="row d-flex align-items-center justify-content-center  ">
    <div class="col-lg-12 col-xl-6" id="registration-form">
      <form action="" method="post" enctype="multipart/form-data">


        <div class="form-outline mb-4" >
          <!-- username feild -->
          <label for="user_username" class="form-label">Username</label>
          <input type="text" id="user_username" class="form-control" placeholder="enter your username" autocomplete="off" required="required" name="user_username">
        </div>

        

        <div class="form-outline mb-4">
          <!-- email feild -->
          <label for="user_password" class="form-label">password</label>
          <input type="password" id="user_password" class="form-control" placeholder="enter your password" autocomplete="off" required="required" name="user_password">
        </div>

        
        <div class="mt-4 pt-2">
          <input type="submit" value="Login" class="bg-secondary py-2 px-3 border-1" name="user_login">
          <p class="small fw-bold mt-2 pt-1 mb-0">Dont have an account<a href="user_registration.php" class="text-danger"> Register </a></p>
        </div>


      </form>
    </div>
  </div>
</div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php






if(isset($_POST['user_login'])){
  $user_username = $_POST['user_username'];
  $user_password = $_POST['user_password'];
  
  $select_query="Select * from `user_table` where username='$user_username'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc( $result);
  $user_ip=getIPAddress();

  //cart item
  $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);





  if($row_count > 0){
    $_SESSION['username']=$user_username;
     if(password_verify($user_password, $row_data['user_password'])){
      //echo "<script>alert('Login successful')</script>";
      if(  $row_count_cart==0 and   $row_count==1){
        $_SESSION['username']=$user_username;
        echo "<script>alert('Logged in successful')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
      }else{
        $_SESSION['username']=$user_username;
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
      }

     }else{
      echo "<script>alert('invalid credentials')</script>";
     }

  }else{
    echo "<script>alert('invalid credentials')</script>";
  }
}


?>