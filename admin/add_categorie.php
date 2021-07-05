<?php 
    if(isset($_POST['submit']))
    {
        include('../config/db_connect.php');
        include('../config/select_one_categorie.php');
        if(one_category($_POST['title'])){
            echo '<script> alert("the categorie already exist !");</script>';
        }
        else{
            $cat_name = $_POST['title'];
            $sql="INSERT INTO category(name) VALUE('$cat_name') ";
            $result = mysqli_query($conn,$sql);
            session_start();
            $_SESSION['categorie_added']= '<script> alert("the categorie has been added successfuly !");</script>';
            echo one_category($_POST['title']);
            header('Location: admin.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create listing</title>
    <!--fontawsome-->
    <script src="https://kit.fontawesome.com/6d3b596002.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" type="text/css" href="../css/Style2.css">

</head>
<body>
    <!-- Header -->
	<?php include('header.php') ?>
    <!-- / Header -->

    

    <!--Content  -->
	<div class="content clearfix">
		 <div class="main-content">
            <div class="container">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" id="contact" enctype="multipart/form-data">
                    <h4>Add Categorie : </h4>
                    <fieldset>
                        <label for="title">Title : </label><input type="text" name='title' placeholder="Title" id="title" required>
                    </fieldset>
                    <button name="submit" type="submit" id="contact-submit">Add Now !</button>
                </form>
            </div>
        </div>
	</div>
	 <!--// Content-->


    <!--footer-->
	<?php include('index_footer.php'); ?>
	<!--// footer-->
    
</body>
</html>