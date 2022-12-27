<?php
include "Connection/dbcon.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> Settings </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="topframe"></div>
 
<div class="boxall">
    <div class="normaldiv">
        <a href="editprofile.php">Edit Profile</a>
    </div>
    <div class="normaldiv">
        <a href="report.php">Reports</a>
    </div>
    <div class="normaldiv">
        <a href="Connection/logout.php">Logout</a>
    </div>
</div>
<div class="footer">
    <p id="footer_text" style="line-height:120%;">BOHOL ISLAND STATE UNIVERSITY <br> BALILIHAN CAMPUS <br> MAGSIJA, BALILIHAN, BOHOL</p>
</div>
</body>
</html>