

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
    <script>
        var form="<div class=\"formHolder\"><form action=\"addTenant.php\" method=\"GET\"><input type=\"text\" name=\"fname\" placeholder=\"First Name\"></br><input type=\"text\" name=\"lname\" placeholder=\"Last Name\"></br><input type=\"number\" name=\"PID\" placeholder=\"Property ID\"></br><input type=\"date\"  name=\"DOB\" placeholder=\"Monthly Rent\"></br><button type=\"submit\" name=\"submit\" class=\"button\">Submit</button></form></div>";
      var i = 1;
        var data;
    
    function addTenant()
        {
            if(i%2==0)
            {
                
                document.getElementsByClassName("wordButton")[0].innerHTML="Add";
            document.getElementsByClassName("dataOut")[0].innerHTML=data;
            
            }
            if(i%2==1)
            {
            document.getElementsByClassName("dataOut")[0].innerHTML=form;
            document.getElementsByClassName("wordButton")[0].innerHTML="Back"
        
            }
            i++;
        };
        function setData()
        {
            data = document.getElementsByClassName("dataOut")[0].innerHTML;
        }
        window.onload=setData;
    
    
    </script>
<title>Real Estate Management System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jawgrd.js"></script>
</head>
<body>
    <div class="wrapperMain"><a href="logout.php"><div class="logOut">Log Out</div></a><br /><h2 id="hStyle">Real Estate Management System</h2> <br /><hr />
        <?php 
        $_GET['p']=4;
        include 'navBar.php'; 
        ?>
  <br />
    
        <div class="wordButton" onClick="addTenant()">Add</div>
    <br />
    <?php
$con=mysqli_connect("localhost","root","","realestatesys");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM Tenants");

echo "<div class=\"dataOut\"><table>
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
echo "</table></div>";

mysqli_close($con);
?>
        <br />
     
        
        
        
    
    </div>
</body>
</html>
