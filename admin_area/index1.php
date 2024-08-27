<?php
include('../includes/connect.php');
//include_once './functions/common_function.php';

//include('../includes/connect.php');
include('../functions/common_function.php');



session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!--font aewsm link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<link rel="stylesheet" href="../style.css">

<style>
    .admin_image{
    width: 100px;
    object-fit: contain;
}

.footer{
    position: absolute;
    bottom: 0;

}
body{
    overflow-x:hidden;
}

.product_img{
    width:20%;
    object-fit:contain;
}

.img1{
    width:30%;
    
    height:30%;
}
.img2{
    width:30%;
    
    height:20%;
}
.img3{
    width:30%;
    
    height:30%;
}

.userimg{
    width:20%;
    object-fit:contain;
}

</style>

</head>
<body style="background-color:#F3CCF3">
    <!-- Your content goes here -->
    <!--navbar-->
    <div class="container-fluid p-0 "  >
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#FFE7C1">
        <div class="container-fluid">
            <img src="../images/cart3.jpg" alt="" class="logo">

            <nav class="navbar navbar-expand-lg ">
              <ul class="navbar-nav">
                <li class="nav-item">

                <?php



if (isset($_SESSION['admin_name'])) {
    $admin_name = $_SESSION['admin_name'];
} else {
    header('Location: admin_login.php');
}
?>


                    <a href="" class="nav-link">welcome <?php echo $admin_name; ?></a>
                </li>
              </ul>
            </nav>
        </div>
    </nav> 

<!-- 
    <div class="bg-light">
        <h3 class="text-center p-2">Manage details</h3>
    </div> -->

    
    <div class="row">
        <div class="col-md-12  p-1 d-flex align-items-center"  style="background-color:#E9A8F2">
            <div class="px-5">
                <a href="#"><img src="../images/cart.png" alt="" class="admin_image"></a>


              
                
                <p class="text-light text-center"> <?php echo $admin_name; ?></p>

                
            

            </div>

            <div class="button text-center m-3 ">
                <button><a href="../index.php" class="nav-link text-dark bg-info my-1 mx-1">Home</a></button>
                <button class="my-3"><a href="/ecommerce/admin_area/insert_product.php" class="nav-link text-dark bg-info my-1 mx-1">Insert products</a></button>
                <button><a href="index1.php?view_products" class="nav-link text-dark bg-info my-1 mx-1">View products</a></button>
                <button><a href="index1.php?insert_category" class="nav-link text-dark bg-info my-1 mx-1">Insert category</a></button>
                <button><a href="index1.php?view_categories" class="nav-link text-dark bg-info my-1 mx-1">View categories</a></button>
                <button><a href="index1.php?insert_Brands" class="nav-link text-dark bg-info my-1 mx-1">Insert Brands</a></button>
                <button><a href="index1.php?view_brands" class="nav-link text-dark bg-info my-1 mx-1">View Brands</a></button>
                <button><a href="index1.php?list_orders" class="nav-link text-dark bg-info my-1 mx-1">All orders</a></button>
                <button><a href="index1.php?list_payments" class="nav-link text-dark bg-info my-1 mx-1">All payments</a></button>
                <button><a href="index1.php?list_users" class="nav-link text-dark bg-info my-1 mx-1">List users </a></button>
                <button><a href="admin_logout.php" class="nav-link text-dark bg-info my-1 mx-1">Logout</a></button>
            </div>



        </div>
    </div>
    <div class="row d-flex align-items-center justify-content-center"></div>
    <img src="../images/adminimg1.jpg" class=" img1" alt="...">
    <img src="../images/img2.jpg" class="img2" alt="...">
    <img src="../images/img4.jpg" class="img3" alt="...">
    </div>
    
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_Brands'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brand'])){
            include('edit_brand.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brands'])){
            include('delete_brands.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['delete_order'])){
            include('delete_order.php');
        }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
        }
        if(isset($_GET['delete_payment'])){
            include('delete_payment.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        
        ?>
    </div>


    <!-- <div class="bg-info p-2 text-center footer">
        <p>all rights reserved @-designed by arshiya & vaishnavi-2023</p>
      </div>  -->

    </div>
      






    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
