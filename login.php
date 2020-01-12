<?php
// Start the session
session_start();
$error = " ";
if(isset($_GET["error"]))
{
    $error = $_GET["error"];
}
$userId = $_SESSION['id'];
if($userId!=NULL)
{
    die("<meta http-equiv=\"refresh\" content=\"0; URL='index.php'\" >");
}

?>


<!DOCTYPE html>
<html lang=en>
<head>
<meta charset="utf-8">
<title>Real Estate Management System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
    <div class="wrapper"><br /><h2 id="hStyle">Real Estate Management System</h2> <br /><hr />
    
  <?php   if($error!=" "){ echo "<div class=\"error\"> " . $error ."</div>"; }   ?>
    <br />
    <br />
        <form action='loginUser.php' method="post"><input type='text' name="user" placeholder="Username"><br /><br /><input type='password' name="pass" placeholder="Password"><br />
        <br />
        <button type="submit" name="submit" class="button">Submit</button>
        </form>
    </div>
</body>
</html>