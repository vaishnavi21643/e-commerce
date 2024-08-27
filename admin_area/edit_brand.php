<?php
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
//echo $edit_brand;


$get_brand = "SELECT * FROM `brands` WHERE brand_id = $edit_brand";
$result = mysqli_query($con, $get_brand);
$row= mysqli_fetch_assoc($result);
$brand_title = $row['brand_title'];
//echo $brand_title;
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['brand_title'];

    $update_query="update `brands` set brand_title='$cat_title' where brand_id = $edit_brand";
    $result_cat = mysqli_query($con, $update_query);
    if( $result_cat){
        echo "<script>alert(brand is updated successfully)</script>";
    echo "<script>window.open('./index1.php?view_brands','_self')</script>";
    }
}
?>






<div class="container mt-5">
    <h1 class="text-center">Edit brands</h1>
    <form action="" method="post" class="text-center">


        <div class="form-outline  mb-4">
            <label for="brand_title" class="form-label">brand Title</label>
            <input type="text" id="brand_title" name="brand_title"    class="form-control" required="required">
        </div>

        <input type="submit" value="Update brand"  class="btn btn-info px-3 mb-3" name="edit_cat">
    </form>
</div>