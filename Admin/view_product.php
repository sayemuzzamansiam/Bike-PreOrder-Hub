<?php

include('../include/connect.php');


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Description</th>
            <th>Product Keywords</th>
            <th>Product Price</th>
            <th>Date</th>
            <th>Action</th>

        </tr>";

    // Loop through the rows and display data in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_description']}</td>
            <td>{$row['product_keyword']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['date']}</td>
            <td><a href='delete_product.php?product_id={$row['product_id']}'>Delete</a></td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No products found.";
}
echo '<a href="index.php">Go to Home Page</a>'; // Home page button

// Close the database connection
mysqli_close($conn);
?>