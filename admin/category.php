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
        Category
        <!-- <small>Control panel</small> -->
      </h1>
      
<?php 

  
      if(isset($_POST['submit'])){

        $cat_title = $_POST['cat_title'];


        $query1 = "INSERT INTO category (cat_title) VALUES ('$cat_title')";

        $run1= mysqli_query($connection,$query1);
      }


 ?>


    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <form method="post" enctype="multipart/form-data" >
      <div class="box box-success">

            <div class="box-body">

          <label for="productname"> Category Name </label>
              <input class="form-control" type="text" id="productname" name="cat_title" placeholder="Category Name">
              
             <br>
              <button type="submit" class="btn  btn-primary" name="submit"> Create </button>
            </div>

          </div>
          </form>



             <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered ">
                <tr>
                  <th><h4>#</h4></th>
                  <th><h4>Category Name</h4></th>
                  <th><h4>Action</h4></th>
                </tr>
<?php 
           $query = "SELECT * FROM category";
        $select_image = mysqli_query($connection, $query); 
            
      while($row = mysqli_fetch_assoc($select_image)){
          $id = $row['id'];
          $cat_title = $row['cat_title'];
          
 ?>

                <tr>
                  <td><h4><?php echo $id; ?></h4></td>
                  <td><h4><?php echo $cat_title; ?></h4></td>
                  <td><h4>
                  <button type="button" class="btn btn-flat btn-warning" data-toggle="modal" data-target="#edit<?php echo $id; ?>"> Edit </button>
                  <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#delete<?php echo $id; ?>"> Delete </button>
                  <!-- <a href="" class="btn btn-flat btn-danger">Delete</a> -->
                    </h4>
                  </td>
                </tr>


<!-- Edit model -->

       <div class="modal fade" id="edit<?php echo $id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Category Name</h4>
              </div>
              <div class="modal-body">

        <form method="post" enctype="multipart/form-data" >
        <div class="box box-success">
        <div class="box-body">
        <label for="productname"> Category Name </label>
        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
        <input class="form-control" type="text"  name="cat_title" value="<?php echo $cat_title; ?>" placeholder="Category Name">
        </div>
        </div>
        

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<!-- delete model -->

          <!--Delete Modal -->
                    <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $id; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                      <!-- delete query -->
                      <?php 
    if(isset($_POST['delete'])){

             $delete_cat = $_POST['delete_id'];
             // $not_delete_client_query = "UPDATE venders SET isDeleted= '1' WHERE id=$the_client_id ";
             $not_delete_client_query = "DELETE  FROM category WHERE id = $delete_cat";
             $note_delete_query = mysqli_query($connection, $not_delete_client_query);
             header ("Location: category.php");
         }      
   ?>

   <!-- edit query -->
                      <?php 
    if(isset($_POST['edit'])){

              $cat_title = $_POST['cat_title'];

             $edit_cat_id = $_POST['edit_id'];
             $edit_cat_query = "UPDATE category SET cat_title= '$cat_title' WHERE id=$edit_cat_id ";
             $edit_query = mysqli_query($connection, $edit_cat_query);
             header ("Location: category.php");
         }      
   ?>








              <?php } ?>
              </table>
            </div>


      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'include/footer.php'; ?>