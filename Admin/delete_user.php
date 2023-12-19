<?php

include('../include/connect.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Delete the user with the specified user_id
    $delete_query = "DELETE FROM user_table WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
    
        
        echo"<script>alert('User deleted successfully.')</script>";
        echo "<script>window.open('user.php', '_self')</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid user ID.";
}

// Close the database connection
mysqli_close($conn);
?>
