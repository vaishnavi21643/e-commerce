<h3 class="text-center text-success">All Categories</h3>
<table  class="table table-bordered mt-5"  >    
<thead>
<tr>
    <th style="background-color:#DC84F3">slno</th>
    <th style="background-color:#DC84F3">category title</th>
    <th style="background-color:#DC84F3">edit</th>
    <th style="background-color:#DC84F3">delete</th>
</tr>
</thead>
<tbody>

<?php
$select_cat="select * from `categories`";
$result=mysqli_query($con,$select_cat);
$number=0;
while($row=mysqli_fetch_assoc($result)){
$category_id=$row['category_id'];
$category_title=$row['category_title'];
$number++;

?>

    <tr>
        <td><?php echo $number    ?></td>
        <td> <?php echo $category_title   ?></td>
    <td><a href='index1.php?edit_category=<?php echo $category_id  ?>' class='text-center'><i class='fa-solid fa-pen-to-square'></i></a></td>

    <td><a href='index1.php?delete_category=<?php echo $category_id  ?>' class='text-center'><i class='fa-solid fa-trash'></i></a></td>
    </tr>

    <?php
}

?>
</tbody>
</table>