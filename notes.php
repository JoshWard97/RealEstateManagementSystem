

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
        var form = "<div class=\"formHolder\"><form action=\"addNote.php\" method=\"POST\"><input type=\"text\" name=\"title\" placeholder=\"Title\"></br><textarea name=\"desc\" placeholder=\"Description\"></textarea></br><button type=\"submit\" name=\"submit\" class=\"button\">Submit</button></form></div>";
        var i = 1;
        var data;
     function addNote()
        {
            if(i%2==1)
            {
            document.getElementsByClassName("dataOut")[0].innerHTML=form;
            document.getElementsByClassName("wordButton")[0].innerHTML="Back";
            } 
            if(i%2==0)
                {
                   document.getElementsByClassName("dataOut")[0].innerHTML=data;
            document.getElementsByClassName("wordButton")[0].innerHTML="Add";  
                }
            i++;
        };
        function getData()
        {
            data =  document.getElementsByClassName("dataOut")[0].innerHTML;
        };
        function confirmDel(id)
        {
            if(confirm("Are you sure you want to delete this note?"))
                {
                  document.getElementById(id).submit();  
                }
        };
        window.onload=getData;
    
    </script>

<title>Real Estate Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
   
</head>
<body>
    <div class="wrapperMain"><a href="logout.php"><div class="logOut">Log Out</div></a><br /><h2 id="hStyle">Real Estate Management System</h2> <br /><hr />
        <?php 
        $_GET['p']=3;
        include 'navBar.php'; 
        ?><br />
    <div class="wordButtonContainer"><div onClick="addNote()" class="wordButton">Add</div></div>
        <br />
    <div class="dataOut">
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
$sql = "SELECT * FROM notes WHERE userID='" . $userId . "'";
$result = $conn->query($sql);
$userFname ="noname";

if($result==NULL)
{
    die("MYSQL Error");
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title=$row["title"];
        $date=$row["date"];
        $desc = $row["desc"];
        //echo "id: " . $userId. " - Name: " . $userFname . " " . $row["lName"]. "<br>";
        
        
        //https://getbootstrap.com/docs/4.0/components/card/ is the source
        echo "<div class=\"card\" style=\"width: 18rem;\">
  <div class=\"card-body\"><div onClick=\"confirmDel(".$row['ID'] .")\" class=\"wordButton rightAlign\">x</div><form id=\"".$row['ID']."\" class=\"flat\" action=\"deleteNote.php\" method=\"POST\"><input class=\"flat\" type=\"hidden\" name=\"ID\" value=\"".$row['ID']."\"></form>
    <h5 class=\"card-title\">" . $title . "</h5>
    <h6 class=\"card-subtitle mb-2 text-muted\">".$date."</h6>
    <p class=\"card-text\">".$desc."</p>
    
  </div>
</div>

";
        
    }

}

echo "";
?>
    </div>
        
        
        
    
    </div>
</body>

</html>