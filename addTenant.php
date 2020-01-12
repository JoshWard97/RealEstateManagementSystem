<?php
session_start();

if(isset($_GET['fname']))
{
    $fname=$_GET['fname'];
}
if(isset($_GET['lname']))
{
    $lname=$_GET['lname'];
}
if(isset($_GET['DOB']))
{
    $dob=$_GET['DOB'];
}
if(isset($_GET['PID']))
{
    $tid=$_GET['PID'];
}

if(isset($_GET['fname'])&&isset($_GET['lname'])&&isset($_GET['DOB'])&&isset($_GET['PID']))
{
    //insert into table
    
// Create connection
$conn = new mysqli("localhost", "root", "", "realestatesys");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Looking for user " . $userIn . " and pass " . $passIn;
$sql = "INSERT INTO Tenants(fname,lname,dob,PID) VALUES ('$fname','$lname','$dob','$tid')";
if($conn->query($sql)===TRUE)
{
    //echo "New Person added"; //Now close tab
//    echo "<html><head></head><body><script>function closeCurrentWindow() {
//  window.close();
//}
//closeCurrentWindow();
//</script></body></html>";
    echo "<meta http-equiv=\"Refresh\" content=\"0; url=tenants.php\">";
}
else
    echo "Error.. :(   " . mysqli_error($conn);
    
}

?>