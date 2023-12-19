

<?php 
   include('../include/connect.php');
   include('../functions/common_function.php');
   include('../include/header.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>

    <!-- Boostrap Css Link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
</head>

<body>
  
<div class="container-fluid my-3">
  <tr>
    <td>
      
    </td>
  </tr>

    <h2 class="text-center"> User Registration </h2>

      <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">

          <form action="" method="post" enctype="multipart/form-data">

          <!-- User Name -->
            <div class="form-outline mb-4">
              <label for="user_username" class="form-label"> User Name </label>

              <input type="text" id="user_username" class="form-control" placeholder="write your name" 
              autocomplete="off" required="required" name="user_username"/>
            </div>

            <!-- Email -->
            <div class="form-outline mb-4">
              <label for="user_email" class="form-label"> E-mail </label>

              <input type="email" id="user_email" class="form-control" placeholder="write your email" 
              autocomplete="off" required="required" name="user_email"/>
            </div>

            <!-- Img -->
            <div class="form-outline mb-4">
              <label for="user_image" class="form-label"> Profile Picture </label>

              <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
            </div>

          
            <!-- password -->
            <div class="form-outline mb-4">
              <label for="user_password" class="form-label"> Password </label>

              <input type="password" id="user_password" class="form-control" placeholder="write your password" 
              autocomplete="off" required="required" name="user_password"/>
            </div>

            <!-- Conf password -->
            <div class="form-outline mb-4">
              <label for="conf_user_password" class="form-label"> Confirm Password </label>

              <input type="password" id="conf_user_password" class="form-control" placeholder="confirm your password" 
              autocomplete="off" required="required" name="conf_user_password"/>
            </div>

             <!-- User Address -->
             <div class="form-outline mb-4">
              <label for="user_address" class="form-label"> Address </label>

              <input type="text" id="user_address" class="form-control" placeholder="write your current address" 
              autocomplete="off" required="required" name="user_address"/>
            </div>

            <!-- Contact -->
            <div class="form-outline mb-4">
              <label for="user_contact" class="form-label"> Contact </label>

              <input type="text" id="user_contact" class="form-control" placeholder="write your phone number" 
              autocomplete="off" required="required" name="user_contact"/>
            </div>

            <!-- Button -->
            <div class="text-center">
              <input type="submit" value="Registration" class="bg-dark py-2 px-3 text-white" name="user_register">
              <p class="fw-bold mt-2 pt-1 small"> Already have an account? <a href="user_login.php"> Log-In </a> </p>
              <p class="fw-bold mt-2 pt-1 small"> want to go home? <a href="../home.php"> Home Page </a> </p>

            </div>

          </form>

        </div>
      </div>

</div>

  
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){

 $user_username=$_POST['user_username'];
 $user_email=$_POST['user_email'];  
 $user_password=$_POST['user_password'];
 $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
 $conf_user_password=$_POST['conf_user_password'];
 $user_address=$_POST['user_address'];
 $user_contact=$_POST['user_contact'];
 $user_image=$_FILES['user_image']['name'];
 $user_image_tmp=$_FILES['user_image']['tmp_name'];
 $user_ip=getIPAddress();


// Regex Start 

//regex for username


$regexN = '/^([A-Za-z])+(\s([A-Za-z]+(\s[A-Za-z]+)?)?)?$/';

 
if(preg_match($regexN,$user_username)){
  // echo"Valid Name";
}
else{
   echo"Invalid Name";
}

echo"\n";

//regex for email

 $regexE = '/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i';
 if(preg_match($regexE,$user_email)){
    // echo"Valid Mail";
 }
 else{
     echo"Invalid mail";
 }

 echo"\n";

 //regex for password 

 $regexP = '/^[a-zA-Z0-9]{6,25}$/';
 
 
 if(preg_match($regexP,$user_password)){
     //echo"Valid Password";
 }
 else{
     echo"Invalid Password";
 }
 echo"\n";
 //regex for phn num

$regexM='/^(?:\+?88)?01[3-9]\d{8}$/';
if(preg_match($regexM,$user_contact)){
    //echo"Valid Mobile Number";
}
else{
   // echo"Invalid Mobile Number";
}

echo"\n";



// select query
$select_query="SELECT * FROM user_table where user_name = '$user_username' or user_email='$user_email'";
$result=mysqli_query($conn,$select_query); 

$rows_count=mysqli_num_rows($result);

if($rows_count>0){
  echo"<script>alert('User Name or Email or Both of them Already Exist')</script>";
}

else if($user_password!=$conf_user_password){
  echo"<script>alert('Password Did not match!! Try Again')</script>";
}

else{
  echo"<script>alert('You have successfully Register')</script>";
    echo"<script>window.open('user_login.php','_self')</script>";


  //insert query

 move_uploaded_file($user_image_tmp,"./user_images/$user_image");

 $insert_query= "INSERT INTO user_table (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
 VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";

 $sql_execute = mysqli_query($conn,$insert_query);

}

$_SESSION['user_name']=$user_username;


}
include('../include/footer.php'); 
?>