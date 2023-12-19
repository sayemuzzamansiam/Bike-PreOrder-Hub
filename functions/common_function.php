<?php

//geeting Products
function getproducts(){
      global $conn;

      // condition to check isset or not

      if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
      

      $query= "SELECT * FROM products order by rand() limit 0,6";
            $result=mysqli_query($conn,$query);
           
            while($row=mysqli_fetch_assoc($result)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_price =$row['product_price'];
              $product_description=$row['product_description'];
              $product_price = $row['product_price'];
              $brand_id=$row['brand_id'];
              $cat_id=$row['cat_id'];
              
              $product_image1=$row['product_image1'];
              
              
              echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $product_title</h5>
                      <h6 class='card-text'>Price: $product_price</h6>
                      <p class='card-text'>$product_description</p>
  
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'> Add to Cart </a>

                        <a  href='index.php' class='btn btn-dark '>See More</a>
                        
       
                  </div>
     
              </div>
            </div>";
            }
}
}
}

//get unique Cat

function get_unique_cat(){
      global $conn;

      // condition to check isset or not

      if(isset($_GET['category'])){
            $cat_id=$_GET['category'];
      

      $query= "SELECT * FROM products where cat_id=$cat_id";
            $result=mysqli_query($conn,$query);

                  $num=mysqli_num_rows($result);
                  if($num==0){
                        echo"<h2 class='text-center text-danger'> Not Available Right Now!!</h2>";
                  }


            // $row=mysqli_fetch_assoc($result);
            while($row=mysqli_fetch_assoc($result)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_price =$row['product_price'];
              $product_description=$row['product_description'];
              $brand_id=$row['brand_id'];
              $cat_id=$row['cat_id'];
              $product_image1=$row['product_image1'];
              
              
              echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <h6 class='card-text'>Price: $product_price</h6>
                      <p class='card-text'>$product_description</p>
  
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a  href='product_details.php?product_id=$product_id' class='btn btn-dark '>See More</a>
                       
       
                  </div>
     
              </div>
            </div>";
            }
}
}

//Unique Brand


function get_unique_brands(){
      global $conn;

      // condition to check isset or not

      if(isset($_GET['brand'])){
            $brand_id=$_GET['brand'];
      

      $query= "SELECT * FROM products where brand_id=$brand_id";
            $result=mysqli_query($conn,$query);

                  $num=mysqli_num_rows($result);
                  if($num==0){
                        echo"<h2 class='text-center text-danger'> Thid Brand Is Not Available Right Now!! </h2>";
                  }


            // $row=mysqli_fetch_assoc($result);
            while($row=mysqli_fetch_assoc($result)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_price =$row['product_price'];
              $product_description=$row['product_description'];
              $brand_id=$row['brand_id'];
              $cat_id=$row['cat_id'];
              $product_image1=$row['product_image1'];
              
              
              echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <h6 class='card-text'>Price: $product_price</h6>
                      <p class='card-text'>$product_description</p>
  
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a  href='product_details.php?product_id=$product_id' class='btn btn-dark '>See More</a>
                        
       
                  </div>
     
              </div>
            </div>";
            }
}
}



//Get  Brands - brand function

function getbrands(){
      global $conn;
      $select_brands="SELECT * FROM brands ";
      $result=mysqli_query($conn,$select_brands);
      // $row_data=mysqli_fetch_assoc($result);
      while( $row_data=mysqli_fetch_assoc($result)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];
        echo"<li><a class='dropdown-item' href='index.php?brand=$brand_id'>$brand_title</a></li>";

      }
}

// Get Category func

function getcategory(){
      global $conn;
      $select_cat="SELECT * FROM categories ";
                $result=mysqli_query($conn,$select_cat);
                // $row_data=mysqli_fetch_assoc($result);
                while( $row_data=mysqli_fetch_assoc($result)){
                  $cat_title=$row_data['cat_title'];
                  $cat_id=$row_data['cat_id'];
                  echo"<li><a class='dropdown-item' href='index.php?category=$cat_id'>$cat_title</a></li>";

                }
}





