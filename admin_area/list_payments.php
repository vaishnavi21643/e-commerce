<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
<thead>
<?php
$get_payments="Select * from `user_payments`";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);
echo "
<tr>
<th>sr no</th>

<th>Invoice Number</th>
<th>Amount</th>
<th>Payment mode</th>

<th>Delete</th>
</tr>
</thead>
<tbody>
";

if($row_count==0){
    echo "<h2 class='bg-danger text-center mt-5'>No Payments</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        
        $number++;

        ?>
        
         <tr>
        <td><?php echo $number ?></td>
        
        <td><?php echo $invoice_number ?> </td>
        <td> <?php echo $amount ?>  </td>
        <td> <?php echo $payment_mode ?>    </td>
        
        
        <td><a href='index1.php?delete_payment= <?php echo $payment_id ?>' class='text-center'><i class='fa-solid fa-trash'></i></a></td>
    </tr>

    <?php
    }
}

?>




   
    
</tbody>

</table>
