
<?php 
//create a query 
	$sql = "SELECT * FROM listing ";
	//make the query and get result
	$result = mysqli_query($conn,$sql);
	//fetch results (row => array)
	$items = mysqli_fetch_all($result,MYSQLI_ASSOC);;
	//checking of the information
	$count = mysqli_num_rows($result);
?>