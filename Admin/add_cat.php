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
 .footer{
  
  width:100%;
  bottom:0;
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
              <a href="" class="nav-link"> Welcome </a>
            </li>        
          </ul>
        </nav>
      </div>
     </nav>


  <!-- Second Child -->
  

    <div class="bg-dark d-flex justify-content-between align-items-center">
      <h3 class="text-white text-center p-2">Admin Dashboard</h3>
      <button class="mx-2"><a href="" class="nav-link text-dark bg-white">Log-out</a></button>
    </div>




  <!-- Third Child  -->
  <div class="row"> 
    <div class="col md-12 bg-secondary p-1 d-flex align-items-center">

      <div class="p-4">
        <a href="#"> <img src="../images/admin.png" alt="" class="admin_img"></a>
        <p class="text-light text-center">Admin Name</p>
      </div>

      <div class="button text-center"> 
        <button class ="mx-2"><a href="" class="nav-link text-light bg-info my-1">Add Product</a></button>
        <button class ="mx-2"><a href="" class="nav-link text-light bg-info my-1"> View Product</a></button>
        <button class ="mx-2"><a href="" class="nav-link text-light bg-info my-1">Add Brands</a></button>
        <button class ="mx-2"><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
        <button class ="mx-2"><a href="index.php?add_category" class="nav-link text-light bg-info my-1">Add Categories</a></button>
        <button class ="mx-2"><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
        <button class ="mx-2"><a href="" class="nav-link text-light bg-info my-1">Order</a></button>
        <button class ="mx-2"><a href="" class="nav-link text-light bg-info my-1">Payments</a></button>
        <button class ="mx-2"><a href="" class="nav-link text-light bg-info my-1">Users</a></button>
            
      </div>

    </div>
  </div>


  <!-- Forth Child -->
  <div class="container my-5 "> 

    <?php 
    
      include('add_categories.php');
    
    ?>
  </div>
  

  <!-- Last Child -->
  <div class="bg-dark p-2 text-center footer">
    <h1 class ="text-white"> About Us</h1><br>
    <p class="text-white"> We are the Largest Bike Showroom in Bangladesh </p>
  </div> 

</div>
  




<!-- Bootstrap JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>