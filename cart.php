
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
  <title>BikeMaster-Cart</title>

  <!-- Boostrap Css Link -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <!-- Front Awsome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Css File --> 
<link rel="stylesheet" href="style.css">

<style>
.cart_img{
  width: 150px;
  height: 90px;
  object-fit:contain;
}

</style>

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
<div class="bg-light md-3">
<h3 class="text-center"> Bike Monster</h3>
<p class="text-center md-3"> Your Favourite Bike Store in Bangladesh </p>

</div> 



<!-- Forth Child--> 

  <div class="container">
    <div class="row">
        <form action="" method ="post">

      <table class="table table-bordered text-center ">
        <thead>
          <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Remove</th>
            <th colspan="2">Operations</th>
          </tr>
        </thead>
        <tbody>
          
          <!-- php for display dynamic data-->

          <?php
          global $conn;
  $ip = getIPAddress();
  $total_price =0;
  $cart_query = "SELECT * FROM cart_details Where user_ip = '$ip'";
  $result = mysqli_query($conn, $cart_query);

  while($row = mysqli_fetch_array($result)){

    $product_id = $row['product_id'];
    $select_product = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result_product = mysqli_query($conn, $select_product);

    while($row_product_price = mysqli_fetch_array($result_product)){
      $product_price = array($row_product_price['product_price']);
      $price_table = $row_product_price['product_price'];
      $product_title = $row_product_price['product_title'];
      $product_image1 = $row_product_price['product_image1']; 

      $product_value = array_sum($product_price);
      $total_price+=$product_value;
       ?>

        <tr>
          <td><?php echo $product_title?></td>
          <td><img src="./images/<?php echo $product_image1?>" alt="" class="cart_img"></td>


          <td><?php echo $price_table?></td>
          <td><input type="checkbox" name= "removeitem[]" value="<?php echo $product_id ?>"></td>

          <td>
            
            <input  type="submit" value="Remove Cart" class="bg-info px-3 mx-3 py-2" name = "remove_cart">

          </td>
        </tr>
        <?php
            }

          }
        ?>
      </tbody>

      </table>
    
    </div>
  </div>
  </form>

  <!-- test -->
  <div class="d-flex mb-5">
        <h4 class="px-3"> Total Price: <strong><?php echo $total_price?></strong></h4>
        <a href="index.php"><button class="bg-info px-3 mx-3 py-2">Continue shoping</button></a>
        <a href="order.php"><button class="bg-info px-3 py-2">Order</button></a>
      </div>


  
  
      <!-- func to remove item-->
  <?php 
function remove_cart_item(){
    global $conn;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id) {
            echo $remove_id;
            $delete_query = "DELETE FROM `cart_details` WHERE product_id='$remove_id'";
            $run_delete = mysqli_query($conn, $delete_query);

            if($run_delete){
                echo "<script>window.open('cart.php', '_self')</script>";
            }
        }
    }
}

echo $remove_item = remove_cart_item();
?>

<?php 

include('./include/footer.php'); 
?>

