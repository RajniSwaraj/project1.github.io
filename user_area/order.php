<?php 
include ('../includes/connect.php');
include ('../functions/common_function.php');

// Acccess the user_id adress when isset
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];  //value to access and store in a variable
    }

//getting total item and total price of all the item
$get_ip=getIPAddress();  //for mutiple item for one user is only one ip address....so to access total item and total price
$total_price=0;
$cart_query="Select * from `cart_details` where ip_address='$get_ip'";   //using this query we access all the product of that user ip
$result_query = mysqli_query($con,$cart_query);       //executing the above query
$invoice_no = mt_rand();
$status='pending';
$count_product=mysqli_num_rows($result_query);          //give the total row of product exists  in the db table
while($row_price=mysqli_fetch_array($result_query)) {    //  fetch the product id using while loop bcoz it has  multiple product
 $product_id=$row_price['product_id'];
 $select_product="Select * from `products` where product_id=$product_id"; //using this to match the user product_id the product_id of database table
 $result_product = mysqli_query($con,$select_product);               //execute the query
 while($row_product_price = mysqli_fetch_array($result_product)) {         ////to fatch the product price through the product_id
    $product_price=array($row_product_price['product_price']);
    $product_value=array_sum($product_price);
    $total_price+=$product_value;

 }            
 
}

// getting the quantity from cart                       
$get_cart="select * from `cart_details`";              //selecting the data from cart table
$result_cart=mysqli_query($con,$get_cart);             //executing the query
$get_quantity=mysqli_fetch_array($result_cart);       //fetch the quantity of cart table
$quantity=$get_quantity['quantity'];
if($quantity==0){
    $quantity= 1;
    $subtotal=$total_price;
}else{
    $quantity= $quantity;
    $subtotal=$total_price*$quantity;

}
$insert_orders="Insert into `user_orders` (user_id, amount_due,invoice_number,total_products,order_date, order_status)
values ($user_id,$subtotal,$invoice_no,$count_product,NOW(),'$status')";
$result_orders=mysqli_query($con,$insert_orders);
if($result_orders){
    echo "<script>alert('order are submitted succesfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

//order pending
$insert_pending_orders="Insert into `order_pending` (user_id,invoice_number,product_id,quantity,order_status)
values ($user_id,$invoice_no,$product_id,$quantity,'$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);

//delete item from cart
$empty_cart="delete from `cart_details` where ip_address='$get_ip'";
$result_delete=mysqli_query($con,$empty_cart);





?>