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
          <label for="admin_name" class="form-label">admin name</label>
          <input type="text" id="admin_name" class="form-control" placeholder="enter your username" autocomplete="off" required="required" name="admin_name">
        </div>

        

        <div class="form-outline mb-4">
          <!-- email feild -->
          <label for="admin_password" class="form-label">password</label>
          <input type="password" id="admin_password" class="form-control" placeholder="enter your password" autocomplete="off" required="required" name="admin_password">
        </div>

        
        <div class="mt-4 pt-2">
          <input type="submit" value="Login" class="bg-secondary py-2 px-3 border-1" name="admin_login">
          <p class="small fw-bold mt-2 pt-1 mb-0">Dont have an account<a href="admin_registration.php" class="text-danger"> Register </a></p>
        </div>


      </form>
    </div>
  </div>
</div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php






if(isset($_POST['admin_login'])){
  $admin_name = $_POST['admin_name'];
  $admin_password = $_POST['admin_password'];
  
  $select_query="Select * from `admin_table` where admin_name='$admin_name'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc( $result);
  

  //cart item
 


  
    $_SESSION['admin_name']=$admin_name;
     if(password_verify($admin_password, $row_data['admin_password'])){
      //echo "<script>alert('Login successful')</script>";
      
        $_SESSION['admin_name']=$admin_name;
        echo "<script>alert('Logged in successfully')</script>";
        echo "<script>window.open('index1.php','_self')</script>";
      }
    }
    


?>