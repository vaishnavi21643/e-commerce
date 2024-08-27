
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
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

    <link rel="stylesheet" href="../style.css">

    
    <style>
      /* Apply the custom font to the text inside the .bg-light div */
      .bg-light {
        font-family: 'Caveat', Algerian;
        font-family: 'Whisper', Algerian;
      }

      .profile_img{
        height:70%;
        width:70%;
        border-radius: 10px;
      }

      .edit_img{
           width:100px;
           height:100px;
           object-fit:contain:

       }
      
  </style>
</head>
<body style="background-color:#F3CCF3">
    


<div class="container-fluid p-0" >
    <nav class="navbar navbar-expand-lg 
    ">
        <div class="container-fluid">
          <img src="../images/logo1.jpeg" alt="" class="logo">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../display_all.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./users_area/user_registration.php">register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/ecommerce/contact.html">contacts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../cart.php">cart<i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/ecommerce/payment.html"><?php  total_cart_price();?></a>
              </li>


            </ul>

          
            
           
          </div>
        </div>
      </nav>
      

     




     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <ul class="navbar-nav me-auto">

        <!-- <li class="nav-item">
          <a class="nav-link" href="/ecommerce/admin_area/index1.php"> ADMIN</a>
        </li> -->

<?php

if(!isset($_SESSION['username'])){
  
   echo "<li class='nav-item'>
   <a class='nav-link' href='/ecommerce/admin_area/index1.php'> WELCOME ADMIN</a>
 </li>";
 }else{
   echo "<li class='nav-item'>
   <a class='nav-link' href='/ecommerce/admin_area/index1.php'> welcome ".$_SESSION['username']." </a>
 </li>";
 }



if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='/ecommerce/users_area/user_login.php'>Login</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='/ecommerce/users_area/user_logout.php'>Logout</a>
</li>";
}


?>

        <!-- <li class="nav-item">
          <a class="nav-link" href="/ecommerce/users_area/user_login.php">Login</a>
        </li> -->
        
      </ul>
     </nav>

     <div class="bg-light  ">
      <h3 class="text-center">EXOTIC STORE</h3>
      <p class="text-center">communication is heart of ecommerce and community </p>
     </div>


    


      <div class="row ">
                <div class="col-md-2 ">
                    <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                          <a class="nav-link text-light" href="#"><h4>Your profile</h4></a>
                    </li>

                    <?php
                    $username=$_SESSION['username'];
                    $user_image="Select * from `user_table` where username='$username'";
                    $user_image=mysqli_query($con,$user_image);
                    $row_image=mysqli_fetch_array($user_image);
                    $user_image=$row_image['user_image'];
                    echo "<li class='nav-item '>
                    <img src='./user_images/$user_image' alt='' class='profile_img my-3'>
                 </li>"

                    ?>

                    

                    <li class="nav-item ">
                          <a class="nav-link text-light" href="profile.php"><h5>Pending orders</h5></a>
                    </li>

                    <li class="nav-item ">
                          <a class="nav-link text-light" href="profile.php?edit_account"><h5>Edit account</h5></a>
                    </li>

                    <li class="nav-item ">
                          <a class="nav-link text-light" href="profile.php?my_orders"><h5>My orders</h5></a>
                    </li>

                    <li class="nav-item ">
                          <a class="nav-link text-light" href="profile.php?delete_account"><h5>Delete Account</h5></a>
                    </li>

                    <li class="nav-item ">
                          <a class="nav-link text-light" href="user_logout.php"><h5>Logout</h5></a>
                    </li>

                    </ul>
                </div>
                <div class="col-md-10 text-center">
                  <?php get_user_order_details();
                  if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                  }

                  if(isset($_GET['my_orders'])){
                    include('user_orders.php');
                  }

                  if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                  }

                  ?>
                </div>
            </div>


        

      

    
      
</div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>