// get ip address function 
function getIPAddress() {
//whether ip is from the share internet 


if(!empty($_SERVER['HTTP_CLIENT_IP'])) {

           $ip = $_SERVER['HTTP_CLIENT_IP'];
}

//whether ip is from the proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
            
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

//whether ip is from the remote address

else{
      $ip = $_SERVER['REMOTE_ADDR'];
}
return $ip;
// $ip = getIPAddress();
//echo 'User IP ADD -'.$ip; 

}



//cart function 


function cart(){
  if(isset($_GET['add_to_cart'])){
    global $conn;
    $ip = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];

    echo "this is product id".$get_product_id;

    $select_query = "SELECT * FROM cart_details WHERE product_id = $get_product_id AND user_ip = '$ip'";
    $result = mysqli_query($conn, $select_query);

    $num = mysqli_num_rows($result);

    if($num > 0){
      echo "<script>alert('This item is already inside the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else {
      $insert_query = "INSERT INTO cart_details (product_id, user_ip, quantity) 
                       VALUES ($get_product_id, '$ip', 1)";

      $result = mysqli_query($conn, $insert_query);

      if($result){
        echo "<script>alert('Item is added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      } else {
        echo "<script>alert('Failed to add item to cart')</script>";
      }
    }
  }
  
}

//cart item num func
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $conn;
    $ip = getIPAddress();

    $select_query = "SELECT * FROM cart_details WHERE user_ip = '$ip'";
    $result = mysqli_query($conn, $select_query);

    $num = mysqli_num_rows($result);

  }
    else {
      global $conn;
      $ip = getIPAddress();
  
      $select_query = "SELECT * FROM cart_details WHERE user_ip = '$ip'";
      $result = mysqli_query($conn, $select_query);
  
      $num = mysqli_num_rows($result);
    }
    echo $num;
  }


//total price func


function total_price(){
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
      $product_value = array_sum($product_price);
      $total_price+=$product_value;

    }

  }
  echo $total_price;


}




//searching product func

function search_product(){
      global $conn;
      if(isset($_GET['search_data_product'])){
            $search_data_value=$_GET['search_data'];
      $search_query="SELECT * FROM products where product_keyword like '%$search_data_value%'";

      // condition to check isset or not

      
      

      $query= "SELECT * FROM products order by rand() limit 0,6";
            $result=mysqli_query($conn,$search_query);
            // $row=mysqli_fetch_assoc($result);

            $num=mysqli_num_rows($result);
            if($num==0){
                  echo"<h2 class='text-center text-danger'> This section is empty !!</h2>";
            }

            while($row=mysqli_fetch_assoc($result)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_price =$row['product_price'];
              $brand_id=$row['brand_id'];
              $cat_id=$row['cat_id'];
              $product_image1=$row['product_image1'];
              
              
              echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <h6 class='card-text'>Price: $product_price</h6>
                      <p class='card-text'>$product_description</p>
  
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a  href='product_details.php?product_id=$product_id' class='btn btn-dark '>See More</a>
                        
       
                  </div>
     
              </div>
            </div>";
            }
}
}

//view details func:
function view_details(){
      
            global $conn;
      
            // condition to check isset or not


            if(!isset($_GET['product_id'])){
            if(!isset($_GET['category'])){
                  if(!isset($_GET['brand'])){

             $product_id=$_GET['product_id'];
      
            $query= "SELECT * FROM products where product_id=$product_id";
                  $result=mysqli_query($conn,$query);
                  
                  while($row=mysqli_fetch_assoc($result)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $brand_id=$row['brand_id'];
                    $cat_id=$row['cat_id'];
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];

                    $product_image3=$row['product_image3'];

                    
                    
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                      <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <h6 class='card-text'>Price: $product_price</h6>
                            <p class='card-text'>$product_description</p>
        
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                              <a  href='product_details.php?product_id=$product_id' class='btn btn-dark '>See More</a>
                              
             
                        </div>
           
                    </div>
                  </div>
                  
                  <div class='col-md-8'>
          <!-- Related Cards -->
          <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center mb-5 text-danger'>Releted Products</h4>
            </div>

            <div class='col-md-6'>
            <img src='images/logo.png' class='card-img-top' alt='$product_title'>
            </div>

            <div class='col-md-6'>
            <img src='images/logo.png' class='card-img-top' alt='$product_title'>
            </div>

          </div>

        </div>";
                  }
           }
      }
    }
}


?>