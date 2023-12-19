<?php

include('../include/connect.php');

if (isset($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id'];

   
    $delete_query = "DELETE FROM brands WHERE brand_id = '$brand_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        
        echo"<script>alert('Brand deleted successfully.')</script>";
        echo "<script>window.open('view_brands.php', '_self')</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid user ID.";
}

// Close the database connection
mysqli_close($conn);
?>
