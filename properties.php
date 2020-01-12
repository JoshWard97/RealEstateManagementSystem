

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
<html lang="en">
<head>
<meta charset="utf-8">
<title>Real Estate Management System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var i = 1;
        var data;
        var form = "<div class=\"formHolder\"><form action=\"addProperty.php\" method=\"GET\"><input type=\"text\" name=\"address\" placeholder=\"Address\"></br><input type=\"number\" name=\"beds\" placeholder=\"Bedrooms\"></br><input type=\"number\" name=\"baths\" placeholder=\"Bathrooms\"></br><input type=\"number\" name=\"rent\" step=\"0.01\" placeholder=\"Monthly Rent\"></br><button type=\"submit\" name=\"submit\" class=\"button\">Submit</button></form></div>";
    function addProp()
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
</head>
<body>
    <div class="wrapperMain"><a href="logout.php"><div class="logOut">Log Out</div></a><br /><h2 id="hStyle">Real Estate Management System</h2> <br /><hr />
    <?php 
        $_GET['p']=5;
        include 'navBar.php'; 
        ?>
    <br />
  
    
        <div class="wordButtonContainer"><div onClick="addProp()" class="wordButton">Add</div></div>
    <br />
    <?php
$con=mysqli_connect("localhost","root","","realestatesys");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM Properties");

echo "<div class=\"dataOut\"><table>
<tr>
<th>Address</th>
<th>Bedrooms</th>
<th>Bathrooms</th>
<th>Rent per Month</th>
<th>Occupied</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr class=\"trDope\" onclick=\"window.location='property.php?id=" . $row['PID'] . "'\">";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['bedrooms'] . "</td>";
echo "<td>" . $row['baths'] . "</td>";
echo "<td>" . $row['rentAMonth'] . "</td>";
echo "<td>";
    if($row['occupied']=="0")
    {
        echo "No </td>";
    }
    else
    {
        echo "Yes </td>";
    }

echo "</tr>";
}
echo "</table></div>";

mysqli_close($con);
?>
        <br />
     
        
        
        
    
    </div>
</body>
</html>
