<?php 
    session_start();
    $status = $statusMsg = ''; 
    if(isset($_POST['submit']))
    {   
        include('config/db_connect.php');
        

        $filename= $_FILES['item']['name'];
       //$filetempname=$_FILES['item']['temp_name'];
        $target='images/'.basename($_FILES['item']['name']);

        $id_user= isset($_SESSION['id']) ? $_SESSION['id'] : 5 ;
        $title=mysqli_real_escape_string($conn,$_POST['title']);
        $categorie=mysqli_real_escape_string($conn,$_POST['categorie']);
        $price=mysqli_real_escape_string($conn,$_POST['price']);

        if(move_uploaded_file($_FILES['item']['name'],$target));
        {
            header('Location: dashboard.php');
        }

        //store the image

        $status = 'error'; 
        if(!empty($_FILES["image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
             
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
             
                // Insert image content into database 

        $sql = "INSERT INTO listing(id_user,title,categorie,price,image) VALUES ('$id_user','$title','$categorie','$price','$imgContent')";
        //make the query and get result*
        $result = mysqli_query($conn,$sql);

        if($result){ 
            $status = 'success'; 
            $statusMsg = "File uploaded successfully."; 
        }else{ 
            $statusMsg = "File upload failed, please try again."; 
        }  
    }else{ 
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
    } 
}else{ 
    $statusMsg = 'Please select an image file to upload.'; 
} 
        
        // if($result = mysqli_query($conn,$sql)){
        //     $_SESSION['listing_msg']='<script> alert("the item has added successfully !");</script>';
        //     header('Location: index.php');
        // } {
        //     echo'query error'.mysqli_error($conn);
        // }
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
    <link rel="stylesheet" type="text/css" href="css/Style2.css">

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
                    <h4>Create your listing : </h4>
                    <fieldset>
                        <label for="title">Title : </label><input type="text" name='title' placeholder="Title" id="title" required>
                    </fieldset>
                    <fieldset>
                        <label for="categorie">Categorie : </label> <select name="categorie" placeholder="categorie"  id="categorie">
                            <?php
                                include('config/db_connect.php');
                                include('config/select_all_categories.php');
                                foreach($category as $single):
                                    $name=$single['name'];
                                echo'<option value="'.$name.'">'.$name.'</option>';
                                endforeach;
                            ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label for="price">Price : </label><input type="text" name="price" placeholder="price" id="price" required>
                    </fieldset>
                    <fieldset>
                        <label for="item_picture">item picture: </label><input type="file" name="image" required>
                    </fieldset>
                    <button name="submit" type="submit" id="contact-submit">List the item</button>
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