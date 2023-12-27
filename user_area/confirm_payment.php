<!--- connect file---->
<?php 
require ('../includes/connect.php');
session_start();
if (isset($_GET['order_id'])) {
    $order_id=$_GET['order_id'];
    $select_query="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_query);
    $row=mysqli_fetch_array($result);
    $invoive_no=$row['invoice_number'];
    $amount_due= $row['amount_due'];
}
if(isset($_POST['confirm'])){
    $invoive_number=$_POST['invoice_number']  ;
    $amount=$_POST['amount_due'];
    $payment_mode=$_POST['payment_mode'];

    $insert_query="insert into `user_payment` (order_id	, invoice_number,amount_due,payment_mode
    ) values ($order_id, $invoive_number,$amount,'$payment_mode')";
    $result_query=mysqli_query($con,$insert_query);
    if($result_query){
        echo "<script>alert('payment successfully completed')</script>";
        echo"<script>window.open('profile.php?my_order','_self')</script>";
    }

    $update_user_order="update `user_orders` set order_status='complete' where order_id=$order_id";
    $result_order=mysqli_query($con,$update_user_order);





}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!----------------CSS FILE---------->
    <link rel="stylesheet" href="../src/style.css">

    <!-------------BOOTSTRAP CSS LINK---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-------------FONT AWASOME LINK---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-secondary">
<div class="section-headline underline">
    <h3 class="text-center text-white mt-5">Confirm Payment</h3>
    <div class="container my-5">
   <form action="" method="post" class="w-50 text-center m-auto">
        <div class="form-outline  text-center w-50 mb-4 m-auto">
          <input type="text" class="form-control" name="invoice_number" value="<?php echo $invoive_no ?>">
        </div>
        <label class="form-label text-white" for="">Amount </label>
        <div class="form-outline  text-center w-50 mb-4 m-auto">
          <input type="text" class="form-control" name="amount_due" value="<?php echo $amount_due ?>">
        </div>
        <div class="form-outline  text-center w-50 mb-4 m-auto">
            <select class="form-select" name="payment_mode">
                <option>Select Payment Mode</option>
                <option name="payment_mode">UPI</option>
                <option name="payment_mode">Cash on Delivery</option>
                <option name="payment_mode">Netbanking</option>
                <option name="payment_mode">PayPal</option>
            </select>
        </div>
        <div class="form-outline  text-center w-50 mb-4 m-auto">
          <input type="submit" class="bg-info border-0 px-3 py-2" name="confirm" value="Confirm Payment" id="">
        </div>
    
   </form>
    </div>
</div>

  <!-------------BOOTSTRAP JS LINK---->  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>