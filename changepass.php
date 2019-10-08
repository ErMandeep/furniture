<?php include 'includes/header.php'; ?>
<?php 
if(empty($_SESSION['user_name'])){
    header("location:login.php");
}
 ?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg" style="padding-left: 0px">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		<!-- <form method="post"> -->
<div class="container">
	<div class="row">
		<div class="col-12">
		<h3 style="padding-bottom: 25px;padding-top: 25px;"> Your Account	</h3>
			<ul style="list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #f7f7f7;">
				<li style="float: left;"> <a href="#" style="display: block;color: #222222;text-align: center;padding: 16px;text-decoration: none;">Change Password  </a></li>
				<li style="float: left;"><a href="#" style="display: block;color:#222222;text-align: center;padding: 16px;text-decoration: none;"> Change Adreess </a></li>
				<li style="float: left;"><a href="logout.php" onclick="return confirm('Are you sure to logout?');" style="display: block;color:#222222;text-align: center;padding: 16px;text-decoration: none;"> Log out </a></li>
			</ul>
		</div>
	</div>
</div>
	<!-- </form> -->


		

					<!-- Shoping Cart -->
	<!-- <form class="bg0 p-t-75 p-b-85"> -->
		<div class="container">
			<div class="row">
				<div class="col-3">
				</div>
				<div class="col-6">
					<div class=" m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart" >
							<div id="signup">   
          <!-- <h1><a href="register.php" style="color: #616161;">Not a Member Sign up for Free</a></h1> -->

<form action="" method="post">
          <?php change_vender_password(); ?> 
           <div class="field-wrap">
            <label>
              <!-- <span class="req">*</span> -->
            </label>
            <input type="password" name="oldpassword" placeholder="Current Password" required autocomplete="off"/>
           </div>
          
          <div class="field-wrap">
            <label>
              <!-- <span class="req">*</span> -->
            </label>
            <input type="password" name="newpassword" placeholder="New Password" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              <!-- <span class="req">*</span> -->
            </label>
            <input type="password" name="confirmnewpassword" placeholder="Confirm Password" required autocomplete="off"/>
          </div>
          

          
          <button type="submit" name="update_psss" class="button button-block"/>Change Password</button>
          
          </form>

         

        </div>

						</div>
						
					</div>
				</div>
				

				
			</div>
<!-- 			<div class="row">
				<div class="col-sm-4">
						<div>
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04" style="margin-left: 40px; margin-top: 10px">
								Back to Cart
							</button>
						</div>
				</div>
				<div class="col-sm-4">
					
				</div>
				<div class="col-sm-4">
						<div>
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04" style="float: right; margin-top: 10px">
								Change Password
							</button>
						</div>
				</div>
				
			</div> -->
		</div>
	<!-- </form> -->

	<!-- Footer -->
	
<?php include 'includes/footer.php'; ?>

  <!--Logout Modal -->
    <div id="logout" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">3
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Logout</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                    <div class="alert alert-danger">Are you Sure you want to logout
                        <strong>
                            <?php echo $_SESSION['user_name']; ?>?
                        </strong>
                    </div>
                    <div class="modal-footer">
                        <a href="logout.php">
                            <button type="button" class="btn btn-danger">YES </button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



