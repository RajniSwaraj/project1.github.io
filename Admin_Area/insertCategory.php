<?php 
include('../includes/connect.php');

//insert the value in the database that is collect by the insert category by the insert category button
if(isset($_POST['insert-cat'])){    //post element name must be same i.e insert-cat
$category_title=$_POST['cat-title'];      //insertcategory input se as a name(cat-title) refrence se ek catergory_title varaible me store kiye

//select data from database to check the data is already present or not
$select_query="Select * from `categories` where categories_title ='$category_title'";     //fetch from the database
$result_select=mysqli_query($con,$select_query);                      //this is for excuting the query
$number=mysqli_num_rows($result_select);                               //calculate the no. of row of categories_title ie. equal to $categoery_title
if($number> 0){
  echo"<script>alert('THIS CATEGORY IS ALREADY PRESENT IN THE CATEGORY LIST')</script>";
}     else {

   // insert into the database that we entered into the input
  $insert_query= "insert into `categories` (categories_title) values ('$category_title')";     
  $result=mysqli_query($con,$insert_query);                             //this is for excuting the query
  if($result){
    echo "<script>alert(' CATEGORY IS SUCCESSFULLY ADDED IN THE CATEGORY LIST')</script>";
}
}
}

?>
<h2 class=" text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2" >
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat-title" placeholder="Insert category" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 m-auto my-3 mb-2">
  <input type="submit" class=" bg-info p-2 my-3 border-0" name="insert-cat" value="Insert category" aria-label="Username" aria-describedby="basic-addon1">
  
</div>

</form>