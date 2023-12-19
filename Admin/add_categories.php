

<div class="container my-5"> 
  <h2 class="text-dark text-center"> Add New Categories</h2>
  <form action="" method="post" class="mb-1">
    <div class="input-group w-90 mb-2">
      <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
      <input type="text" class="form-control" placeholder="Add Categories" name="cat_title" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
      <button type="submit" class="bg-dark text-white p-2 border-1 my-2" name="add_cat">Add Categories</button>
    </div>
  </form>
</div>


<?php
include('../include/connect.php'); 

if(isset($_POST['add_cat'])){
  $cat_title = $_POST['cat_title'];

  // Create the SQL query
  $query = "SELECT * FROM categories where cat_title='$cat_title'";
  $result_select=mysqli_query($conn,$query);

  $number=mysqli_num_rows($result_select);

  if($number>0){
    echo"<script>alert('This Category Already Exist')</script>";

  }
  else{
    $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";

      // Execute the query
  if(mysqli_query($conn, $query)){
    echo "Category added successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  }
}

?>