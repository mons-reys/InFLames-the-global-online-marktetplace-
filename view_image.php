<?php 
// Include the database configuration file  
include('config/db_connect.php');

// Get image data from database 
$sql = "SELECT image FROM ima WHERE id='7'"; 
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

    <div class="gallery"> 

            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
    </div> 