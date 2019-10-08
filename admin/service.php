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
        Services
        <!-- <small>Control panel</small> -->
      </h1>
       <?php 

      $sql = "SELECT * FROM service WHERE id=1";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_assoc($result);
      $id = $row['id'];
      $img = $row['img'];
      $des = $row['des'];
      

      if(isset($_POST['submit'])){

        $des = $_POST['des'];


        $query1 = "UPDATE service SET des = '$des' WHERE id=1";
        // $query2 = "UPDATE about SET img = '$imgnew' WHERE id=1";

        $run1= mysqli_query($connection,$query1);
        // $run2= mysqli_query($connection,$query2);


        if($_FILES['img']['name'] != ""){    

        $img1 = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        $name1 = rand(1,5000).".".$img1;

        move_uploaded_file($_FILES["img"]["tmp_name"],"./images/$name1");

        $imagesql = "UPDATE service SET img = '$name1' WHERE id=1";
        $update_img = mysqli_query($connection, $imagesql);

        }

        if($run1 OR $update_img){

          header('Location: service.php');

          // echo "<div class='alert alert-success alert-dismissible'>
          //                         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          //                         <h4><i class='icon fa fa-check'></i> Alert!</h4>
          //                         Your page update Successfully.
          //                       </div>";       
                   }

      }

       ?>

      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <form method="post" enctype="multipart/form-data" >
      <div class="box box-success">

            <div class="box-body">
              <label for="description"> Description </label>
              <div class="box-body pad">
                    <textarea class="textarea" placeholder="Place some text here" name="des" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            <?php echo $des; ?>
                          </textarea>
            </div>
              <br>
              <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="img">
                  <br>
                  <img src="images/<?php echo $img; ?>" style="width: 200px">
              <button type="submit" name="submit" class="btn  btn-primary">Update</button>
            </div>

          </div>
          </form>

      


      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'include/footer.php'; ?>