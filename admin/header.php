<header>
		<div class="logo">
			<a href="../index.php"><h1 class="logo-text"><img src="../images/logo-white.png"></h1></a>
		</div> 
		<i class="fa fa-bars menu-toggle"></i>
		<ul class="nav">
		
			<li><a href="index.php">home</a>
				<!--<ul style="left: 0px;">
					<li><a href="#">landing team</a></li>
					<li><a href="#">team</a></li>
				</ul>--> </li>
			<li><a href="#">about</a></li>
			<li><a href="#">services</a></li>
			<li><a href="#">
				<i class="fa fa-user"></i>
				<?php
				$pseudo =$_SESSION['pseudo']='admin';
                echo $pseudo;
                ?>
				<i class="fa fa-chevron-down" style="font-size: .8em;"></i>
			</a>
				<ul>
					<li><a href="add_categorie.php">add categorie</a></li>
					<li><a href="delete_categorie.php">delete categorie</a></li>
					<li><a href="edit_categorie.php">edit categorie</a></li>
				</ul>
			</li>
		</ul>
</header>