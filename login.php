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
          <h1><a href="register.php" style="color: #616161;">Not a Member Sign up for Free</a></h1>

<form action="" method="post">
          
           <div class="field-wrap">
            <label>
              <!-- <span class="req">*</span> -->
            </label>
            <input type="email" name="email" placeholder="Email Address" required autocomplete=""/><?php echo $useremailErr; ?>
            <?php echo $useremail; ?>
           </div>
          <div class="field-wrap">
            <label>
              <!-- <span class="req">*</span> -->
            </label>
            <input type="password" name="txtpassword" placeholder="Password" required autocomplete=""/><?php echo $passwordErr; ?>
          </div>
          
          <p class="forgot"><a href="forgetpassword.php" style="color: #616161;">Forgot Password?</a></p>
          
          <button type="submit" name="login" class="button button-block"/>LOG IN</button>
          
          </form>

         

        </div>
        
        <div id="login">   
          <!-- <h1>Welcome to our site</h1> -->
          
          

        </div>
        
      </div><!-- tab-content -->
      
</div> 

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
           echo '<script> alert("Wrong Password!");</script>';
                     
            }
        }
    } else {
        $useremailErr = '<div class="alert alert-danger">
  <strong>Username</strong> Not Found.
</div>';
        $username = "";
         echo '<script> alert("Username Not Found");</script>';
    }
}

 ?><!-- form-->

	<!-- Footer -->

<?php include 'includes/footer.php'; ?>