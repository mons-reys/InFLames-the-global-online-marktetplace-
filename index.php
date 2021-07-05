<?php
    session_start();
    //show message if sign up done !
    if(isset($_SESSION['listing_msg'])){
        echo $_SESSION['listing_msg'];
    }
    //unset the signup message
	unset($_SESSION['listing_msg']);
	if(isset($_GET['logout']))
	{	
		session_destroy();
		header('Location: login.php');
		session_start();
		$_SESSION['logout_msg']= '<script> alert("You logged out !");</script>';
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>blog</title>

<!--fontawsome-->
<script src="https://kit.fontawesome.com/6d3b596002.js" crossorigin="anonymous"></script>

<!-- Custom Styling -->
<link rel="stylesheet" type="text/css" href="css/Style2.css">

</head>
<body>
    <!-- Header -->
	<?php include('header.php') ?>
    <!-- / Header -->

    <!--page wrapper -->
	<div class="page-wrapper">

	 <!-- Post slider-->
	 <div class="post-slider">
		 <h1 class="slider-title">Tending Items</h1>
		 <i class="fas fa-chevron-left prev"></i>
		 <i class="fas fa-chevron-right next"></i>
		 <div class="post-wrapper">
			 <div class="post">
				 <img src="images/nikon.png " alt="img" class="slider-image">
				 <div class="post-info">
					<h4><a href="single.php">Nikon new camera is out ! </a></h4>
					<i class="far fa-user">Nikon </i>
					&nbsp; <!--space-->
					<i class="far fa-calendar"> Mar 8,2020 </i>
				 </div>
			 </div>
			 <div class="post">
				<img src="images/asus.Jpg " alt="img" class="slider-image">
				<div class="post-info">
				   <h4><a href="songle.php">The last version of asus !  </a></h4>
				   <i class="far fa-user">Asus </i>
				   &nbsp; <!--space-->
				   <i class="far fa-calendar"> Mar 8,2020 </i>
				</div>
			</div>
			<div class="post">
				<img src="images/nike.Jpg " alt="img" class="slider-image">
				<div class="post-info">
				   <h4><a href="songle.php">The best summer clothes pack </a></h4>
				   <i class="far fa-user">Nike </i>
				   &nbsp; <!--space-->
				   <i class="far fa-calendar"> Mar 8,2020 </i>
				</div>
			</div>
			<div class="post">
				<img src="images/prog.Jpg " alt="img" class="slider-image">
				<div class="post-info">
				   <h4><a href="songle.php">The best gaming phone </a></h4>
				   <i class="far fa-user">asus </i>
				   &nbsp; <!--space-->
				   <i class="far fa-calendar"> Mar 8,2020 </i>
				</div>
			</div>
			<div class="post">
				<img src="images/hp.Jpg " alt="img" class="slider-image">
				<div class="post-info">
				   <h4><a href="songle.php">Latest HP models </a></h4>
				   <i class="far fa-user">Hp </i>
				   &nbsp; <!--space-->
				   <i class="far fa-calendar"> Mar 8,2020 </i>
				</div>
			</div>
		 </div>
		 

	 </div>

	 <!-- Post slider-->

	 <!--Content  -->
	 <div class="content clearfix">
		 <div class="main-content">
			 <h1 class="recent-post-title">Recent Post</h1>
				<?php 
					//selecting all the db users and listings
					include('config/db_connect.php');
					include('config/select_all_listing.php');
					foreach ($items as $single):  
						$seller = $single['id_user'];
						include('config/select_all_users.php');	
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
								<i class="far fa-user">Seller:<strong> <?php  echo $user['pseudo'];?> </strong></i>
								&nbsp;
								<i class="far fa-list-alt">Category: <strong> <?php echo $single['categorie']?></strong></i>
								&nbsp;
								<i class="far calendar"> mar 11, 2020</i>
								<a href="mybasket.php?id_item=<?php echo $single['id']?>&id_buyer=<?php  echo $single['id_user'] ?>" class="btn read-more">Buy : <?php echo $single['price']; ?>$</a>
							</div>
						</div>
                	<?php  endforeach; ?>  	
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
					 <li><a href="#">Poems</a></li>
					 <li><a href="#">Quotes</a></li>
					 <li><a href="#">fiction</a></li>
					 <li><a href="#">Biography</a></li>
					 <li><a href="#">Motivation</a></li>
					 <li><a href="#">Insperation</a></li>
					 <li><a href="#">Life Lessons</a></li>
				 </ul>
			 </div>
		 </div>
		 

	 <!--// Content-->

	 </div>

	 <!-- // Page Wrapper-->


	<!--footer-->
	<?php include('index_footer.php'); ?>
	<!--// footer-->
	<!--JQuery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<!--Slick carousel-->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

	<!--Custom Script-->
	<script src="js/script.js"></script>
</body>
</html>