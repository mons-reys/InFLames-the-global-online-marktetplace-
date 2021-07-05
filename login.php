<?php 
    session_start();
    //show message if sign up done !
    if(isset($_SESSION['signup_msg'])){
        echo "<p>".$_SESSION['signup_msg']."</p>";
    }
    
    //unset the signup message
    unset($_SESSION['signup_msg']);
    
    //logout msg
    if(isset($_SESSION['logout_msg'])){
        echo "<p>".$_SESSION['logout_msg']."</p>";
    }

    unset($_SESSION['logout_msg']);

    //connect db
    include('config/db_connect.php');
    
    if(isset($_POST['submit']))
    {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
         //hashing the password
        //$hash = password_hash( mysqli_real_escape_string($conn,$_POST['password']),PASSWORD_DEFAULT);


        //create a query 
        $sql = "SELECT * FROM user WHERE email='$email'";
        //make the query and get result
        $result = mysqli_query($conn,$sql);
        //fetch results (row => array)
        $user= mysqli_fetch_assoc($result);
        //checking of the information
        $count = mysqli_num_rows($result);
      
      // If result matched $email and $password, table row must be 1 row
		
      if($count == 1 && (password_verify($password,$user['password']))) {
            session_start();
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['id'] = $user['id'];
            header('Location: index.php?');
        }

        else{
            echo '<script> alert("User or Passwords don\'t match !");</script>';
        }
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://kit.fontawesome.com/6d3b596002.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="style.js"></script>
        <title>espace membre</title>
    </head>
    <body>
        <!-- The video
            <video autoplay muted loop id="myVideo">
                <source src="vd/rain.mp4" type="video/mp4">
            </video>

        Optional: some overlay text to describe the video
        <div class="content">
            <h1>Mons</h1>
            <p>Welcome...</p>
            Use a button to pause/play the video with JavaScript 
            <button id="myBtn" onclick="myFunction()">Pause</button>
        </div> -->
        <div class="container">  
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" id="contact" >
                <h3><img src="images/logo-black.png"></h3>
                <h4>Login</h4>
                <fieldset>
                    <input placeholder="Your Email" type="text" tabindex="1" required autofocus name="email" <?php if(isset($_COOKIE['pseudo'])){echo "value='{$_COOKIE['pseudo']}'";} ?>>
                </fieldset>
                <fieldset>
                    <input placeholder="Password" type="password" name="password" tabindex="2"  required>
                </fieldset>
                <fieldset>
                    <input  type="checkbox" name="remember" id="remember"><label for="remember"> remember my password</label>
                </fieldset>
                <button name="submit" type="submit" id="contact-submit">Login</button>
                <p><a href="Signup.php">Sign Up</a> With Email. By signing up you indicate that you have read and agree to Inflames's <a>Terms of Service</a> and <a>Privacy Policy</a>.</p>
                <p class="copyright">Designed by  Mons </p>
            </form>
        </div>
        <!--footer-->
        <?php include('footer.php');; ?>
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

