<?php 
    if(isset($_POST['submit']))
    {
        if(is_string($_POST['categorie']))
        {
            include('../config/db_connect.php');
            include('../config/select_one_categorie.php');
            if(one_category($_POST['categorie'])){
                echo '<script> alert("the categorie already exist try another name !");</script>';
            }
            else{
            $new_name= $_POST['rename'];
            $old_name= $_POST['categorie'];
            include('../config/db_connect.php');
            $sql = "UPDATE category SET name ='$new_name' WHERE name ='$old_name' ";
	        //make the query and get result
            if($result = mysqli_query($conn,$sql))
            {
                echo'yess';
            }
            else
            {
                echo'noo';
            }
            session_start();
            $_SESSION['categorie_added']= '<script> alert("the categorie has been edited successfuly !");</script>';
            header('Location: admin.php');
        }
        
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
                    <h4>Edit Categorie : </h4>
                    <fieldset>
                        <label for="categorie">Categorie : </label> <select name="categorie" placeholder="categorie"  id="categorie">
                            <?php
                                    include('../config/db_connect.php');
                                    include('../config/select_all_categories.php');
                                    foreach($category as $single):
                                        $name=$single['name'];
                                    echo'<option value="'.$name.'">'.$name.'</option>';
                                    endforeach;
                            ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="title">Rename : </label><input type="text" name='rename' placeholder="Title" id="title" required>
                    </fieldset>
                    <button name="submit" type="submit" id="contact-submit">Edit Now !</button>
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