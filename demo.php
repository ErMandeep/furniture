<?php require 'admin/config/db.php'; ?>
<?php 
$your_string = "ghjghg jhhkj hjhk dsfsfd fdsfsd";
$new = str_replace(' ', '-', $your_string);

echo $your_string;
echo "<br>";
echo $new;

?>

<?php 
$menu = "SELECT * FROM category";
    $menu_select = mysqli_query($connection, $menu);  
    while($row = mysqli_fetch_assoc($menu_select)){
          $id = $row['id'];
          $cat_title = $row['cat_title'];

 ?>

	<li><a href="category.php?category=<?php echo $cat_title; ?>"><?php echo $cat_title; ?></a></li>

<?php } ?>




