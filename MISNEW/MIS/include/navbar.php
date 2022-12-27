<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="topframe"> </div>
    <div class="main_header">
        <div>
            <img src="img/Logo.png" class="responsive">
            <p id="main_header_text" style="line-height:120%;">BOHOL ISLAND STATE UNIVERSITY <br> BALILIHAN CAMPUS <br> MAGSIJA, BALILIHAN, BOHOL</p>
        </div>
        <ul>
            <li><a href="main.php">Home</a></li>
            <li><a href="alumni.php">Alumni</a></li>
            <li><a href="chat.php">Chat</a></li>
            <li><a href="news.php">News/Activities</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <div class="dropdown">
                <button class="dropbtn">More</button>
                <div class="dropdown-content">
                    <img src="img/Logo.png" class="responsive_dropdown">
                    <p><?php echo $_SESSION['username']; ?></p>
                    <a href="main.php">Home</a>
                    <a href="alumni.php">Alumni</a>
                    <a href="chat.php">Chat</a>
                    <a href="news.php">News/Activities</a>
                    <a href="gallery.php">Gallery</a>
                    <a href="organization.php">Association</a>
                    <a href="about.php">About</a>
                    <a href="settings.php">Settings</a>
                    <a href="Connection/logout.php">Logout</a>
                </div>
            </div>
        </ul>
</div>
</body>
</html>