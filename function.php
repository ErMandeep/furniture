<?php 

function confirmQuery($result){

    global $connection;
    if(!$result){
            die("QUERY FAILED .". mysqli_error($connection) );
}

}





function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}


function confirm($result){
    global $connection;
    if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}


function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}






 



 function profile(){

    global $connection;
     $login_id = "";
      if (isset($_SESSION['id'])) {
      $login_id = $_SESSION['id'];
      }
      
    $view_vender_query = "SELECT * FROM users WHERE id= $login_id";
    $select_vender_by_id = mysqli_query($connection, $view_vender_query);  
    while($row = mysqli_fetch_assoc($select_vender_by_id)){
        // echo"<pre>"; print_r($_SESSION['id']); echo"</pre>"; 
          $id = $row['id'];
          $nm = $row['name'];
          $eml = $row['email'];
          $ph = $row['phone'];
          $descptn = $row['description'];
          $fb = $row['facebook'];
          $twr = $row['twitter'];
          $inst = $row['instagram'];
          $yutb = $row['youtube'];
}

    if(isset($_POST['update']))
    {
        // echo"<pre>"; print_r($row); echo"</pre>"; 
        $nm = $_POST['name'];
        $eml = $_POST['email'];
        $ph = $_POST['phone'];
        $descptn = $_POST['description'];

        $fb = $_POST['facebook'];
        $twr = $_POST['twitter'];
        $inst = $_POST['instagram'];
        $yutb = $_POST['youtube'];

        $add_client_query = "UPDATE users SET ";
        $add_client_query .="name = '{$nm}',";       
        $add_client_query .="email = '{$eml}',";       
        $add_client_query .="phone = '{$ph}',";       
        $add_client_query .="description = '{$descptn}',";       
        $add_client_query .="facebook = '{$fb}',";       
        $add_client_query .="twitter = '{$twr}',";       
        $add_client_query .="instagram = '{$inst}',";       
        $add_client_query .="youtube = '{$yutb}'";       
        $add_client_query .= "WHERE id = $login_id ";      
        
        $clients_result = mysqli_query($connection, $add_client_query);

        confirmQuery($clients_result);

        header('Location: profile.php?success=1');

        }
 }


          function change_vender_password(){

              global $connection;
               $login_id = "";
              if (isset($_SESSION['id'])) {
              $login_id = $_SESSION['id'];
              }

              $view_vender_query = "SELECT * FROM users WHERE id= $login_id";
              $select_vender_by_id = mysqli_query($connection, $view_vender_query);  
              while($row = mysqli_fetch_assoc($select_vender_by_id)){
              $oldpassworddb = $row['password'];
              }

                  if(isset($_POST['update_psss'])){
                  $oldpassword = $_POST['oldpassword'];
                  $newpassword = $_POST['newpassword'];
                  $confirmnewpassword = $_POST['confirmnewpassword'];


                  if ($oldpassword==$oldpassworddb){


                  if (strlen($newpassword)>25||strlen($confirmnewpassword)<6)   
                  {
                  echo  "<div class='alert alert-warning alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Alert!</h4>
                Password must be betwwen 6 & 25
              </div>";


                  }else{


                  if($newpassword==$confirmnewpassword){
                  $sql="UPDATE users SET password='$newpassword' where  id='$login_id'";

                 $result = mysqli_query($connection, $sql);

                  if($result){

                    header('Location: logout.php?success=1');

                  }

         } else
                  {

                 echo  "<div class='alert alert-warning alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Alert!</h4>
                Passwords do not match
              </div>";

                 }
       }
     }else{
       

       echo  "<div class='alert alert-warning alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Alert!</h4>
                old password not matched
              </div>";
     }
              }
          }


          function products(){
          global $connection;


if(isset($_POST['search']))
{
$valueToSearch = $_POST['search'];
// search in all table columns
// using concat mysql function
$query = "SELECT * FROM `products` WHERE CONCAT(`id`, `product_name`, `cat_name`, `price`) LIKE '%".$valueToSearch."%'";
// $search_result = filterTable($query);
$sql = mysqli_query($connection, $query);
if($sql){
  // echo "1111111111";
   while($row = mysqli_fetch_array($sql)):
              $id = $row['id'];
              $product_name = $row['product_name'];
              $price = $row['price'];
              $cat_name = $row['cat_name'];
?>
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $cat_name; ?>">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="images/chair5.2.jpg" alt="IMG-PRODUCT">

              <a href="product-detail.php?view=<?php echo $id; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="" >
                Quick View
              </a>
              <!-- <button type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" > Quick View <?php echo $id; ?> </button> -->
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                  <?php echo $product_name; ?>
                </a>

                <span class="stext-105 cl3">
                  <?php echo $price; ?>
                </span>
              </div>

              <div class="block2-txt-child2 flex-r p-t-3">
                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                  <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                  <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                </a>
              </div>
            </div>
          </div>
        </div>
               
 <?php              
      endwhile;
}else{
  echo "try again";
}

}
else {
    $query = "SELECT * FROM products";
            $select_image = mysqli_query($connection, $query); 

          while($row = mysqli_fetch_assoc($select_image)){
              $id = $row['id'];
              $product_name = $row['product_name'];
              $price = $row['price'];
              $cat_name = $row['cat_name'];
    
        ?>



        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $cat_name; ?>">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="images/chair5.2.jpg" alt="IMG-PRODUCT">

              <a href="product-detail.php?view=<?php echo $id; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="" >
                Quick View
              </a>
              <!-- <button type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" > Quick View <?php echo $id; ?> </button> -->
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                  <?php echo $product_name; ?>
                </a>

                <span class="stext-105 cl3">
                  <?php echo $price; ?>
                </span>
              </div>

              <div class="block2-txt-child2 flex-r p-t-3">
                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                  <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                  <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                </a>
              </div>
            </div>
          </div>
        </div>


<?php }}} ?>


