<!--- connect file---->
<?php 

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "mystore";

// // Create connection
// $con = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($con->connect_error) {
//   die("Connection failed: " . $con->connect_error);
// }

//if the insert button is clicked then perform the below action
require('connect.php');

if(isset($_POST['insert_product'])){
    
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_discription'];
    $product_keywords=$_POST['product_Keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    //accessing image  ..so we cant use post we use files
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //accessing image temporary name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    
    //checking empty condition
    if($product_title=='' or $product_description== '' or $product_keywords=='' or $product_category=='' or $product_brand== '' or $product_price== '' or
     $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('plz fill all the available feild')</script>";
        exit();
    } else {
      // query for move uploaded image into the product_image folder ,it take two param 
      move_uploaded_file($temp_image1,"./product_image/$product_image1");
      move_uploaded_file($temp_image2,"./product_image/$product_image2");
      move_uploaded_file($temp_image3,"./product_image/$product_image3");

      //insert query for product
      $insert_products="INSERT INTO `products` (product_title,product_discription,product_Keyword,category_id, brand_id, product_image1,product_image2, product_image3,product_price,
      date,status) VALUES ('$product_title', '$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status') ";
      //excute the query
      $result_query=mysqli_query($con,$insert_products);
        echo "<script>alert('successfully inserted the product')</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert product-admin</title>
    <link rel="stylesheet" href=".../src/style.css">
    <!-------------BOOTSTRAP CSS LINK---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-------------FONT AWASOME LINK---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
<div class="container w-100 mt-3 border border-1 border-success">
    <h1 class="text-center">Insert Product</h1>
    <!--form-->
    <form action="" method="post" enctype="multipart/form-data">
<!--form-->
        <div class="form-outline w-50 mb-2 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" autocomplete="off" required="required" placeholder="Enter Product Title" class="form-control">
        </div>
<!--form-->
        <div class="form-outline w-50 mb-2 m-auto">
            <label for="product_discription" class="form-label">Description</label>
            <input type="text" name="product_discription" id="product_discription" autocomplete="off" required="required" placeholder="Enter Product discription" class="form-control">
        </div>
<!--form-->
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_Keywords" class="form-label">Keywords</label>
            <input type="text" name="product_Keywords" id="product_Keywords" autocomplete="off" required="required" placeholder="Enter Product Keywords" class="form-control">
        </div>
<!--form-->
        <div class="form-outline w-50 mb-4  m-auto">
        <select class="form-select" name="product_category" id="product_category" required="required">
            <option selected>Select a category</option>

            <?php
            $select_category="Select * from `categories`";
            $result_category=mysqli_query($con,$select_category); 
            while($row_data=mysqli_fetch_assoc($result_category)){              //to fatch the data from db by using query   
              $category_title=$row_data['categories_title'];
            $category_id=$row_data['categories_id'];
            echo "<option value='$category_id'>$category_title</option>";
            }  
            
            ?>
            <!--
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        -->
        </select>
        </div>
<!--form-->
        <select class="form-select outline w-50 mb-3  m-auto" required="required" name="product_brand" id="product_brand" aria-label=".form-select example">
            <option selected>select a brand</option>
        
            <?php
            //jo v brand data base me rhega wo brandlist me add ho jaye
            $select_brands="Select * from `brands`";
            $result_brands=mysqli_query($con,$select_brands); 
            while($row_data=mysqli_fetch_assoc($result_brands)){
            $brand_title=$row_data['brand_title'];
            $brand_id=$row_data['brand_id'];
            echo "<option value='$brand_id'>$brand_title</option>";

                      }       //to fatch the data from db by using query                      
            ?>

            <!--

            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
                    -->
        </select>
<!--form-->
        <div class=" outline mb-3 w-50 m-auto">
             <label for="product_image1" class="form-label">Product Image 1</label>
             <input class="form-control" type="file" required="required" name="product_image1" id="product_image1">
        </div>
<!--form-->
        <div class="outline mb-3 w-50 m-auto">
             <label for="product_image2" class="form-label" >Product Image 2</label>
             <input class="form-control" type="file" required="required" name="product_image2" id="product_image2">
        </div>
<!--form-->
        <div class="outline mb-3 w-50 m-auto">
             <label for="product_image3" class="form-label">Product Image 3</label>
             <input class="form-control" type="file" required="required" name="product_image3" id="product_image3">
        </div>
<!--form-->
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="number" name="product_price" id="product_price" autocomplete="off" required="required" placeholder="Enter Product price" class="form-control">
        </div>
<!--form-->
        <div class="form-outline w-50 mb-4 m-auto">
        <input type="submit" name="insert_product" value="insert product" id="insert_product" autocomplete="off" required="required" class="btn btn-info">
        </div>

        

    </form>
</div>





    <!-------------BOOTSTRAP JS LINK---->  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 

</body>
</html>