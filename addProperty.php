<?php
session_start();
$userId = $_SESSION['id'];
if($userId==NULL)
{
    die("<meta http-equiv=\"refresh\" content=\"0; URL='login.php'\" >");
}
if(isset($_GET['address']))
{
    $addy=$_GET['address'];
}
if(isset($_GET['baths']))
{
    $baths=$_GET['baths'];
}
if(isset($_GET['beds']))
{
    $beds=$_GET['beds'];
}
if(isset($_GET['rent']))
{
    $rent=$_GET['rent'];
}

if(isset($_GET['address'])&&isset($_GET['baths'])&&isset($_GET['beds'])&&isset($_GET['rent']))
{
    //insert into table
    
// Create connection
$conn = new mysqli("localhost", "root", "", "realestatesys");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Looking for user " . $userIn . " and pass " . $passIn;
$sql = "INSERT INTO Properties(address,bedrooms,baths,rentAMonth,occupied) VALUES ('$addy','$beds','$baths','$rent','0')";
if($conn->query($sql)===TRUE)
{
    //echo "New Person added"; //Now close tab
    echo "<meta http-equiv=\"Refresh\" content=\"0; url=properties.php\">";
}
else
    echo "Error.. :(   " . mysqli_error($conn);
    
}

?>