<?php 
//database se connect krne ke liye liye connrection.php file include kiye h
include('../includes/connect.php');

//insert the value in the database that is collect by the insert brand by the insert brand button when if the insertcategory button is clicked
if(isset($_POST['insert-brand'])){    //post element name must be same i.e insert-brand
$brand_title=$_POST['brand-title'];      //insertbrand input se as a name(brand-title) refrence se ek catergory_title varaible me store kiye

//select data from database to check the data is already present or not
$select_query="Select * from `brands` where brand_title ='$brand_title'";     //fetch from the database
$result_select=mysqli_query($con,$select_query);                      //this is for excuting the query
$number=mysqli_num_rows($result_select);                               //calculate the no. of row of categories_title ie. equal to $categoery_title
if($number> 0){
  echo "<script>alert('THIS BRAND IS ALREADY PRESENT IN THE BRAND LIST')</script>";
}     else {

   // insert into the database that we entered into the input
  $insert_query= "insert into `brands` (brand_title) values ('$brand_title')";     
  $result=mysqli_query($con,$insert_query);                             //this is for excuting the query
  if($result){
    echo "<script>alert('BRAND IS SUCCESSFULLY ADDED IN THE BRAND LIST')</script>";
}
}
}

?>
<h2 class=" text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2" >
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand-title" placeholder="Insert Brands" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 m-auto my-3 mb-2">
  <input type="submit" class="p-2 border-0 bg-info" name="insert-brand" value="Insert brands" aria-label="Username" aria-describedby="basic-addon1">
  
</div>

</form>