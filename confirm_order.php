<?php
include('./include/connect.php');
include('./functions/common_function.php');
session_start();


if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
    
    header("Location: ./users/user_login.php");
    exit();
}


if (isset($_POST['confirm_order'])) {
    
    $user_id = $_POST['user_id'];
    $user_email = $_POST['user_email'];
    $user_name = $_SESSION['user_name'];

    
    $product_ids = $_POST['product_ids'];
    $product_titles = $_POST['product_titles'];

   
    for ($i = 0; $i < count($product_ids); $i++) {
        $product_id = $product_ids[$i];
        $product_title = $product_titles[$i];

        
        $sql = "INSERT INTO user_orders (user_id, user_name, user_email, product_id, product_title) 
                VALUES ('$user_id', '$user_name', '$user_email', '$product_id', '$product_title')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            exit(); 
        }
    }

    
    echo"<script>alert('Order confirmed successfully!')</script>";
    echo"<script>window.open('./index.php','_self')</script>";
}
?>
