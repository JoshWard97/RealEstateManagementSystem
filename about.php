

<?php
// Start the session
session_start();
$userId = $_SESSION['id'];
if($userId==NULL)
{
    //echo "<meta http-equiv=\"refresh\" content=\"0; URL='login.php'\" >";
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
    
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- https://www.w3schools.com/jquery/ajax_ajax.asp based on-->
    <script src="jquery-3.4.1.min.js"></script>
    <script>
   function showVid()
        {
            console.dir("SHOWING VID");
            document.getElementsByClassName("dataOut")[0].innerHTML = "<iframe  style=\"margin: 0 auto;display:block;\" id=\"content\" width=\"70%\" height=\"70%\" src=\"https://www.youtube.com/embed/x5GeSfXid14\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>"
        };
    </script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="wrapperMain biggerWrap"><?php if($userId!=NULL)
echo "<a href=\"logout.php\"><div class=\"logOut\">Log Out</div></a>";?> <br /><h2 id="hStyle">Real Estate Management System</h2> <br /><hr />
        <?php 
        $_GET['p']=2;
        if($userId!=NULL)
        include 'navBar.php'; 
        ?>
    <br />
    
    
    <h3>Welcome<?php if($userId!=NULL)
                echo ", " . $userFname; 

        
        ?></h3><br />
        
    <br />
    <br />
    <div class="dataOut bigger">
     <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="1.jpeg" alt="House" width="750" height="500">
        <div class="carousel-caption">
          <h3 class="whiteBG">Real Estate</h3>
          <p class="whiteBG">It can generate income like no other asset.</p>
        </div>
      </div>

      <div class="item">
        <img src="2.jpeg" alt="Chania" width="750" height="500">
        <div class="carousel-caption">
          <h3 class="whiteBG">Our Real Estate Management System</h3>
          <p class="whiteBG">We can help you keep track of all of your information while you plan your next move.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="3.jpeg" alt="Flower" width="750" height="500">
        <div class="carousel-caption">
          <h3 class="whiteBG">Properties</h3>
          <p class="whiteBG">Properties and Tenants can be hard to keep track of. That's why we've designed this system, to make your life easier!</p>
        </div>
      </div>

      <div class="item">
        <img src="4.jpeg" alt="Flower" width="750" height="500">
        <div class="carousel-caption">
          <h3 class="whiteBG">Encryption</h3>
          <p class="whiteBG">Our login system utilizes powerful encryption to help prevent any unauthorized access to your data.</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>    
    
    </div>
        
   <?php if($userId==NULL) echo "<a href=\"login.php\"><div class=\"wordButton\">Portal</div></a>";
        else echo "<button onClick=\"showVid()\" class=\"button\">Inspiration</button>"?>
        
    
    </div>
</body>

</html>