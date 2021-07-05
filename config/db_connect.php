<?php
    //connecting the db 
    $conn = mysqli_connect('localhost','Mons','test123','test');
    //checking
    if(!$conn)
    {
        echo'connection error : '.mysqli_connect_error();
    }
?>