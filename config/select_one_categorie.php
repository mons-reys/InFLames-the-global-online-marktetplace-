<?php

function one_category($input){
    include('../config/db_connect.php');
    $sql ="SELECT * FROM category WHERE name='$input'";
    $result = mysqli_query($conn,$sql);
    $category = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    return $count;
}
?>