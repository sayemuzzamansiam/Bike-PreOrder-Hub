 
<?php 
   include('./include/connect.php');
  include('./functions/common_function.php');
 session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BikeMaster</title>

  <!-- Boostrap Css Link -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <!-- Front Awsome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Css File --> 
<link rel="stylesheet" href="style.css">



</head>


<body>
  <!-- nav bar -->
<div class="container-fluid p-0"> 

  <!-- first child-->
  <nav class="navbar navbar-expand-lg navbar-light" style ="background-color: Dark;">
  <div class="container-fluid">
    <img src="./images/logo1.png" alt="Logo" class="logo">


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="btn btn-outline-dark" aria-current="page" href="home.php"><b>Home</b></a>

        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php"><b>products</b></a>
        </li>
        


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <b>Brands</b>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

          <!-- Calling Brand Func -->
            <?php
            getbrands();
              
            ?>

          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <b>Price Range</b>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

          <!-- Call Get Category -->
          <?php
          getcategory();

            ?>
           
            
          
          </ul>
        </li>


        <li class="nav-item">
          <a class="nav-link text-dark" href="./Users/user_registration.php"><b>Registration</b></a>
        </li>
        
        <li class="nav-item">
          
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#"><b>Total Price: <?php total_price();?></b></a>
        </li>
      </ul> 

      <ul class="nav-item">
      <a class="nav-link text-dark" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
      </ul>

      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
      </form>
    </div>
  </div>
</nav>


<!-- Second Child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <?php
        if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
          $user_name = $_SESSION['user_name'];
          echo "<a class='nav-link text-white ' href='#'><b>Welcome $user_name </b></a>";

          
        }
        else{
          echo "<a class='nav-link text-white ' href='#'><b> Welcome to Bike Monster </b></a>";
        }
        ?>


        <?php
if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
    echo '<div class="text-left my-2">';
    echo '<a href="Users/delete_account.php" class="btn btn-danger bg-dark">Remove Account</a>';
    echo '</div>';
}
?>



      </li>
      
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php
        if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
          echo "<a class='btn btn-danger bg-dark' href='logout.php'><b> Log Out </b></a>";
        }
        else{
          echo "<a class='btn btn-danger bg-dark' href='./users/user_login.php'><b>Please Log-in </b></a>";
        }
        ?>
      </li>
    </ul>
  </div>
</nav>



<?php
cart();
?>


<!-- Third Child-->
<div class="bg-light">
<h3 class="text-center"> Bike Monster</h3>
<p class="text-center"> Your Favourite Bike Store in Bangladesh </p>

</div>



<!-- Forth Child--> 
<div class="row">
  <div class="col-md-12">

    <!--products-->
        <div class="row">
          <!-- Fetch product -->

          <!-- Func Call -->
          <?php
          getproducts();
          get_unique_cat();
          get_unique_brands();
            

          ?>
     
        </div>

  </div>
</div>


<?php 

include('./include/footer.php'); 

?>

