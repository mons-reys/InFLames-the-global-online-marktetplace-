<?php 

         session_start();
        //show message if the order done !
            if(isset($_SESSION['order_confirmed'])){
        echo $_SESSION['order_confirmed'];
         }
        //unset the signup message
	    unset($_SESSION['order_confirmed']);
        include('config/db_connect.php');

        
        
        if(isset($_GET['id_item'])){
            $id_item= $_GET['id_item'];
            $id_buyer= $_GET['id_buyer'];

             $sql = "INSERT INTO buying(id_item,id_buyer) VALUES ('$id_item','$id_buyer')";
            //make the query and get result*
            $result = mysqli_query($conn,$sql);
        }
        
        $id_user= isset($_SESSION['id']) ? $_SESSION['id'] : 5 ;
        /* SELECT ALL THE ITEMS WITH BUYING ID */
        $id_buyer= isset($_GET['id_buyer']) ? $_GET['id_buyer'] : -1;
        //create a query 
        $sql = "SELECT * FROM Buying WHERE id_buyer='$id_buyer' ";
        //make the query and get result
        $result = mysqli_query($conn,$sql);
        //fetch results (row => array)
        $sells= mysqli_fetch_all($result,MYSQLI_ASSOC);;
        //checking of the information
        $count1 = mysqli_num_rows($result);
        /* // */ 
        
        

    
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
         <h1 class="recent-post-title">My Basket: </h1>
                <?php echo'<a class="btn read-more"  href="invoice2.php">Complete the orders !</a>';
                if($count1>0){
                foreach ($sells as $sell): 
                    $item= $sell['id_item'];
                    //create a query 
                    $sql = "SELECT * FROM listing WHERE id = '$item'";
                    //make the query and get result
                    $result = mysqli_query($conn,$sql);
                    //fetch results (row => array)
                    $single = mysqli_fetch_assoc($result);;
                    //checking of the information
                    $count = mysqli_num_rows($result);
                    
                    
                ?>
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
                                <i class="far fa-user">singleer:<strong> <?php echo $_SESSION['pseudo']?> </strong></i>
                                &nbsp;
                                <i class="far fa-list-alt">Category: <strong> <?php echo $single['categorie']?></strong></i>
                                &nbsp;
                                <i class="far calendar"> mar 11, 2020</i>
                                <a href="#" class="btn read-more">price: <?php echo $single['price']; ?>$</a>
                            </div>
                        </div>
                    <?php 
                endforeach;}
                else{
                    echo '<br/><br/> Your basket is empty !';
                }
                
                ?>    
        </div>  
	</div>
    <div class="sidebar">
			 <div class="section search">
				 <h2 class="section-title">search</h2>
				 <form action="index.php" method="POST">
					 <input type="text" name="search-term" class="text-input" placeholder="Search...">
				 </form>
			 </div>

			 <div class="section topics">
				 <h2 class="section-title">Topics</h2>
				 <ul>
					 <li><a href="#">book</a></li>
					 <li><a href="#">informatique</a></li>
					 <li><a href="#">clothes</a></li>
				 </ul>
			 </div>
		 </div>
    
   
	 <!--// Content-->


    <!--footer-->
	<?php include('index_footer.php'); ?>
	<!--// footer-->
    
</body>
</html>