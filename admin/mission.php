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
        Mission
        <!-- <small>Control panel</small> -->
      </h1>

       <?php 

      $sql = "SELECT * FROM mission WHERE id=1";
      $result = mysqli_query($connection, $sql);
      $row = mysqli_fetch_assoc($result);
      $id = $row['id'];
      // $img = $row['img'];
      $des = $row['des'];
      

      if(isset($_POST['submit'])){

        $descptn = $_POST['des'];

        $query1 = "UPDATE mission SET des = '$descptn' WHERE id=1";

        $run1= mysqli_query($connection,$query1);


        if($run1){

          header('Location: mission.php');

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
                    <textarea class="textarea" name="des" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            <?php echo $des; ?>
                          </textarea>
            </div>
              <br>
             <!--  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">
                  <br> -->
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