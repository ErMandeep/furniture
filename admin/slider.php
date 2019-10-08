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
        Slider
        <!-- <small>Control panel</small> -->
      </h1>


      <?php 
      if(isset($_POST['submit'])){

        $descptn = $_POST['des'];

        $query1 = "UPDATE slider SET des = '$descptn' WHERE id=1";

        $run1= mysqli_query($connection,$query1);

        if($run1){
          header('Location: slider.php');
        }


      }

   
           $query = "SELECT * FROM slider WHERE id = 1";
        $select_image = mysqli_query($connection, $query); 
            
       while($row = mysqli_fetch_assoc($select_image)){
          
          $id = $row['id'];
          $slider1 = $row['slider1'];
          $slider2 = $row['slider2'];
          $slider3 = $row['slider3'];
          $des = $row['des'];


if(isset($_POST['submitimg'])){



//  slider first image update query
if($_FILES['slider1']['name'] != ""){    

        $img1 = pathinfo($_FILES["slider1"]["name"], PATHINFO_EXTENSION);
        $name1 = rand(1,5000).".".$img1;

        move_uploaded_file($_FILES["slider1"]["tmp_name"],"./images/$name1");

        $imagesql = "UPDATE slider SET slider1 = '$name1' WHERE id=1";
        $update_img1 = mysqli_query($connection, $imagesql);

        }

        
// slider second image update query
        if($_FILES['slider2']['name'] != ""){    

        $img1 = pathinfo($_FILES["slider2"]["name"], PATHINFO_EXTENSION);
        $name1 = rand(1,5000).".".$img1;

        move_uploaded_file($_FILES["slider2"]["tmp_name"],"./images/$name1");

        $imagesql = "UPDATE slider SET slider2 = '$name1' WHERE id=1";
        $update_img2 = mysqli_query($connection, $imagesql);

        }

        // slider third image update query
        if($_FILES['slider3']['name'] != ""){    

        $img1 = pathinfo($_FILES["slider3"]["name"], PATHINFO_EXTENSION);
        $name1 = rand(1,5000).".".$img1;

        move_uploaded_file($_FILES["slider3"]["tmp_name"],"./images/$name1");

        $imagesql = "UPDATE slider SET slider3 = '$name1' WHERE id=1";
        $update_img3 = mysqli_query($connection, $imagesql);

        }
        if($update_img1 || $update_img2 || $update_img3){
          header('Location: slider.php');
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
             <!--  <br>
              <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">
                  <br> -->
              <button type="submit" name="submit" class="btn  btn-primary">Update</button>
            </div>



          </div>
          </form>

<div class="row">
<form method="post" enctype="multipart/form-data" >
  







  <div class="col-md-6">
    <div class="box box-solid">
      <div class="box-body">
      <label for="exampleInputFile">First Image</label>
      <input type="file" name="slider1" id="exampleInputFile">
    </div>
    <div class="box-body">
      <label for="exampleInputFile">Second Image</label>
      <input type="file" name="slider2" id="exampleInputFile">
    </div>
    <div class="box-body">
      <label for="exampleInputFile">Third Image</label>
      <input type="file" name="slider3" id="exampleInputFile">
    </div>
    <div class="box-body">
      <input type="submit" class="btn  btn-primary" name="submitimg" value="UPDATE">
    </div>

</form>
    </div>
  </div>






  <!-- ftech slider images -->
                    <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Carousel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="images/<?php echo $slider1; ?>" alt="First slide">

                    <div class="carousel-caption">
                      First Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="images/<?php echo $slider2; ?>" alt="Second slide">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div>
                  <div class="item">
                    <img src="images/<?php echo $slider3; ?>" alt="Third slide">

                    <div class="carousel-caption">
                      Third Slide
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
      
<?php } ?>

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'include/footer.php'; ?>