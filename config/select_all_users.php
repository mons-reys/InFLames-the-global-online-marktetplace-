<?php 
//create a query 
$sql = "SELECT * FROM user WHERE id=' $seller' ";
//make the query and get result
$result = mysqli_query($conn,$sql);
//fetch results (row => array)
$user= mysqli_fetch_assoc($result);
//checking of the information
$count = mysqli_num_rows($result);
?>