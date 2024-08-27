
<?php
// Initialize variables to avoid "undefined variable" warnings
$product_title = $product_description = $product_keywords = $category_title = $brand_title = $product_image1 = $product_image2 = $product_image3 = $product_price = '';

if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
    
    // Error handling for the query
    $result = mysqli_query($con, $get_data);
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    // Check if there are rows in the result set
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];

        // Fetching category names
        $select_category = "SELECT * FROM `categories` WHERE category_id = $category_id";
        $result_category = mysqli_query($con, $select_category);

        // Error handling for the category query
        if (!$result_category) {
            die("Category query failed: " . mysqli_error($con));
        }

        if ($result_category && mysqli_num_rows($result_category) > 0) {
            $row_category = mysqli_fetch_assoc($result_category);
            $category_title = $row_category['category_title'];
        }

        // Fetching brand names
        $select_brand = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
        $result_brand = mysqli_query($con, $select_brand);

        // Error handling for the brand query
        if (!$result_brand) {
            die("Brand query failed: " . mysqli_error($con));
        }

        if ($result_brand && mysqli_num_rows($result_brand) > 0) {
            $row_brand = mysqli_fetch_assoc($result_brand);
            $brand_title = $row_brand['brand_title'];
        }
    } else {
        // Handle the case when no rows are found for the specified product ID
        die("No product found for ID: $edit_id");
    }
}
?>

<!-- The rest of your HTML and form code remains unchanged -->








<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title"  value="<?php  echo $product_title; ?>"  class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" value="<?php  echo $product_description; ?>" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" value="<?php  echo $product_keywords; ?>" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">product category</label>
            <select name="product_category" class="form-select">
            
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>

                <?php
$select_category_all="SELECT * FROM `categories`";
$result_category_all=mysqli_query($con,$select_category_all);
while($row_category_all=mysqli_fetch_assoc($result_category_all)){
$category_title=$row_category_all['category_title'];
$category_id=$row_category_all['category_id'];
echo "<option value='$category_id'>$category_title</option>";
};

?>
                
               
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brands" class="form-label">product brands</label>
            <select name="product_brands" class="form-select">
           
                <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>

                <?php
$select_brand_all="SELECT * FROM `brands`";
$result_brand_all=mysqli_query($con,$select_brand_all);
while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
$brand_title=$row_brand_all['brand_title'];
$brand_id=$row_brand_all['brand_id'];
echo "<option value='$brand_id'>$brand_title</option>";
};
?>

               
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img" >
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img" >
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_img" >
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" id="product_price" name="product_price" value="<?php echo $product_price; ?>" class="form-control" required="required">
        </div>

        <div class=" w-50 m-auto">
            <input type="submit" name="edit_product" value="update product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- editing products -->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];


move_uploaded_file($temp_image1,"./product_images/$product_image1");
move_uploaded_file($temp_image2,"./product_images/$product_image2");
move_uploaded_file($temp_image3,"./product_images/$product_image3");


$update_product="update `products` set product_title='$product_title',
product_description='$product_desc', product_keywords='$product_keywords',
category_id='$product_category', brand_id='$product_brands',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price',date=NOW() where product_id=$edit_id";

$result_update=mysqli_query($con,$update_product);
if($result_update){
    echo "<script>alert(product updated successfully)</script>";
    echo "<script>window.open('./index1.php?view_products','_self')</script>";
}


}


?>