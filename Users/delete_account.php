<?php
session_start();

include('../include/connect.php');
include('../functions/common_function.php');
include('../include/header.php');

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: ../Users/user_login.php");
    exit();
}

if (isset($_POST['confirm_delete'])) {
    // Delete the user account
    $user_name = $_SESSION['user_name'];

    // Perform necessary delete operations in the database
    $delete_query = "DELETE FROM user_table WHERE user_name = '$user_name'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        // Log out the user after successful deletion
        session_destroy();
        echo "<script>alert('Your account has been removed')</script>";
        echo "<script>window.open('../home.php','_self')</script>";
    } else {
        echo "<script>alert('Not removed')</script>";
    }
}
?>

<div class="container mb-5 mx-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card mb-5">
                <div class="card-body mb-5">
                    <h3 class="card-title text-center">Are you sure you want to delete your account?</h3>
                    <form method="post">
                        <div class="text-center mt-4 px-3 mx-3 py-2">
                            <button type="submit" class="btn btn-danger" name="confirm_delete"> Yes </button>
                            <a href="../index.php" class="btn btn-secondary"> No </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../include/footer.php');
?>
