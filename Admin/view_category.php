<?php

include('../include/connect.php');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
        <tr>
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Action</th>
        </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['cat_id']}</td>
            <td>{$row['cat_title']}</td>
            <td><a href='delete_cat.php?cat_id={$row['cat_id']}'>Delete</a></td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No brands found.";
}
echo '<a href="index.php">Go to Home Page</a>'; // Home page button


mysqli_close($conn);
?>
