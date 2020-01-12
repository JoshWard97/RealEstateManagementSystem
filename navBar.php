<?php
$userId = $_SESSION['id'];
if($userId==NULL)
{
    die("<meta http-equiv=\"refresh\" content=\"0; URL='login.php'\" >");
}
if(!isset($_GET['p']))
{
    $p=0;
}
else
$p = $_GET['p'];

if($p=="0")
{
    echo "<div class=\"menuWrap\"><a href=\"index.php\"><div class=\"menuItem\">Home</div></a><a href=\"about.php\"><div class=\"menuItem\">About</div></a><a href=\"notes.php\"><div class=\"menuItem\">Notes</div></a><a href=\"tenants.php\"><div class=\"menuItem\">Tenants</div></a><a href=\"properties.php\"><div class=\"menuItem\">Properties</div></a></div>";
    
}
if($p=="1")
{
    echo "<div class=\"menuWrap\"><a href=\"index.php\"><div class=\"menuItem activeItem\">Home</div></a><a href=\"about.php\"><div class=\"menuItem\">About</div></a><a href=\"notes.php\"><div class=\"menuItem\">Notes</div></a><a href=\"tenants.php\"><div class=\"menuItem\">Tenants</div></a><a href=\"properties.php\"><div class=\"menuItem\">Properties</div></a></div>";
    
}
if($p=="2")
{
    echo "<div class=\"menuWrap\"><a href=\"index.php\"><div class=\"menuItem\">Home</div></a><a href=\"about.php\"><div class=\"menuItem activeItem\">About</div></a><a href=\"notes.php\"><div class=\"menuItem\">Notes</div></a><a href=\"tenants.php\"><div class=\"menuItem\">Tenants</div></a><a href=\"properties.php\"><div class=\"menuItem\">Properties</div></a></div>";
    
}
if($p=="3")
{
    echo "<div class=\"menuWrap\"><a href=\"index.php\"><div class=\"menuItem\">Home</div></a><a href=\"about.php\"><div class=\"menuItem\">About</div></a><a href=\"notes.php\"><div class=\"menuItem activeItem\">Notes</div></a><a href=\"tenants.php\"><div class=\"menuItem\">Tenants</div></a><a href=\"properties.php\"><div class=\"menuItem\">Properties</div></a></div>";
    
}
if($p=="4")
{
    echo "<div class=\"menuWrap\"><a href=\"index.php\"><div class=\"menuItem\">Home</div></a><a href=\"about.php\"><div class=\"menuItem\">About</div></a><a href=\"notes.php\"><div class=\"menuItem\">Notes</div></a><a href=\"tenants.php\"><div class=\"menuItem activeItem\">Tenants</div></a><a href=\"properties.php\"><div class=\"menuItem\">Properties</div></a></div>";
   
}
if($p=="5")
{
    echo "<div class=\"menuWrap\"><a href=\"index.php\"><div class=\"menuItem\">Home</div></a><a href=\"about.php\"><div class=\"menuItem\">About</div></a><a href=\"notes.php\"><div class=\"menuItem\">Notes</div></a><a href=\"tenants.php\"><div class=\"menuItem\">Tenants</div></a><a href=\"properties.php\"><div class=\"menuItem activeItem\">Properties</div></a></div>";
    
}



?>
