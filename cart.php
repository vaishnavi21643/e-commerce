<?php
include('./includes/connect.php');
include('functions/common_function.php');
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

     .cart_img{
      height: 30%; 
      width: 30%;
      object-fit: contain;

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
                <a class="nav-link" href="#">cart<i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
              </li>
              


            </ul>
            
          </div>
        </div>
      </nav>
      

     <!-- calling cart func -->
<?php
cart();


?>



     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <ul class="navbar-nav me-auto">
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
        
      </ul>
     </nav>

     <div class="bg-light  ">
      <h3 class="text-center">EXOTIC STORE</h3>
      <p class="text-center">communication is heart of ecommerce and community </p>
     </div>


     <!-- table -->
       <div class="container ">
        <div class="row 
        ">

        <form action="" method="post">
            <table class="table table-bordered text-center ">
                
                
                   
  <!-- php dynamicc data -->

<?php

global $con;

  $get_ip_add = getIPAddress();
$total_price=0;
  $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' ";
  $result= mysqli_query($con, $cart_query);
  $result_count=mysqli_num_rows($result);
if($result_count>0){

  echo "<tr >
  <th style='background-color:#F3CCF3'>Product title</th>
  <th style='background-color:#F3CCF3'>Product image</th>
  <th style='background-color:#F3CCF3'>Quantity</th>
  <th style='background-color:#F3CCF3'>Price</th>
  <th style='background-color:#F3CCF3'>Remove</th>
  <th style='background-color:#F3CCF3' colspan='2'>Operations</th>
</tr>



<tbody >";

  
while($row=mysqli_fetch_array($result)){
$product_id=$row['product_id'];
$select_products = "SELECT * FROM `products` WHERE product_id='$product_id' ";
$result_products = mysqli_query($con, $select_products);
while($row_product_price =mysqli_fetch_array($result_products)){
  $product_price=array($row_product_price['product_price']);
  $price_table=$row_product_price['product_price'];
  $product_title=$row_product_price['product_title'];
  $product_image1=$row_product_price['product_image1'];
  $product_values=array_sum($product_price);
$total_price+=$product_values;



?>

<tr>
    <td><?php echo $product_title  ?></td>
    <td><img     src="./admin_area/product_images/<?php echo $product_image1 ?>"  alt="" class="cart_img" ></td>
    <td><input type="number" name="qty" class="form-input w-50" ></td>

<?php
 $get_ip_add = getIPAddress();

 if (isset($_POST['update_cart'])) {
     $quantities = isset($_POST['qty']) ? intval($_POST['qty']) : 0; // Convert $quantities to an integer
 
     // Update the quantity in the cart_details table
     $update_cart = "UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add'";
     $result_products_quantity = mysqli_query($con, $update_cart);
 
     if (!$result_products_quantity) {
         // Handle the error, log it, or display an error message
         die("Error updating quantity: " . mysqli_error($con));
     }
 
     // Fetch updated total price based on the updated quantity
     // Example query assuming a join between cart_details and products tables
 $select_total_price_query = "SELECT p.product_price FROM cart_details cd
 JOIN products p ON cd.product_id = p.product_id
 WHERE cd.ip_address='$get_ip_add'";
 
 
 
     $result_total_price = mysqli_query($con, $select_total_price_query);
 
     if (!$result_total_price) {
         // Handle the error, log it, or display an error message
         die("Error fetching total price: " . mysqli_error($con));
     }
 
     $total_price = 0; // Reset total price
 
     while ($row_total_price = mysqli_fetch_array($result_total_price)) {
         $product_price = $row_total_price['product_price'];
         $total_price += $product_price * $quantities;
     }
 }




?>


    <td> <?php echo  $price_table ?> </td>
    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id   ?>"> </td>

    <td colspan="2">
        <!-- <button class="bg-dark px-3 py-2 border-0 text-light mb-5">Update</button> -->
        <input type="submit" value="update cart" 
        class="bg-dark px-3 py-2 border-1 text-light mb-5" name="update_cart">

        <input type="submit" value="remove cart" 
        class="bg-dark px-3 py-2 border-1 text-light mb-5" name="remove_cart">
        
    </td>
</tr>





<?php
}

}
}

else{

  echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
}
?>


</tbody>

            </table>


            <!-- subtotal -->
             <div class="d-flex mb-5">
              
                <h4 class="px-3">Subtotal:<strong class="text-info"><?php echo $total_price."/-"  ?></strong></h4>
                <input type="submit" value="Continue Shopping" name="Continue_Shopping" class="bg-info px-3 py-2 border-0">
                <!-- <a href="index.php"><button class="bg-info px-3 py-2 border-0 ">Continue Shopping</button></a> -->

                <?php
                if(isset($_POST['Continue_Shopping'])){
                  echo "<script> window.open('index.php','_self')   </script>";
                }
                   

                ?>
                
                


                <input type="submit" value="Checkout" name="Checkout" class="bg-dark px-3 py-2 border-0 text-light">
                <!-- <a href="#"><button class="bg-dark px-3 py-2 border-0 text-light">Checkout</button></a> -->

                <?php
                if(isset($_POST['Checkout'])){
                  echo "<script> window.open('users_area/checkout.php','_self')   </script>";
                }
                   

                ?>
                
             </div> 


        </div>
       </div>
     
     
       </form>

       <!-- func to remove item -->

       <?php
        function remove_cart_item(){
          global $con;
          if(isset($_POST['remove_cart'])){
             foreach($_POST['removeitem'] as $remove_id ){
              echo $remove_id;
              $delete_query="delete from `cart_details` where product_id=$remove_id";
              $run_delete=mysqli_query($con,$delete_query);
              if($run_delete){
                echo "<script>window.open('cart.php','_self')  </script>";
              }
             }

          }

        }

        echo  $remove_item=remove_cart_item();

      ?>

     <?php 
      include("./includes/footer.php") ?>
     
</div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>