<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> my order</title>
</head>
<body>
<div class="section-headline">
   <h3 class="text-success mb-4 mt-5">All my order</h3>
   </div>
    <div>
      <table class="table table-bordered text-center">
        <!---------php code to display dynamic data of order product--->
          <?php
          $username=$_SESSION['user_name'];    //use the session which we are created the session
          $get_user="Select * from `user_table` where user_name='$username'";
          $result_query = mysqli_query($con,$get_user);
           $row_fetch = mysqli_fetch_assoc($result_query);
           $user_id=$row_fetch['user_id'];

          ?>

          <thead class="text-center bg-info">
                  <tr>
                      <th>SI no.</th>
                      <th>Amount Due</th>
                      <th>Total Products</th>
                      <th>Invoice Number</th>
                      <th>Date</th>
                      <th>Complete/Incomplete</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody class="text-center bg-dark text-white">
              <?php
          $get_order_details="Select * from `user_orders` where user_id='$user_id'";
          $result = mysqli_query($con,$get_order_details);
           $number=1;
          while($row_order = mysqli_fetch_array($result)){
             $order_id=$row_order['order_id'];
             $amount_due=$row_order['amount_due'];
             $amount_due=$row_order['amount_due'];
             $total_products=$row_order['total_products'];
             $invoive_no=$row_order['invoice_number'];
             $order_status=$row_order['order_status'];
             if($order_status=='pending'){
                $order_status= 'Incomplete';
             }else{
                $order_status= 'Complete';
             }

             $order_date=$row_order['order_date'];
             echo "
             <tr>
             <td>$number</td>
             <td>$amount_due</td>
             <td>$total_products</td>
             <td>$invoive_no</td>
             <td>$order_date</td>
            <td> $order_status</td>";
            ?>
            <?php 
            if($order_status=='Complete'){
                echo "<td>Paid</td>";
            }else{
                 echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                 </tr>
             ";
            }

    
        
            
              $number++;
    

          }
           
     
          ?>
    
              </tbody>  

      </table>
    </div>
</body>
</html>