<h3 class="text-center text-success">All Brands</h3>
<table  class="table table-bordered mt-5"  >    
<thead>
<tr>
    <th style="background-color:#DC84F3">slno</th>
    <th style="background-color:#DC84F3">brand title</th>
    <th style="background-color:#DC84F3">edit</th>
    <th style="background-color:#DC84F3">delete</th>
</tr>
</thead>
<tbody>

<?php
$select_brand="select * from `brands`";
$result=mysqli_query($con,$select_brand);
$number=0;
while($row=mysqli_fetch_assoc($result)){
$brand_id=$row['brand_id'];
$brand_title=$row['brand_title'];
$number++;

?>

    <tr>
        <td><?php echo $number    ?></td>
        <td> <?php echo $brand_title   ?></td>
    <td><a href='index1.php?edit_brand=<?php echo $brand_id  ?>' class='text-center'><i class='fa-solid fa-pen-to-square'></i></a></td>

    <td><a href='index1.php?delete_brands=<?php echo $brand_id  ?>' class='text-center'><i class='fa-solid fa-trash'></i></a></td>
    </tr>

    <?php
}

?>
</tbody>
</table>