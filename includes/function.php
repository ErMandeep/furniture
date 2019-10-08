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

              $view_vender_query = "SELECT * FROM user WHERE id= $login_id";
              $select_vender_by_id = mysqli_query($connection, $view_vender_query);  
              while($row = mysqli_fetch_assoc($select_vender_by_id)){
              $oldpassworddb = $row['password'];
              }

                  if(isset($_POST['update_psss'])){
                 $oldpassword = mysqli_real_escape_string($connection,md5($_POST['oldpassword']));   
                 $newpassword = mysqli_real_escape_string($connection,md5($_POST['newpassword']));   
                 $confirmnewpassword = mysqli_real_escape_string($connection,md5($_POST['confirmnewpassword']));   
                  // $oldpassword = $_POST['oldpassword'];
                  // $newpassword = $_POST['newpassword'];
                  // $confirmnewpassword = $_POST['confirmnewpassword'];


                  if ($oldpassword==$oldpassworddb){


              //     if (strlen($newpassword)>25||strlen($confirmnewpassword)<6)   
              //     {
              //     echo  "<div class='alert alert-warning alert-dismissible'>
              //       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              //   <h4><i class='icon fa fa-warning'></i> Alert!</h4>
              //   Password must be betwwen 6 & 25
              // </div>";


              //     }else{


                  if($newpassword==$confirmnewpassword){
                  $sql="UPDATE user SET password='$newpassword' where  id='$login_id'";

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
       // }
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
              $img = $row['feature_img'];
?>
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $cat_name; ?>">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="admin/images/<?php echo $img; ?>" alt="IMG-PRODUCT">

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


elseif(isset($_GET['200k1'])){

$sql = "SELECT* FROM products WHERE price BETWEEN 200000 and 200000000";
$rst = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($rst)){
              $id = $row['id'];
              $product_name = $row['product_name'];
              $price = $row['price'];
              $cat_name = $row['cat_name'];
              $img = $row['feature_img'];

echo '
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$cat_name.' ">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="admin/images/'.$img.'" alt="IMG-PRODUCT">

              <a href="product-detail.php?view='.$id.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="" >
                Quick View
              </a>
              <!-- <button type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" > Quick View </button> -->
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                   '.$product_name.'
                </a>

                <span class="stext-105 cl3">
                 '.$price.'
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

';


}
}



elseif(isset($_GET['50kto200k'])){

$sql = "SELECT* FROM products WHERE price BETWEEN 50000 and 200000";
$rst = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($rst)){
              $id = $row['id'];
              $product_name = $row['product_name'];
              $price = $row['price'];
              $cat_name = $row['cat_name'];
              $img = $row['feature_img'];

echo '
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$cat_name.' ">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="admin/images/'.$img.'" alt="IMG-PRODUCT">

              <a href="product-detail.php?view='.$id.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="" >
                Quick View
              </a>
              <!-- <button type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" > Quick View </button> -->
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                   '.$product_name.'
                </a>

                <span class="stext-105 cl3">
                 '.$price.'
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

';


}
}


elseif(isset($_GET['10kto50k'])){

$sql = "SELECT* FROM products WHERE price BETWEEN 10000 and 50000";
$rst = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($rst)){
              $id = $row['id'];
              $product_name = $row['product_name'];
              $price = $row['price'];
              $cat_name = $row['cat_name'];
              $img = $row['feature_img'];

echo '
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$cat_name.' ">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="admin/images/'.$img.'" alt="IMG-PRODUCT">

              <a href="product-detail.php?view='.$id.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="" >
                Quick View
              </a>
              <!-- <button type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" > Quick View </button> -->
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                   '.$product_name.'
                </a>

                <span class="stext-105 cl3">
                 '.$price.'
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

';


}
}

elseif(isset($_GET['2kto10k'])){

$sql = "SELECT* FROM products WHERE price BETWEEN 2000 and 10000";
$rst = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($rst)){
              $id = $row['id'];
              $product_name = $row['product_name'];
              $price = $row['price'];
              $cat_name = $row['cat_name'];
              $img = $row['feature_img'];

echo '
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$cat_name.' ">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="admin/images/'.$img.'" alt="IMG-PRODUCT">

              <a href="product-detail.php?view='.$id.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="" >
                Quick View
              </a>
              <!-- <button type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" > Quick View </button> -->
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                   '.$product_name.'
                </a>

                <span class="stext-105 cl3">
                 '.$price.'
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

';


}
}


elseif(isset($_GET['50to2000'])){

$sql = "SELECT* FROM products WHERE price BETWEEN 500 and 2000";
$rst = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($rst)){
              $id = $row['id'];
              $product_name = $row['product_name'];
              $price = $row['price'];
              $cat_name = $row['cat_name'];
              $img = $row['feature_img'];

echo '
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$cat_name.' ">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="admin/images/'.$img.'" alt="IMG-PRODUCT">

              <a href="product-detail.php?view='.$id.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="" >
                Quick View
              </a>
              <!-- <button type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" > Quick View </button> -->
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                   '.$product_name.'
                </a>

                <span class="stext-105 cl3">
                 '.$price.'
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

';


}
}



