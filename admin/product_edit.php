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
     Edit Products
        <!-- <small>Control panel</small> -->
      </h1>
      <?php 
        if ( isset($_GET['error']) && $_GET['error'] == 1 )
      {
       echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                Maximum 3 images can be uploaded
              </div>'; 
      } 
?>
    </section>


      <?php 


if(isset($_GET['p_id'])){

  $productID = $_GET['p_id'];
}

  $view_product = "SELECT * FROM products WHERE id= $productID";
    $select_prodt = mysqli_query($connection, $view_product);  
    while($row = mysqli_fetch_assoc($select_prodt)){

          $id = $row['id'];
          $product_name = $row['product_name'];
          $cat_name = $row['cat_name'];
          $des = $row['des'];
          $price = $row['price'];
          $img = $row['feature_img'];
}




      ?>

        
  



    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <form method="post" enctype="multipart/form-data" >
      <div class="box box-success">

        <div class="box-body">
          <label for="productname"> Product Name </label>
              <input class="form-control" type="text" id="productname" name="product_name" value=" <?php echo $product_name; ?> " placeholder="Product Name">
            </div>

        <div class="box-body">
                  <select class="form-control" name="cat_name" value="<?php echo $cat_title; ?>">
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
              Rs.<input class="form-control" type="number" id="productname" value="<?php echo $price; ?>" name="price" placeholder="Rs.5000.00">
            </div>

      <div class="box-body">
        <label for="description"> Description </label>
        <div class="box-body pad">
              <textarea class="textarea" placeholder="Place some text here" name="des" 
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      <?php echo $des; ?>
                    </textarea>
            </div>
            <br>
            <div class="box-body">
              <label for="exampleInputFile">Feature Image </label>
                  <input type="file" id="exampleInputFile" name="img">
                  <br>
                  <img src="images/<?php echo $img; ?>" style="width: 200px">
                </div>
             <!--  <br>
              <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="image[]" multiple="multiple">
                  <br> -->
              <button type="submit" name="updateproduct" class="btn  btn-primary">Update Product</button>
            </div>

          </div>
          </form>

             <?php 

if(isset($_POST['updateproduct'])){
  $nwproduct = $_POST['product_name'];
  $new_cat = $_POST['cat_name'];
  $new_des = $_POST['des'];

        $add_client_query = "UPDATE products SET ";
        $add_client_query .="product_name = '{$nwproduct}',";       
        $add_client_query .="cat_name = '{$new_cat}',";       
        $add_client_query .="des = '{$new_des}'";       
        $add_client_query .= "WHERE id = {$productID}";      
        
        $clients_result = mysqli_query($connection, $add_client_query);
  // $result_update = mysqli_query($connection, $update); 

        if($_FILES['img']['name'] != ""){    

        $img1 = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        $name1 = rand(1,5000).".".$img1;

        move_uploaded_file($_FILES["img"]["tmp_name"],"./images/$name1");

        $imagesql = "UPDATE products SET feature_img = '$name1' WHERE id={$productID}";
        $update_img = mysqli_query($connection, $imagesql);

        }



        if(!$clients_result){
            die("QUERY FAILED .". mysqli_error($connection) );
}


if($update_img || $clients_result){
  header ("Location: product_edit.php?p_id=$productID");
}



}


    ?>

  <!-- fetch images -->
<div class="row">
<?php 
    $view_images = "SELECT * FROM images WHERE productID= $productID";
    $select_imgs = mysqli_query($connection, $view_images); 
    $image_count = mysqli_num_rows($select_imgs); 
    while($row = mysqli_fetch_assoc($select_imgs)){

      $id_img = $row['id'];
      $img = $row['image'];


 ?>
  <div class="col-md-3">
<!-- <div class="row">  -->
  <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" style="height:220px; width:220px; " />
  <a href="product_edit.php?p_id=<?php echo $productID; ?>&delete=<?php echo $id_img; ?>">Remove</a> 
  <?php echo $image_count; ?>
<!-- </div> -->
</div>
<?php } ?>
</div>
<!-- image update form -->
      <form method="post" enctype="multipart/form-data" >
        <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="image[]">
                  <br>
              <button type="submit" name="updateimg" class="btn  btn-primary">Upload Images </button>

      </form>  

    </section>
  </div>




  <!-- /.content-wrapper -->
  <?php include 'include/footer.php'; ?>

               <!-- delete query -->
  <?php 
    if(isset($_GET['delete'])){

             $delete_cat = $_GET['delete'];
             $delete_query_img = "DELETE  FROM images WHERE id = $delete_cat";
             $delete_query = mysqli_query($connection, $delete_query_img);
             if($delete_query){
             header ("Location: product_edit.php?p_id=$productID");
         }   
         }
   ?>

<!-- update images query -->
  <?php 
if(isset($_POST['updateimg'])){

// image upload query
if($image_count == 3){
 $edit_item_idErr = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                Maximum 3 images can be uploaded
              </div>';


    if($edit_item_idErr){
      header ("Location: product_edit.php?p_id=$productID&error=1");
    }          

}else{

  if(count($_FILES["image"]["tmp_name"]) > 0)
{
 for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++)
 {
  $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
  $query = "INSERT INTO images (productID, image) VALUES ('$productID', '$image_file')";
  $result= mysqli_query($connection,$query);
 }
}
if($result){
  header ("Location: product_edit.php?p_id=$productID");
}
}
}

   ?>





