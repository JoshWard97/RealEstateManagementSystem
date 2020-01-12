

<?php
// Start the session
session_start();
$userId = $_SESSION['id'];
if($userId==NULL)
{
    die("<meta http-equiv=\"refresh\" content=\"0; URL='about.php'\" >");
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
    <!-- https://www.w3schools.com/jquery/ajax_ajax.asp based on-->
    <script src="jquery-3.4.1.min.js"></script>
    <script>
    $(document).ready(function(){
  $.ajax({url: "stats.php", success: function(result){
    $(".dataOut").html(result);
  }});
});
    </script>
</head>
<body>
    <div class="wrapperMain"><a href="logout.php"><div class="logOut">Log Out</div></a><br /><h2 id="hStyle">Real Estate Management System</h2> <br /><hr />
        <?php 
        $_GET['p']=1;
        include 'navBar.php'; 
        ?>
    <br />
    
    
    <h3>Welcome, 
        <?php echo $userFname; 

        
        ?></h3><br />
        
    <br />
    <br />
   <div class="dataOut"></div>
        
        
        
    
    </div>
</body>
</html>