elseif(isset($_GET['category'])){

$cat_name = $_GET['category'];

$sql = "SELECT* FROM products WHERE cat_name = '$cat_name'";
// $query = "SELECT * FROM products WHERE cat_name= $cid";
$rst = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($rst)){
              $id = $row['id'];
              $product_name = $row['product_name'];
              $price = $row['price'];
              $cat_name = $row['cat_name'];
              $img = $row['feature_img'];

echo '
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$cat_name.' ">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="admin/images/'.$img.'" alt="IMG-PRODUCT">

              <a href="product-detail.php?view='.$id.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="" >
                Quick View
              </a>
              <!-- <button type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" > Quick View </button> -->
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                   '.$product_name.'
                </a>

                <span class="stext-105 cl3">
                 '.$price.'
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

';


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
              $img = $row['feature_img'];
    
        ?>



        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $cat_name; ?>">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0">
              <img src="admin/images/<?php echo $img; ?>" alt="IMG-PRODUCT">

              <a href="product-detail.php?view=<?php echo $id; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="" >
                Quick View
              </a>
              <!-- <button type="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" > Quick View <?php echo $id; ?> </button> -->
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.php?view=<?php echo $id; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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


<?php 
function register(){
    global $connection;

if(isset($_POST['register']))
    {
        // echo"<pre>"; print_r($row); echo"</pre>"; 
        // $clientID = $row['clientID'];
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, md5($_POST['txtPassword']));
        // $username = mysqli_real_escape_string($connection, $_POST['username']);
        // $phone = mysqli_real_escape_string($connection,$_POST['phone']);
        // $vendor_purpose = mysqli_real_escape_string($connection,$_POST['vendor_purpose']);
        $user_activation_code = md5(rand());
        // $confirm_password = $_POST['confirm_password'];

        // $options = ['cost' => 12, ];

        // $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);


        $query = "SELECT * FROM user where email = '". $_POST["email"] . "'";

        $result = mysqli_query($connection, $query);

        if($result-> num_rows == 0 )      
         {
        // Add new user to database
        $register_query = "INSERT INTO user (first_name, last_name, email, password, status, activatecode)";
        
        $register_query .= "VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$password}', 'not active', '{$user_activation_code}')";
        
        
        $result = mysqli_query($connection, $register_query);
        if($result){
          echo "<b>"."Your Acccount created successfully"."</b>"."<br>";
        }

        confirmQuery($result);

        $id_guests = mysqli_insert_id($connection);


         if(isset($result))
  {


        $actual_link = "http://localhost/fouritue/"."activate.php?id=" . $user_activation_code;
        $toEmail = $_POST["email"];
        $subject = "User Registration Activation Email";
        $content = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";



   $base_url = "http://localhost/tutorial/email-address-verification-script-using-php/";
   $mail_body = '<p>test</p>';
   require 'class/class.phpmailer.php';
   $mail = new PHPMailer;
   $mail->IsSMTP();        //Sets Mailer to send message using SMTP
   $mail->Host = 'mail.wedkings.in';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
   $mail->Port = '587';        //Sets the default SMTP server port
   $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
   $mail->Username = 'admin@wedkings.in';     //Sets SMTP username
   $mail->Password = '45rude88mud';     //Sets SMTP password
   $mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
   $mail->setFrom('admin@wedkings.in', 'Wedkings ');  //Sets the From email address for the message
   $mail->FromName = 'Wedkings';     //Sets the From name of the message
   $mail->addAddress($_POST["email"]);   //Adds a "To" address   
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML    
   $mail->Subject = $subject;   //Sets the Subject of the message
   $mail->Body = $content;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {
    // $message = '<label class="text-success">Register Done, Please check your mail.</label>';
    echo "<b>"."Register Done, Please check your mail."."</b>"."<br>";
   }
  }





        } else {
  
          while($row =mysqli_fetch_assoc($result)){
          // $usernamedb = $row['username'];
          $emaildb = $row['email'];
          // $phonedb = $row['phone'];
        }

         // if($username == $usernamedb){
         //  echo "<b>"."This Username already in use."."</b>"."<br>";
         // }
         if ($email == $emaildb) {
           echo "<b>"."This Email already in use."."</b>"."<br>";
           echo '<script> alert("This Email already in use.");</script>';
         }
        // if ($phone == $phonedb) {
        //   echo "<b>"."This Mobile Number already in use."."</b>"."<br>";
        // }


               
        }


        
        
        }
        }




 ?>


