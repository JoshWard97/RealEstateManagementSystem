

<?php
// Start the session
session_start();
$userId = $_SESSION['id'];
if($userId==NULL)
{
    echo "<meta http-equiv=\"refresh\" content=\"0; URL='login.php'\" >";
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



<html lang=en>
<head>
<meta charset="utf-8">
<title>Park Data Management</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
    <div class="wrapperMain"><a href="logout.php"><div class="logOut">Log Out</div></a><br /><h2>Park Management System</h2> <br /><hr />
        <div class="menuWrap"><a href="index.php"><div class="menuItem">Home</div></a><div class="menuItem">Maintenance</div><div class="menuItem">Inc Ride</div><div class="menuItem activeItem">Tenants</div><div class="menuItem">Properties</div></div>
    <br />

    <br />
<div class="formHolder">
<form action="findGuestBackEnd.php" method="post">
<input name="fname" type="text" id="fname" placeholder="First Name">
<br />
<input name="lname" type="text" id="lname" placeholder="Last Name">

<br />
<button class="button" type="submit" name="submit">Find Tenant</button>
        
</form> 
</div>    
        
        
    
    </div>
</body>

