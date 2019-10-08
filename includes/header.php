<?php ob_start(); ?>
<?php session_start(); ?>
<?php include 'includes/function.php'; ?>
<?php include 'includes/controller.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Furniture</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<!--===================================================================================form==========-->

<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css"> 

<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						
						Call us (+91-9876543210)
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							<?php 
						if(isset($_SESSION['user_name'])){
						    echo $_SESSION['user_name'];
						}
						 ?>
						</a>
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="myaccount.php" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>
						<!--

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
					-->
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php">HOME</a>
								
							</li>

							<li>
								<a href="product.php">DECOR</a>
								<ul class="sub-menu">
								<?php 
								$menu = "SELECT * FROM menu WHERE menu ='menu1'";
								    $menu_select = mysqli_query($connection, $menu);  
								    while($row = mysqli_fetch_assoc($menu_select)){
								          $id = $row['id'];
								          $cat_title = $row['cat_title'];

								 ?>

									<li><a href="category.php?category=<?php echo $cat_title; ?>"><?php echo $cat_title; ?></a></li>

								<?php } ?>
									<!-- <li><a href="product.php">CLOCKS</a></li>
									<li><a href="product.php">MANDIRS</a></li>
									<li><a href="product.php">WALL SHELVES</a></li>
									<li><a href="product.php">SCREENS & DIVIDERS</a></li> -->	
								</ul>
							</li>

							<li>
								<a href="product.php">BEDROOM</a>
								<ul class="sub-menu">
									<?php 
								$menu = "SELECT * FROM menu WHERE menu ='menu2'";
								    $menu_select = mysqli_query($connection, $menu);  
								    while($row = mysqli_fetch_assoc($menu_select)){
								          $id = $row['id'];
								          $cat_title = $row['cat_title'];

								 ?>

									<li><a href="category.php?category=<?php echo $cat_title; ?>"><?php echo $cat_title; ?></a></li>

								<?php } ?>
								</ul>
							</li>

							<li>
								<a href="product.php">LIVING</a>
								<ul class="sub-menu">
									<?php 
								$menu = "SELECT * FROM menu WHERE menu ='menu3'";
								    $menu_select = mysqli_query($connection, $menu);  
								    while($row = mysqli_fetch_assoc($menu_select)){
								          $id = $row['id'];
								          $cat_title = $row['cat_title'];

								 ?>

									<li><a href="category.php?category=<?php echo $cat_title; ?>"><?php echo $cat_title; ?></a></li>

								<?php } ?>

								</ul>
							</li>

							<li>
								<a href="product.php">DINING</a>
								<ul class="sub-menu">
									<?php 
								$menu = "SELECT * FROM menu WHERE menu ='menu4'";
								    $menu_select = mysqli_query($connection, $menu);  
								    while($row = mysqli_fetch_assoc($menu_select)){
								          $id = $row['id'];
								          $cat_title = $row['cat_title'];

								 ?>

									<li><a href="category.php?category=<?php echo $cat_title; ?>"><?php echo $cat_title; ?></a></li>

								<?php } ?>
									
								</ul>
							</li>

							<li>
								<!-- <a href="Product.php">STUDY</a> -->
								<!-- <ul class="sub-menu">
									<li><a href="product.php">STORAGES</a></li>
									<li><a href="product.php">STUDY TABLES</a></li>
									<li><a href="product.php">STUDY CHAIRS</a></li>
									<li><a href="product.php">STUDY LAMPS</a></li>
									<li><a href="product.php">BOOK SHELVES</a></li>
								</ul> -->
							</li>
						</ul>
					</div>	

<?php 

if(!empty($_SESSION['shopping_cart'])){
			$itemtotal = 0;
			$totalprice1 = 0;
foreach($_SESSION["shopping_cart"] as $item) {
	$itemtotal += $item['product_quantity'];
}
}else{
	$itemtotal = 0;
	$totalprice1 = 0;
	$_SESSION['shopping_cart'] = 0;
    unset($_SESSION["shopping_cart"]);
}

?>


					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<button type="submit" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</button>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $itemtotal; ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="1"> -->
							<!-- <i class="zmdi zmdi-favorite-outline"></i> -->
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Call us (+91-9876543210)
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="lo-reg.php" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">HOME</a>
					
				</li>

				<li>
					<a href="product.php">DECOR</a>
					<ul class="sub-menu-m">
						<li><a href="product.php">VASES</a></li>
						<li><a href="product.php">CLOCKS</a></li>
						<li><a href="product.php">MANDIRS</a></li>
						<li><a href="product.php">WALL SHELVES</a></li>
						<li><a href="product.php">SCREENS & DIVIDERS</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="shoping-cart.php">BEDROOM</a>
					<ul class="sub-menu-m">
						<li><a href="product.php">BUNK BEDS</a></li>
						<li><a href="product.php">POSTER BEDS</a></li>
						<li><a href="product.php">SINGLE BEDS</a></li>
						<li><a href="product.php">QUEEN SIZED BEDS</a></li>
						<li><a href="product.php">KING SIZED BEDS</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="blog.php">LIVING</a>
					<ul class="sub-menu-m">
						<li><a href="product.php">CHAIRS</a></li>
						<li><a href="product.php">TABLES</a></li>
						<li><a href="product.php">STORAGES</a></li>
						<li><a href="product.php">OUTDOORS</a></li>
						<li><a href="product.php">SOFA SETS</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="about.php">DINING</a>
					<ul class="sub-menu-m">
									<li><a href="product.php">DECOR</a></li>									
									<li><a href="product.php">CHAIRS</a></li>
									<li><a href="product.php">BAR FURNITURE</a></li>
									<li><a href="product.php">DINING STORAGES</a></li>									
									<li><a href="product.php">DINING TABLES AND SETS </a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
					
				</li>

				<li>
					<a href="contact.php">STUDY</a>
					<ul class="sub-menu-m">
						<li><a href="product.php">STORAGES</a></li>
						<li><a href="product.php">STUDY TABLES</a></li>
						<li><a href="product.php">STUDY CHAIRS</a></li>
						<li><a href="product.php">STUDY LAMPS</a></li>
						<li><a href="product.php">BOOK SHELVES</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button type="submit" class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">

<?php if(!empty($_SESSION['shopping_cart'])){ ?>
<?php foreach($_SESSION["shopping_cart"] as $keys => $result) { ?>


					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/chair5.2.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $result["product_name"]; ?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $result["product_quantity"]; ?> x <?php echo $result["product_price"]; ?>
								=
								<?php 
								$totalprice = $result["product_quantity"] * $result["product_price"];
								 echo $totalprice;
								 // $totalprice1 = 0;
								 $totalprice1 += $totalprice;
								 ?>
								<!-- 1 x $19.00 -->
							</span>
						</div>
					</li>
<?php } }?>

					



				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $<?php echo $totalprice1; ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Delete item from cart -->

 <!-- Delete item from cart -->

