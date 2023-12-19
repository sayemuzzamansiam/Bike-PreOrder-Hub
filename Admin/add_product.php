
<?php 
   include('../include/connect.php');
  //  include('../functions/common_function.php');

  if(isset($_POST['add_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_brands=$_POST['product_brands'];
    $product_category=$_POST['product_category'];
    
    $product_price=$_POST['product_price'];
    $product_status='true';


    //images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //tmp img

   $product_image1_tmp=$_FILES['product_image1']['tmp_name'];
    $product_image2_tmp=$_FILES['product_image2']['tmp_name'];
    $product_image3_tmp=$_FILES['product_image3']['tmp_name'];

    //check empty condition
    if($product_title == '' || $product_description == '' || $product_keyword == '' || $product_brands == '' 
    || $product_category == '' || $product_price == '' ||  $product_image1 == '' ||  $product_image2 == '' ||
    $product_image3 == '' ){
      echo"<script>alert('Fill all the fields')</script>";
      exit();

    } 
    else{
      move_uploaded_file($product_image1_tmp,"./product_images/$product_image1");
      move_uploaded_file($product_image2_tmp,"./product_images/$product_image2");

      move_uploaded_file($product_image3_tmp,"./product_images/$product_image3");

      //add query
    $product_keyword=$_POST['product_keyword'];
      $add_products= "INSERT INTO products (product_title,product_description,product_keyword,brand_id,cat_id,
      product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$product_description',
      '$product_keyword',$product_brands,$product_category,'$product_image1','$product_image2','$product_image3',
      '$product_price',NOW(),'$product_status')";

      $result_query=mysqli_query($conn,$add_products);
      if($result_query){
        echo"<script>alert('Successfully added')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }

    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Products</title>

    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <!-- Front Awsome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Css Link -->
  <link rel="stylesheet" href="../style.css">

</head>

<body class="bg-light">
  <div class="container mt-3">
    <h1 class="text-center text-dark"> Add Products</h1>

    <!-- Form -->
    <form action="" method="post" enctype="multipart/form-data">
 
    <!-- Title -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_title" class="form-label"> Product Title</label>
        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" 
              autocomplete="off" required="required">
      </div>

      <!-- Product Description -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_description" class="form-label"> Product Description</label>
        <input type="text" name="product_description" id="product_description" class="form-control" placeholder=" Product Description" 
              autocomplete="off" required="required">
      </div>

      <!-- Keyword -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_keyword" class="form-label"> Product Keyword</label>
        <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product keyword" 
              autocomplete="off" required="required">
      </div>

            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_brands" id="" class="form-select">
          <option value=""> Select a Brand</option>

          <?php 

              // Create the SQL query
                $query = "SELECT * FROM brands ";
                $result_select=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result_select)){
                  $brand_title=$row['brand_title'];
                      $brand_id=$row['brand_id'];
                      echo" <option value='$brand_id'> $brand_title </option>";
                }
              ?>


        </select>
      </div>

      <!-- categories -->
      <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_category" id="" class="form-select">
          <option value=""> Select a Category</option>
          <?php 

          // Create the SQL query
            $query = "SELECT * FROM categories ";
            $result_select=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($result_select)){
              $cat_title=$row['cat_title'];
                  $cat_id=$row['cat_id'];
                  echo" <option value='$cat_id'> $cat_title </option>";
            }
          ?>
        </select>
      </div>



      <!-- image 1 -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image1" class="form-label"> Product image 1</label>
        <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
      </div>

      <!-- image 2 -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image2" class="form-label"> Product image 2</label>
        <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
      </div>

      <!-- image 3 -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_image3" class="form-labe3"> Product image 3</label>
        <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
      </div>

      <!-- price -->
      <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_price" class="form-label"> Product Price</label>
        <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" 
              autocomplete="off" required="required">
      </div>

       <!-- button -->
       <div class="form-outline mb-4 w-50 m-auto">
       <input type="submit" value="Add Product" class="btn-dark mb-3 p-2 text-white" name="add_product">
      </div>

    </form>

  </div>
  
</body>
</html>