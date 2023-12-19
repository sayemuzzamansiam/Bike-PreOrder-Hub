<?php
include('./include/connect.php');
include('./functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('https://png.pngtree.com/background/20230527/original/pngtree-large-number-of-black-gears-and-gears-in-a-dark-room-picture-image_2766582.jpg') center center fixed; */
            background-size: cover;
        }

        .main-container {
            border: 2px solid #000;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 18px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        button {
            background-color: black;
            color: green;
            border: 2px solid green;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        button.cancel {
            background-color: black;
            color: red;
            border: 2px solid red;
        }
    </style>
</head>
<body>

<?php
// Get user_id using user_ip
$ip = getIPAddress();
$get_user = "SELECT user_id, user_email FROM user_table WHERE user_ip = '$ip'";
$result = mysqli_query($conn, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];
$user_email = $run_query['user_email'];

// Get product_ids 
$product_ids_query = "SELECT product_id FROM cart_details WHERE user_ip = '$ip'";
$product_ids_result = mysqli_query($conn, $product_ids_query);

// Initialize the product_ids array
$product_ids = array();

while ($row = mysqli_fetch_array($product_ids_result)) {
    $product_ids[] = $row['product_id'];
}

?>

<div class="main-container">
    <h2>Please Confirm Your Order </h2>

    <form action="confirm_order.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="user_email" value="<?php echo $user_email; ?>">

        <?php
        // Loop through the product_ids in the cart
        foreach ($product_ids as $product_id) {
            
            $product_title_query = "SELECT product_title FROM products WHERE product_id = '$product_id'";
            $product_title_result = mysqli_query($conn, $product_title_query);
            $product_title_row = mysqli_fetch_array($product_title_result);
            $product_title = $product_title_row['product_title'];
            ?>

            
            <input type="hidden" name="product_ids[]" value="<?php echo $product_id; ?>">
            <input type="hidden" name="product_titles[]" value="<?php echo $product_title; ?>">

        <?php } ?>

        <!-- Button to Confirm Order -->
        <button type="submit" name="confirm_order">Confirm Order</button>
    </form>

    <form action="cart.php?" method="post">
        <button type="submit" class="cancel">Cancel Order</button>
    </form>
</div>

</body>
</html>

<?php
// Check if the user is logged in
if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
    header("Location: ./users/user_login.php");
    exit();
}
?>
