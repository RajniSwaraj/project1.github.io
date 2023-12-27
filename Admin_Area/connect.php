<?php 
//database se connect krne ke liye......agr connection nhi hoga to error through krega
$con=mysqli_connect('localhost','root','','mystore');
if(!$con){
    die(mysqli_error($con));
}

?>