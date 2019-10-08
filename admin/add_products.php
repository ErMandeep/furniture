<?php
include 'include/controller.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
if(empty($_SESSION['user_name'])){
    header("location:login.php");
}
?>

<?php include 'include/header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->

<?php include 'include/navigation.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        <!-- <small>Control panel</small> -->
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <form method="post" enctype="multipart/form-data" >
      <div class="box box-success">

        <div class="box-body">
          <label for="productname"> Product Name </label>
              <input class="form-control" type="text" id="productname" name="product_name" placeholder="Product Name">
            </div>

        <div class="box-body">
                  <select class="form-control" name="cat_name">
                  <label>Category</label>
                  <?php 
                           $query = "SELECT * FROM category";
                        $select_image = mysqli_query($connection, $query); 
                      while($row = mysqli_fetch_assoc($select_image)){
                          $id = $row['id'];
                          $cat_title = $row['cat_title'];
                 ?>
                    <option value="<?php echo $cat_title; ?>"><?php echo $cat_title; ?></option>
                    <?php } ?>  
                  </select>
          </div>

          <div class="box-body">
          <label for="productname"> Product Price </label>
              Rs.<input class="form-control" type="number" id="productname" name="price" placeholder="Rs.5000.00">
            </div>

      <div class="box-body">
        <label for="description"> Description </label>
        <div class="box-body pad">
              <textarea class="textarea" placeholder="Place some text here" name="des" 
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      
                    </textarea>
            </div>
              <br>
              <label for="exampleInputFile">File input (Select 3 images to upload)</label>
                  <input type="file" id="exampleInputFile" name="image[]" multiple="multiple" required>
                  <br>

              <label for="exampleInputFile">Feature Image</label>
                  <input type="file" id="exampleInputFile" name="img" required>
                  <br>    
              <button type="submit" name="submit" class="btn  btn-primary">Create New Product</button>
            </div>

          </div>
          </form>




      <!-- /.row (main row) -->

  <?php 


if(isset($_POST['submit'])){

$productName = $_POST['product_name'];
$cat_name = $_POST['cat_name'];
$des = $_POST['des'];
$price = $_POST['price'];
$img1 = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
$name1 = rand(1,5000).".".$img1;

move_uploaded_file($_FILES["img"]["tmp_name"],"./images/$name1");

  $querypro = "INSERT INTO products (cat_id, product_name, cat_name, des, price, feature_img) VALUES ('$id' ,'$productName', '$cat_name', '$des', '$price', '$name1')";
  $result2= mysqli_query($connection,$querypro);


   $id_guests = mysqli_insert_id($connection);



// image upload query
  if(count($_FILES["image"]["tmp_name"]) > 0)
{
 // for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++)
 for($count = 0; $count <= 2; $count++)

 {
  $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
  $query = "INSERT INTO images (productID, image) VALUES ('$id_guests', '$image_file')";
  $result= mysqli_query($connection,$query);
  // $statement = $connect->prepare($query);
  // $statement->execute();
 }

}


if($result){
  header('Location: product_list.php');
}


}

   ?>

    </section>
    <!-- /.content -->
  </div>




  <!-- /.content-wrapper -->
  <?php include 'include/footer.php'; ?>



