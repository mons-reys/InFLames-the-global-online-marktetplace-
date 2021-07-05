<?php 
    session_start();

    include('config/db_connect.php');
    
    if(isset($_POST['submit']))
    {
        $pseudo = mysqli_real_escape_string($conn,$_POST['pseudo']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $re_password = mysqli_real_escape_string($conn,$_POST['re_password']);
        
        //checking the re_password with the password 
        if((preg_match("#^[1-9a-zA-Z-_.]{6,}$#","$password") && ($re_password == $password) )){
            //checking the pseudo and the email if they exist
            include('config/email_db_check.php');
            if($count == 1) {
                echo '<script> alert("email is already taken. Try to change it or new choose one !");</script>';
            }
            else{
                include('config/pseudo_db_check.php');
                if($count == 1) {
                    echo '<script> alert("pseudo is already taken. Try to change it or new choose one !");</script>';
                }
                else{
                    //hashing the password
                    $password = password_hash( mysqli_real_escape_string($conn,$_POST['password']),PASSWORD_DEFAULT);
                    //create a query 
                    $sql = "INSERT INTO user(pseudo,email,password) VALUES ('$pseudo','$email','$password')";
                    //make the query and get result
                    if($result = mysqli_query($conn,$sql)){
                        $_SESSION['signup_msg']='<script> alert("you have signed up successfully !");</script>';
                        header('Location: login.php');
                    } {
                        echo'query error'.mysqli_error($conn);
                    }
                } 
            }
        }  
        else{
                echo '<script> alert("password invalid ! try an other one ");</script>';
            }
       
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="style.js"></script>
        <title>espace membre</title>
    </head>
    <body>
                <!-- The video
        <video autoplay muted loop id="myVideo">
        <source src="rain.mp4" type="video/mp4">
        </video>

        Optional: some overlay text to describe the video 
        <div class="content">
        <h1>Mons</h1>
        <p>Welcome...</p>
        Use a button to pause/play the video with JavaScript 
        <button id="myBtn" onclick="myFunction()">Pause</button>
        </div> -->

        <div class="container">  
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="contact" >
                <h3><img src="images/logo-black.png"></h3>
                <h4>SignUp FREE</h4>
                <fieldset>
                    <input placeholder="Your Pseudo" type="text" tabindex="1" required autofocus name="pseudo">
                </fieldset>
                <fieldset>
                    <input placeholder="Your Email Address" type="email" tabindex="2" name="email" required>
                </fieldset>
                <fieldset>
                    <input placeholder="Password" type="password" name="password" tabindex="2"  required>
                </fieldset>
                <fieldset>
                    <input placeholder="Confirm Password" type="password" tabindex="2" name="re_password"  required>
                </fieldset>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Sign Up</button>
                    <a href="login.php">cancel</a>
                </fieldset>
                <p class="copyright">Designed by Mons</p>
            </form>
        </div>
        
        <!--footer-->
        <?php include('footer.php'); ?>
        <!-- / footer-->
            <!--JS script-->
        <script>
        // Get the video
        var video = document.getElementById("myVideo");

        // Get the button
        var btn = document.getElementById("myBtn");

        // Pause and play the video, and change the button text
        function myFunction() {
        if (video.paused) {
            video.play();
            btn.innerHTML = "Pause";
        } else {
            video.pause();
            btn.innerHTML = "Play";
        }
        }
        </script>
        <!--/ JS script-->
  </body>
</html>
