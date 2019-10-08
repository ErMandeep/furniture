<?php include 'includes/header.php'; ?>


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
            <!-- <input type="email" name="email" placeholder="Email Address" required /><?php echo $err; ?> -->

  <?php

if($_GET['key'])
{
  $password_key=$_GET['key'];
  // $email=$_GET['reset'];
  $sql = "select * from user where password_key='$password_key'";

  $select=mysqli_query($connection,$sql);

  if(mysqli_num_rows($select)==1)



  {
    ?>
          <form method="post">
          <div class="forgot-form">
          <div class="form-group">
          <!-- <label class="control-label" for="email">Enter New Password</label> -->
          <input id="txtPassword" type="password" name="password" placeholder="Enter New Password" class="form-control" required>
          </div>
          <div class="form-group">
          <!-- <label class="control-label" for="email">Confirm Password</label> -->
          <input id="txtConfirmPassword" type="password" name="password" placeholder="Confirm Password" class="form-control" required>
          </div>
          <button type="submit" name="submit_password" id="btnSubmit" class="button button-block">Get New Password</button>
          </div>
          </form>
    <?php
  }else{
      


  }
}
?>


                            
  <?php
  if(isset($_POST['submit_password']))
  {
  $pass=md5($_POST['password']);
  $show_pass = $_POST['password'];

  // $select=mysqli_query($connection, "update users set password='$pass' where email='$email'");
  $sql = "Update user set password ='$pass' where password_key='$password_key' ";
  $result = mysqli_query($connection,$sql);

  if($result){
  // header('Location: password_change_success.php');
  header('Location: password_change_success.php?success='.urlencode($current_id['id']));

  }else
  {
  echo "Your password not change";
  }


  }
  ?>       


           </div>
          
          <!-- <button type="submit" name="forgot-password" class="button button-block"/>Reset</button> -->
          
          </form>


         

        </div>
        
        <div id="login">   
          <!-- <h1>Welcome to our site</h1> -->
          
          

        </div>
        
      </div><!-- tab-content -->
      
</div> 




<!-- form-->


		

	<!-- Footer -->
    <script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
<?php include 'includes/footer.php'; ?>