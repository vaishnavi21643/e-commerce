<?php
if (isset($_GET['delete_brands'])) {
    $delete_brands = $_GET['delete_brands'];
    
    $delete_query = "DELETE FROM `brands` WHERE brand_id = $delete_brands";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>alert('Brand is deleted successfully')</script>";
        echo "<script>window.open('./index1.php?view_brands','_self')</script>";
    } else {
        // Print the error message for debugging
        echo "Error deleting brand: " . mysqli_error($con);
    }
}
?>
<h3>hello</h3>