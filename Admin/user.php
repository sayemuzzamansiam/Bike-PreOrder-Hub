<?php

include('../include/connect.php');


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM user_table";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
        <tr>
            <th>user id  </th>
            <th>user name </th>
            <th>user email </th>          
            <th>user address</th>
            <th>user mobile </th>
            <th>Action</th>

            
        </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['user_id']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['user_email']}</td>
            <td>{$row['user_address']}</td>
            <td>{$row['user_mobile']}</td>
            <td><a href='delete_user.php?user_id={$row['user_id']}'>Delete</a></td>

            
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