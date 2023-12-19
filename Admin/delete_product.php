<?php

include('../include/connect.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

   
    $delete_query = "DELETE FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        
        echo"<script>alert('Product deleted successfully')</script>";
        echo "<script>window.open('view_product.php', '_self')</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid user ID.";
}

// Close the database connection
mysqli_close($conn);
?>
