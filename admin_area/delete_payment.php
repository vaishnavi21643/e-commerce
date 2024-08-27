<?php

if(isset($_GET['delete_payment'])){
    $delete_id = $_GET['delete_payment'];
    

    $delete_payment="Delete from `user_payments` where payment_id=$delete_id ";
    $result_payment=mysqli_query($con, $delete_payment);
    if ($result_payment) {
        echo "<script>alert('payment info is deleted successfully')</script>";
        echo "<script>window.open('./index1.php?list_payments','_self')</script>";
    } else {
        // Print the error message for debugging
        echo "Error deleting category: " . mysqli_error($con);
    }
}



?>