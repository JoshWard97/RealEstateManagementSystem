

<?php
// Start the session
session_start();
$userId = $_SESSION['id'];
if($userId==NULL)
{
    die("<meta http-equiv=\"refresh\" content=\"0; URL='login.php'\" >");
}


// Create connection
$conn = new mysqli("localhost", "root", "", "realestatesys");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Looking for user " . $userIn . " and pass " . $passIn;
$sql = "SELECT * FROM siteusers WHERE ID='" . $userId . "'";
$result = $conn->query($sql);
$userFname ="noname";
$userAccessLevel=0;
if($result==NULL)
{
    die("MYSQL Error");
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $userFname=$row["fName"];
        $userAccessLevel=$row["accessLevel"];
        $userId = $row["ID"];
        //echo "id: " . $userId. " - Name: " . $userFname . " " . $row["lName"]. "<br>";
        
    }

}

echo "";
?>


<!DOCTYPE html>
<html lang=en>
<head>
<meta charset="utf-8">
<title>Real Estate Management System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jawgrd.js"></script>
</head>
<body>
    <div class="wrapperMain"><a href="logout.php"><div class="logOut">Log Out</div></a><br /><h2 id="hStyle">Real Estate Management System</h2> <br /><hr />
        <?php 
        $_GET['p']=0;
        include 'navBar.php'; 
        ?>
    
       
    <br />
<?php
$con=mysqli_connect("localhost","root","","realestatesys");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "<div class=\"dataOut\">";
$result = mysqli_query($con,"SELECT * FROM Tenants WHERE ID='".$_GET['id']."'");   
$PIDCurrent;
$i = 0;
while($row = mysqli_fetch_array($result))
{      
$i++;    
$PIDCurrent = $row['PID'];
echo "<h3>Name: ". $row['fname']." " . $row['lname']. "</h3>";
echo "<h3>DOB: ". $row['DOB']."</h3>";
echo "<h3>PID: ". $PIDCurrent ."</h3>";
echo "<h3>Phone Number: " .$row['phoneNum']  . "</h3>";
break;
}
        
        
        
        
        
        
        
        
        
$result = mysqli_query($con,"SELECT * FROM Tenants WHERE PID='".$PIDCurrent."' AND ID<>'" . $_GET['id'] ."'");

echo "<table>
<tr><th colspan='5'>Roomates</th>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>DOB</th>
<th>Property ID</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr class=\"trDope\" onclick=\"window.location='tenant.php?id=" . $row['ID'] . "'\">";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['fname'] . "</td>";
echo "<td>" . $row['lname'] . "</td>";
echo "<td>" . $row['DOB'] . "</td>";
echo "<td>" . $row['PID'] . "</td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
        <br />
    </div>
        
        
        
    
    </div>
</body>
</html>
