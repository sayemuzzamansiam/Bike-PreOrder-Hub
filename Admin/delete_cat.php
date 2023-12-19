<?php

include('../include/connect.php');

if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];

    // Delete the categories with the specified price range
    $delete_query = "DELETE FROM categories WHERE cat_id = '$cat_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        
        echo"<script>alert('Categories deleted successfully.')</script>";
        echo "<script>window.open('view_category.php', '_self')</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid user ID.";
}

// Close the database connection
mysqli_close($conn);
?>
