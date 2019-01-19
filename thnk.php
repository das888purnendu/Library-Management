<?php 
session_start(); 
$name2=$_SESSION["sname"];
$email=$_SESSION["semail"];
?>

<?php header('Refresh: 5; URL=index.php'); ?>

<!DOCTYPE html>
<html>
    <head>
       
    
    </head>
    
    <bod>
        <div style="background:rgba(84, 239, 3, 0.25);border:1px solid red;box-shadow:0px 0px 20px red;margin:5% 10%;">
        <center>
        <h1>Thank You <?php echo $name2; ?> </h1>
        <h1>Your Email id <u><?php echo $email; ?></u>  is your  Login Id</h1>
        <h3>Now You Log in with your Email Id And Password</h3>
            <h2>This Page is Aoutomatically Redirect To The Login Page</h2>
			<h1>Thank You</h1></center>
            </div>
            
            <?php session_destroy();  ?>
    
    </bod>

</html>