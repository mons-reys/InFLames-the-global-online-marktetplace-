<header>
		<div class="logo">
			<a href="index.php"><h1 class="logo-text"><img src="images/logo-white.png"></h1></a>
		</div> 
		<i class="fa fa-bars menu-toggle"></i>
		<ul class="nav">
			
			<?php if(!isset($_SESSION['pseudo'])){ ?>
			<li><a href="login.php">Login</a></li>
			<li><a href="login.php">SignUp</a></li>
			<?php }
			else {
			?>
			<li><a href="index.php">home</a>
				<!--<ul style="left: 0px;">
					<li><a href="#">landing team</a></li>
					<li><a href="#">team</a></li>
				</ul>--> </li>
			<li><a href="#">about</a></li>
			<li><a href="#">services</a></li>
			<?php }?>
			<li><a href="#">
				<i class="fa fa-user"></i>
                <?php $pseudo =  isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : 'Guest';
                echo $pseudo;
                ?>
				<i class="fa fa-chevron-down" style="font-size: .8em;"></i>
			</a>
				<?php if($pseudo !='Guest'){ ?>
				<ul>
                    <li><a href="add_listing.php">create a listing</a></li>
					<li><a href="dashboard.php">dashboard</a></li>
					<li><a href="mybasket.php">My Basket</a></li>
					<li><a href="index.php?logout=1" class="logout">logout</a></li>
				</ul>
				<?php } ?>
			</li>
		</ul>
</header>