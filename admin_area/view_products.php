



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
th{
    style="background-color:#DC84F3"
}


</style>


</head>
<body>
    <h1 class="text-center ">All Products</h1>
    <table class="table table-bordered mt-5 ">
        <thead class="text-center">
<tr >
    <th  style="background-color:#DC84F3">product ID</th>
    <th  style="background-color:#DC84F3">product Title</th>
    <th  style="background-color:#DC84F3">product Image</th>
    <th style="background-color:#DC84F3">product price</th>
    <th  style="background-color:#DC84F3">Total sold</th>
    <th  style="background-color:#DC84F3">Status</th>
    <th  style="background-color:#DC84F3">Edit</th>
    <th  style="background-color:#DC84F3">Delete</th>
</tr>
</thead>
<tbody class="text-center">

    <?php
    $get_products="Select * from `products`";
$result=mysqli_query($con,$get_products);
$number=0;
while($row=mysqli_fetch_assoc($result)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $status=$row['status'];
    $number++;
    ?>

    <tr>
    <td><?php echo $number;   ?></td>
    <td> <?php echo  $product_title  ?></td>
    <td><img class='product_img' src='./product_images/<?php echo $product_image1;?>'/></td>
    <td> <?php echo $product_price;  ?></td>

    <td><?php
    $get_count="select * from `orders_pending` where product_id=$product_id";
    $result_count=mysqli_query($con,$get_count);
    $rows_count=mysqli_num_rows($result_count);
    echo $rows_count;
    ?></td>

    <td> <?php echo $status; ?></td>
    <td><a href='index1.php?edit_products=<?php echo $product_id ?>' class='text-center'><i class='fa-solid fa-pen-to-square'></i></a></td>

    <td><a href='index1.php?delete_product=<?php echo $product_id ?>' class='text-center'><i class='fa-solid fa-trash'></i></a></td>
</tr>

<?php 
}
    ?>

</tbody>
    </table>
</body>
</html>