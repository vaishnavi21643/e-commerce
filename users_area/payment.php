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

      .payment_img{
        width: 90%;
        margin:auto;
        display:block:
      }

  </style>
</head>
<body style="background-image: url(./images/bg7.jpg); ">
<?php
$user_ip=getIPAddress();
$get_user="Select * from `user_table` where user_ip='$user_ip'";
$result=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];

?>


<div class="container">
<h2 class="text-center text-dark">Payment options</h2>
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-md-6">
     <a href="https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwi6xa-Ei4eFAxUzxkwCHWaED04YABAAGgJ0bQ&ase=2&gclid=CjwKCAjwte-vBhBFEiwAQSv_xbB2ahhebjTxHFfbnGJdrzyVGWk5whyCxsfSkkOsTaAeWnZepH3KcxoCEEsQAvD_BwE&ohost=www.google.com&cid=CAESV-D282Zm3jqVRu9ig1IpCjIhgeCwLKtX8rDKBJv--oZ9XkIir5n0RzEInudLsDATednQdQheDd3edAJg1ZiEEnVXhigGiGfaZXZGEcfBWWpBXzSTpWkU8w&sig=AOD64_3ZSf_AxQyMoI3-CogeqHX2xIsP6w&q&nis=4&adurl&ved=2ahUKEwjWqamEi4eFAxUvplYBHRSoAXkQ0Qx6BAgDEAE" target="_self"><img src="../images/pay.jpeg" alt="" class="payment_img"></a>
     </div>

     <div class="col-md-6">
     <a href="order.php?user_id=<?php echo $user_id?>" > <h2 class="text-center">Pay offline </h2>  </a>
     </div>

</div>
</div>
       





    </body>
</html>