
<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: alogin.php");
    exit();
}

if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: alogin.php");
  exit();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashbord</title>

  <!-- Bootstrap Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

  
  <!-- Front Awsome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />




  <!-- Css Link -->
  <link rel="stylesheet" href="../style.css">
  <!-- CSS -->
  <style>
    .admin_img{
  width: 100px;
  object-fit: contain;
 }

 #bike {
  background-image: url('../images/logo.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
} 

  </style>
  
</head>


<body>


  <!-- Navbar --> 
  <div class="container-fluid p-0">
    <!-- First Child -->

     <nav class="navbar navbar-expand-lg navbar-light navbar-light" style ="background-color: Dark;">
      <div class="container-fluid">
          <img src="../images/logo1.png" alt="" class="logo">
          <h1 class="text-center p-2"> Admin Panel </h1>

        <nav class="navbar navbar-expand-lg ">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="" class="nav-link">  </a>
            </li>        
          </ul>
        </nav>
      </div>
     </nav>

  <!--Second Child--> 

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link text-white " href="#"><b>Welcome Admin</b></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="#"><b></b></a>
      </li>
    </ul>
  </div>

       <div class="bg-dark d-flex justify-content-between align-items-center">
      
      <a href="?logout" class="nav-link text-white bg-dark"><b>Logout</a>
    </div>

</div>

</nav>


  <!-- Third Child  -->
  <div class="row"> 
    <div class="col md-12 bg-secondary p-0 d-flex align-items-center">

      <div class="px-4 mt-4">
        <a href="#"> <img src="../images/admin.png" alt="" class="admin_img"></a>
        <p class="text-light text-center">Admin</p>
      </div>

      <div class="button text-center"> 
        <button class ="mx-2"><a href="add_product.php" class="nav-link text-light bg-info my-1">Add Product</a></button>
       
        <button class ="mx-2"><a href="view_product.php" class="nav-link text-light bg-info my-1"> View Product</a></button>
        
        <button class ="mx-2"><a href="index.php?add_brand" class="nav-link text-light bg-info my-1">Add Brands</a></button>
        
        <button class ="mx-2"><a href="view_brands.php" class="nav-link text-light bg-info my-1">View Brands</a></button>
        
        <button class ="mx-2"><a href="index.php?add_category" class="nav-link text-light bg-info my-1">Add Categories</a></button>
        
        <button class ="mx-2"><a href="view_category.php" class="nav-link text-light bg-info my-1">View Categories</a></button>
       
        <button class ="mx-2"><a href="check_order.php" class="nav-link text-light bg-info my-1">Order</a></button>
        
        <button class ="mx-2"><a href="user.php" class="nav-link text-light bg-info my-1">Users</a></button>
            
      </div>

    </div>
  </div>


  <!-- Forth Child -->
  
  <div class="container my-5" > 

    <?php 
    if(isset($_GET['add_category'])){
      include('add_categories.php');
    }

    if(isset($_GET['add_brand'])){
      include('add_brand.php');
    } 

    ?>
  </div>

</div>

<div class="container">
  <div class="row">
    
    <div class="col">
    <img src="../images/logo1.png" alt="" height="200px" width="200px"> 
    </div>
    <div class="col">
    <img src="../images/logo1.png" alt="" height="200px" width="200px" > 
    </div>
  </div>
</div>

<!-- Last Child -->
<?php 

include('../include/footer.php'); 
?>