<?php  




  $image_file = "DELETE FROM images ";
  $query = "INSERT INTO images (productID, image) VALUES ('$id_guests', '$image_file')";
  $result= mysqli_query($connection,$query);



?>  