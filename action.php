<?php

//action.php
ob_start();

session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == "add")
	{
		if(isset($_SESSION["shopping_cart"]))
		{
			$is_available = 0;
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])
				{
					$is_available++;
					$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'product_id'               =>     $_POST["product_id"],  
					'product_name'             =>     $_POST["product_name"],  
					'product_price'            =>     $_POST["product_price"],  
					'product_quantity'         =>     $_POST["product_quantity"]
				);
				$_SESSION["shopping_cart"][] = $item_array;

			}
		}
		else
		{
			$item_array = array(
				'product_id'               =>     $_POST["product_id"],  
				'product_name'             =>     $_POST["product_name"],  
				'product_price'            =>     $_POST["product_price"],  
				'product_quantity'         =>     $_POST["product_quantity"]
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
	}

	if($_POST["action"] == 'remove')
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["product_id"] == $_POST["product_id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
	if($_POST["action"] == 'empty')
	{
		unset($_SESSION["shopping_cart"]);
	}
}

// echo $_SESSION["shopping_cart"];


foreach($_SESSION["shopping_cart"] as $keys=> $result) {
	echo "<pre>";
    echo "$keys";

    print_r($result);
    // echo $$result['11'];
    // var_dump($result);
    // echo $result["product_quantity"];
	// echo "</pre>";
	//  echo $result["product_id"];
	//  echo "<br>";
	//  echo $result["product_name"];
	//  echo "<br>";
	//  echo $result["product_price"];
	//  echo "<br>";
	//  echo $result["product_quantity"];
	if($keys == 'product_quantity') {
		
	}
	// if ($key == 3) { 
 //        $result[4] = 'd'; 
 //    } 

	echo "<pre>";




// foreach($_SESSION["shopping_cart"] as $keys => $values)
// 		{
// 	echo $values["product_quantity"];
// 	echo "</pre>";
// 	$item = $values["product_quantity"];
			
// 		}
// 		echo $item;
}


// $itemtotal = 0;

// foreach($_SESSION["shopping_cart"] as $item) {
// 	$itemtotal += $item['product_quantity'];
// }

// echo $itemtotal; // output 5 


?>


