

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
//Number of notes
$sql = "SELECT * FROM notes WHERE userID='" . $userId . "'";
$result = $conn->query($sql);
$userFname ="noname";
$userAccessLevel=0;
if($result==NULL)
{
    die("MYSQL Error");
}

    // output data of each row
  echo "<h3>Notes: " .$result->num_rows ."</h3>";
$sql = "SELECT * FROM Tenants WHERE pManID='" . $userId . "'";
$result = $conn->query($sql);

if($result==NULL)
{
    die("MYSQL Error");
}

    // output data of each row
  echo "<h3>Tenants: " .$result->num_rows ."</h3>";

//get num of properties
$sql = "SELECT * FROM Properties WHERE pManID='" . $userId . "'";
$result = $conn->query($sql);

if($result==NULL)
{
    die("MYSQL Error");
}

    // output data of each row
  echo "<h3>Properties: " .$result->num_rows ."</h3>";


//find rent per month
$sql = "SELECT * FROM Properties WHERE pManID='" . $userId . "' AND occupied='1'";
$result = $conn->query($sql);

if($result==NULL)
{
    die("MYSQL Error");
}
$rent=0;
while($row = mysqli_fetch_array($result))
{
    $rent+=$row['rentAMonth'];
}
    // output data of each row
  echo "<h3>Rent: $" .$rent ." per Month</h3>";



echo "";
?>
