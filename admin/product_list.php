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
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->



          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product Name </th>
                  <th> Category </th>
                  <th> Price </th>
                  <th> Update </th>
                  <th> Delete </th>
                </tr>
                </thead>
                <tbody>

<?php 
           $query = "SELECT * FROM products";
        $select_image = mysqli_query($connection, $query); 
            
      while($row = mysqli_fetch_assoc($select_image)){
          $id = $row['id'];
          $product_name = $row['product_name'];
          $cat_name = $row['cat_name'];
          $price = $row['price'];

 ?>



                <tr>
                  <td><?php echo $product_name; ?></td>
                  <td><?php echo $cat_name; ?></td>
                  <td><?php echo $price; ?></td>
                  <td>  <a href="product_edit.php?p_id=<?php echo $id; ?> " class="btn btn-flat btn-warning" > Edit </a> </td>
                  <td><button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#delete<?php echo $id; ?>"> Delete </button></td>
                </tr>



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




  <?php 
    if(isset($_POST['delete'])){

             $delete_cat = $_POST['delete_id'];
             // $not_delete_client_query = "UPDATE venders SET isDeleted= '1' WHERE id=$the_client_id ";
             $not_delete_client_query = "DELETE  FROM products WHERE id = $delete_cat";
             $note_delete_query = mysqli_query($connection, $not_delete_client_query);

             $dlt_img = "DELETE  FROM images WHERE productID = $delete_cat";
             $img_delete_query = mysqli_query($connection, $dlt_img);


             header ("Location: product_list.php");
         }      
   ?>






              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Product Name </th>
                  <th> Category </th>
                  <th> Description </th>
                  <th> Update </th>
                  <th> Delete </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>







      


      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'include/footer.php'; ?>

  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>