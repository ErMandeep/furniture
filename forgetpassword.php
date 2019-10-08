<?php include 'includes/header.php'; ?>
<?php 
if(isset($_SESSION['user_name'])){
    header("location: index.php");
}
 ?>

<!-- form-->

<!-- form -->
<div class="form">
      
      <!-- <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul> -->
      
      <div class="tab-content">
        <div id="signup">   
          <h1><a href="register.php" style="color: #616161;">Reset Password</a></h1>

<form action="" method="post">
          
           <div class="field-wrap">
            <label>
              <!-- <span class="req">*</span> -->
            </label>
            <input type="email" name="email" placeholder="Email Address" required /><?php echo $err; ?>
           </div>
          
          <button type="submit" name="forgot-password" class="button button-block"/>Reset</button>
          
          </form>

<?php 
// if(!empty($_POST["forgot-password"])){
if(isset($_POST["forgot-password"])){

$err ="";    
$email = $_POST["email"];

$sql = "Select * from user WHERE email= '$email'";
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result)==1){

$password_key = md5(rand(1000000,99999999));

$sql = "Update user set password_key ='$password_key' where email ='$email' ";
$result = mysqli_query($connection,$sql);

require_once("includes/forgot-password-recovery-mail.php");

echo $success_message;

} else {

    $err = 'No User Found';

}

}

 ?>
         

        </div>
        
        <div id="login">   
          <!-- <h1>Welcome to our site</h1> -->
          
          

        </div>
        
      </div><!-- tab-content -->
      
</div> 

<!-- form-->
<?php 
//candidate Login Query
if(isset($_POST['login'])){
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $connection->query($sql);

    

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $password = $row['password'];
            if($row['password'] == $txtpassword){
                $_SESSION['user_name'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                $login_id = $_SESSION['id'];
                // echo $_SESSION['user_name'];

                if($login_id){
                  header('Location: index.php');
                }
            } else {
                $username = $row['email'];
                $useremail = "<center><h4>".$username."</h4></center>";
                $passwordErr = '<div class="alert alert-warning">
                        <strong> Wrong Password!</strong>
                        </div>';
                
                     
            }
        }
    } else {
        $useremailErr = '<div class="alert alert-danger">
  <strong>Username</strong> Not Found.
</div>';
        $username = "";
    }
}

 ?>


<!-- form-->


		

	<!-- Footer -->

<?php include 'includes/footer.php'; ?>