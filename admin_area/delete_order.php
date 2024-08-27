<?php

if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];
    

    $delete_order="Delete from `user_orders` where order_id=$delete_id ";
    $result_order=mysqli_query($con, $delete_order);
    if ($result_order) {
        echo "<script>alert('order is deleted successfully')</script>";
        echo "<script>window.open('./index1.php?list_orders','_self')</script>";
    } else {
        // Print the error message for debugging
        echo "Error deleting category: " . mysqli_error($con);
    }
}



?>