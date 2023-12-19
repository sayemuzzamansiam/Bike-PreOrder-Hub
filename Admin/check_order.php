<?php

include('../include/connect.php');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM user_orders";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Order Date</th>
            <th>Action</th>
        </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['order_id']}</td>
            <td>{$row['user_id']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['user_email']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}</td>          
            <td>{$row['order_date']}</td>
            <td><a href='delete_order.php?order_id={$row['order_id']}'>Delete</a></td>
           
            
        </tr>";
    }

    echo "</table>";
} else {
    echo "No Order found.";
}

echo '<a href="index.php">Go to Home Page</a>'; // Home page button

mysqli_close($conn);
?>