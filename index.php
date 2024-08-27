
<?php


include('./includes/connect.php');
include('./functions/common_function.php');
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

    <link rel="stylesheet" href="style.css">

    
    <style>
      /* Apply the custom font to the text inside the .bg-light div */
      .bg-light {
        font-family: 'Caveat', Algerian;
        font-family: 'Whisper', Algerian;
      }


      div.scroll-container {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
  padding: 10px;
}

div.scroll-container img {
  padding: 10px;
}

.img1{
  width: 25%;
  height: 30%;
  
}
      
  </style>
</head>
<body >
    


<div class="container-fluid p-0" style="background-color:#FFE7C1">
    <nav class="navbar navbar-expand-lg 
    " style="background-color:#F3CCF3">
        <div class="container-fluid">
          <img src="./images/logo1.jpeg" alt="" class="logo">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i>Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="display_all.php"><i class="fa-solid fa-bag-shopping"></i>Products</a>
              </li>

              <?php
              if(isset($_SESSION['username'])){
                 echo "<li class='nav-item'>
                 <a class='nav-link' href='./users_area/profile.php'><i class='fa fa-user-circle' aria-hidden='true'></i>My Account</a>
               </li>";

              }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/user_registration.php'><i class='fa-solid fa-registered'></i>register</a>
              </li>";
              }
             ?>
            



              
              <li class="nav-item">
                <a class="nav-link" href="/ecommerce/contact.html"><i class="fa-solid fa-address-card"></i>contacts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php">cart<i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/ecommerce/payment.html"><?php  total_cart_price();?></a>
              </li>


            </ul>
            <form class="d-flex" role="search" action="search_product.php" method="get">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
              <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
              <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
            </form>
          </div>
        </div>
      </nav>
      

     <!-- calling cart func -->
<?php
cart();


?>



     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <ul class="navbar-nav me-auto">

        <!-- <li class="nav-item">
          <a class="nav-link" href="/ecommerce/admin_area/index1.php"> ADMIN</a>
        </li> -->

<?php

if(!isset($_SESSION['username'])){
  
   echo "<li class='nav-item'>
   <a class='nav-link' href='/ecommerce/admin_area/admin_registration.php'> WELCOME ADMIN</a>
 </li>";
 }else{
   echo "<li class='nav-item'>
   <a class='nav-link' href='/ecommerce/users_area/profile.php'> welcome ".$_SESSION['username']." </a>
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


     <div class="scroll-container">
      <a href="/ecommerce/display_all.php"><img src="./images/home1.jpg" alt="Cinque Terre" class="img1"></a>
  
  <img src="./images/home2.jpg" alt="Forest" class="img1">
  <img src="./images/home3.jpg" alt="Northern Lights" class="img1">
  <img src="./images/home4.jpg" alt="Mountains" class="img1">
  <img src="./images/img4.jpg" alt="Mountains" class="img1">
</div>




     <div class="row px-4">
      <div class="col-md-10">
        <!--products-->
      <div class="row">

<?php

getproducts();
get_unique_categories();
get_unique_brands();

// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;

?>


        

        <!-- row end -->

      </div>

      <!-- col end -->
      </div>

      <div class="col-md-2 bg-dark p-0" >
        <!--sidenav-->
        <!--brands to be displayed-->
        <ul class="navbar-nav me-auto text-center" >
          <li class="nav-item " style="background-color:#DC84F3">
            <a href="#" class="nav-link text-dark"><h4>Brands</h4></a>
          </li>


         <?php
          getbrands();
          
      
        ?>

        </ul>

        <!--categories to be displayed-->
      
        <ul class="navbar-nav me-auto text-center" >
          <li class="nav-item " style="background-color:#DC84F3">
            <a href="#" class="nav-link text-dark"><h4>categories</h4></a>
          </li>

          <?php
          getcategories();
      
        ?>

        </ul>

      </div>
     </div>

     <?php 
      include("./includes/footer.php") ?>
      
</div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>