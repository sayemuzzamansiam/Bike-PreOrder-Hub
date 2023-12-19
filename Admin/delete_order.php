<?php

include('../include/connect.php');

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    
    $delete_query = "DELETE FROM user_orders WHERE order_id = '$order_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        
        echo"<script>alert('Order deleted.')</script>";
        echo "<script>window.open('check_order.php', '_self')</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid user ID.";
}

// Close the database connection
mysqli_close($conn);
?>
