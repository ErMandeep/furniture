<?php 

function slider(){
    global $connection;

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



}

 ?>