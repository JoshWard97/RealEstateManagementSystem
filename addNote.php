<?php
session_start();
$userId = $_SESSION['id'];
if($userId==NULL)
{
    die("<meta http-equiv=\"refresh\" content=\"0; URL='login.php'\" >");
}

if(isset($_POST['title']))
{
    $title=$_POST['title'];
}
if(isset($_POST['desc']))
{
    $desc=$_POST['desc'];
}
date_default_timezone_set("America/Chicago");
$date = date("Y-m-d");

if(isset($_POST['title'])&&isset($_POST['desc']))
{
    //insert into table
    
// Create connection
$conn = new mysqli("localhost", "root", "", "realestatesys");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Looking for user " . $userIn . " and pass " . $passIn;
$sql = "INSERT INTO `realestatesys`.`notes` (`title`, `date`, `desc`, `userID`) VALUES ('".$title."', '".$date."', '".$desc."', '".$userId. "');";
//$mysqli->real_escape_string($title);
//$mysqli->real_escape_string($date);
//$mysqli->real_escape_string($desc);
    
if($conn->query($sql)===TRUE)
{
    //echo "New Person added"; //Now close tab
//    echo "<html><head></head><body><script>function closeCurrentWindow() {
//  window.close();
//}
//closeCurrentWindow();
//</script></body></html>";
    echo "<meta http-equiv=\"Refresh\" content=\"0; url=notes.php\">";
}
else
    echo "conn Error.. :( query:" .$sql . "<br />  " . mysqli_error($conn);
    
}
else
echo "Error.. :(   query:";

?>