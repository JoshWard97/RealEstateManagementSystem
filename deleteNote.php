<?php
session_start();
$userId = $_SESSION['id'];
if($userId==NULL)
{
    die("<meta http-equiv=\"refresh\" content=\"0; URL='login.php'\" >");
}




    //insert into table
    
// Create connection
$conn = new mysqli("localhost", "root", "", "realestatesys");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Looking for user " . $userIn . " and pass " . $passIn;
$sql = "DELETE FROM notes WHERE userID='".$userId."' AND ID='".$_POST['ID']."';";
    
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
    

?>