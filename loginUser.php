<?php
session_start();
$userId = $_SESSION['id'];
if($userId!=NULL)
{
    die("<meta http-equiv=\"refresh\" content=\"0; URL='index.php'\" >");
}
if(isset($_POST['user']))
{
   $userIn = $_POST['user']; 
}
 if(isset($_POST['pass']))
{   
$passIn = $_POST['pass'];
 }
else
{
    die("Failed to get user and pass");
}


echo "User: ";
echo $userIn;



// Create connection
$conn = new mysqli("localhost", "root", "", "realestatesys");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Looking for user " . $userIn . " and pass " . $passIn;
$sql = "SELECT * FROM siteusers WHERE user='" . $userIn . "' AND pass=sha('" .$passIn . "')";
$result = $conn->query($sql);
$userFname ="noname";
if($result==NULL)
{
    die("MYSQL Error");
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $userFname=$row["fName"];
        $userId = $row["ID"];
        echo "id: " . $userId. " - Name: " . $userFname . " " . $row["lName"]. "<br>";
        
    }
} else {
    echo "0 results";
        
        
       echo "<meta http-equiv=\"refresh\" content=\"0; URL='login.php?error=Invalid%20Username%20or%20Password.'\" >";
}

if($result->num_rows==1)
{
    $_SESSION['id'] = $userId;

    echo "Logged in. Welcome, " . $userFname;
     echo "<meta http-equiv=\"refresh\" content=\"0; URL='index.php'\" >";
}



$conn->close();





?>