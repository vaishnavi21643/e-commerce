<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
<thead>
<?php
$get_user="Select * from `user_table`";
$result=mysqli_query($con,$get_user);
$row_count=mysqli_num_rows($result);
echo "
<tr>
<th>sl no</th>

<th>username</th>
<th>email</th>
<th>user image</th>
<th>address</th>
<th>mobile no.</th>

</tr>
</thead>
<tbody>
";

if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>No users</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        //$user_id =$row_data['user_id '];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        
        $number++;

        ?>
        
         <tr>
        <td><?php echo $number ?></td>
        
        <td><?php echo $username ?> </td>
        <td> <?php echo $user_email ?>  </td>
        <td><img src="../users_area/user_images/<?php echo $user_image ?>"  alt="" class=" product_img">    </td>
        <td> <?php echo  $user_address ?>    </td>
        <td> <?php echo  $user_mobile ?>    </td>
        
       
    </tr>

    <?php
    }
}

?>




   
    
</tbody>

</table>
