<?php
    $sql ="SELECT * FROM category";
    $result = mysqli_query($conn,$sql);
    $category = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
?>