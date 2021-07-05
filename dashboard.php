<?php 
    session_start();  
        include('config/db_connect.php');
        
        $id_user= isset($_SESSION['id']) ? $_SESSION['id'] : 5 ;
        
        //create a query 
        $sql = "SELECT * FROM listing WHERE id_user = '$id_user'";
        //make the query and get result
        $result = mysqli_query($conn,$sql);
        //fetch results (row => array)
        $items= mysqli_fetch_all($result,MYSQLI_ASSOC);;
        //checking of the information
        $count = mysqli_num_rows($result); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <!--fontawsome-->
    <script src="https://kit.fontawesome.com/6d3b596002.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" type="text/css" href="css/Style2.css">

</head>
<body>
    <!-- Header -->
	<?php include('header.php') ?>
    <!-- / Header -->

    

    <!--Content  -->
	<div class="content clearfix">
		 <div class="main-content">
            <h1 class="recent-post-title">Dashboard:</h1>
                <h2>My sells</h2>
                <?php foreach ($items as $single):    ?>
                <div class="post">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($single['image']); ?>" class="post-image"/> 
				        <div class="post-preview">
                        <h2><a href="single.php"> Title :<?php echo $single['title']; ?> </a></h2>
                        <p class="preview-text">
                            <h2>Description: </h2>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae,
                            tempora esse accusamus architecto eligendi officiis in modi blanditiis nemo quasi fuga, 
                            exercitationem distinctio natus vel magni? Eos, esse. Quaerat, numquam?
                        </p>
                        <i class="far fa-user">Seller:<strong> <?php echo $_SESSION['pseudo']?> </strong></i>
                        &nbsp;
                        <i class="far fa-list-alt">Category: <strong> <?php echo $single['categorie']?></strong></i>
                        &nbsp;
                        <i class="far calendar"> mar 11, 2020</i>
                        <a class="btn read-more">price: <?php echo $single['price']; ?>$</a>
                    </div>
			    </div>
                <?php  endforeach; ?>    
            
        </div>
	</div>
	 <!--// Content-->


    <!--footer-->
	<?php include('index_footer.php'); ?>
	<!--// footer-->
    
</body>
</html>