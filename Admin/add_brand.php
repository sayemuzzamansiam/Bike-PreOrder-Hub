
<div class="container my-5"> 
<h2 class="text-dark text-center"> Add New Brands</h2>

<form action="" method="post" class="mb-1">

<div class="input-group w-90 mb-2 ">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"> </i></span>
  <input type="text" class="form-control" placeholder="Add Brands" name="brand_title" aria-label="brands" 
  aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 ">
  
  <input type="submit" class="text-white bg-dark p-2 border-1 my-2" name="add_brand" value="Add Brands" >
  
</div>

</form>
</div>


<?php
include('../include/connect.php'); 

if(isset($_POST['add_brand'])){
  $brand_title = $_POST['brand_title'];

  // Trim the input to remove leading and trailing whitespaces
  $brand_title = trim($brand_title);

  
  if (!empty($brand_title)) {
    
    $check_query = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
    $result_check = mysqli_query($conn, $check_query);
    $number = mysqli_num_rows($result_check);

    if($number > 0){
      echo "<script>alert('This Brand Already Exists')</script>";
    } else {
      
      $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";

     
      if(mysqli_query($conn, $insert_query)){
        echo "Brand added successfully!";
         echo "<script>alert('Brand title cannot be empty')</script>";
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }
  } else {
    echo "<script>alert('Brand title cannot be empty')</script>";
  }
}
?>
