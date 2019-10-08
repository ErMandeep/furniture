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
				<li style="float: left;"> <a href="changepass.php" style="display: block;color: #222222;text-align: center;padding: 16px;text-decoration: none;">Change Password  </a></li>
				<li style="float: left;"><a href="#" style="display: block;color:#222222;text-align: center;padding: 16px;text-decoration: none;"> Change Adreess </a></li>
			
				<li style="float: left;"><a href="logout.php" onclick="return confirm('Are you sure to logout?');" style="display: block;color:#222222;text-align: center;padding: 16px;text-decoration: none;"> Log out </a></li>
				<!-- <a href="logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a> -->
			</ul>
		</div>
	</div>
</div>
	<!-- </form> -->


		

					<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class=" m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart" >
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th></th>
									<th >Product</th>
									<th >product Name</th>
									<th >Quantity</th>
									<th> Transaction id</th>
									<th >Dates</th>
									
									<th >Total</th>


								</tr>

								<tr class="table_row">
									<td> </td>
									<td>
										<div class="how-itemcart1">
											<img src="images/chair5.2.jpg" alt="IMG">
										</div>
									</td>

									<td> Test name</td>	
									<td>
										<div>
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="1" style="height: 40px; width: 40px;">
										</div>
									</td>
									<td> #3746923579856 </td>
									<td> 11/12/2018 </td>
									<td>$ 36.00</td>
								</tr>

								

								
								
								

								
							</table>


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
								Checkout
							</button>
						</div>
				</div>
				
			</div> -->
		</div>
	</form>

	<!-- Footer -->
	
<?php include 'includes/footer.php'; ?>





