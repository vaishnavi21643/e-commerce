<?php
include('../includes/connect.php');

session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET[ 'order_id'];
    //echo  $order_id;
    $select_data="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
  $row_fetch=mysqli_fetch_assoc($result);
  $invoice_number=$row_fetch['invoice_number'];
  $amount_due=$row_fetch['amount_due'];

}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";

    $result=mysqli_query($con,$insert_query);

    if($result){
        echo "<h3 class='text-center text-light'> Successfully completed the payment </h3>";
        echo "<script>window.open('profile.php?my_orders','_self') </script>";
    }
    $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}

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

<style>
    .container{
        height:90%;
        width:80%;
        margin-top:100px;
        
    }
</style>
    
</head>
<body style="background-image: url('../images/contactimg.jpg'); 
height: 500px; 
  background-position: center; 
  background-repeat: no-repeat;
  background-size: cover;
">
    <div class="container  text-center align-items-center justify-content-center  ">
        <h1 class="text-center text-light">Confirm payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Invoice number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number   ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due   ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="text-light"> payment mode</label>
                <select name="payment_mode" class="form-select w-50 m-auto" >
                    <option >Cash on Delivery</option>
                    
                </select>
            </div>
            

            <div class="form-outline my-4 text-center w-50 m-auto">
                
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment" >
            </div>
        </form>
    </div>
    









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

