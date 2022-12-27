<?php
include "Connection/dbcon.php";
$delete = $conn->query("DELETE from `temp`"); 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
    <body style="background-color: orange;">
    <?php include "include/navbar.php"; ?>
    <div class="main_picture">
        <p id="main_welcome">Welcome!</p>
    </div>
    <div class="main_white">
        <div class="topframe"> </div>
        <form class="main_post" method="POST">
            <div class="text_container">
                <textarea placeholder="Enter new posts" type="text" id="new_post" name="new_post" ></textarea>
            </div>
            <div class="button_container">
                <button type="submit" id="postbtn" value="Submit" name="submit">Post</button>
            </div>
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                $sql = "INSERT INTO news (title,date_added,added_by)
                VALUES ('".$_POST['new_post']."',NOW(),'".$_SESSION['username']."')";

                if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Post Added Sucessfully.")</script>';
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        ?>

        <!-- news/activities -->
        <p class="main_white_label">News/Activity</p>
        <div class="card_container">
            <div class="card">
            <?php
                $sql1 = "SELECT `news_img` FROM news ORDER BY date_added";
                $actresult = mysqli_query($conn, $sql1);
                $count = 1;
                while($result = mysqli_fetch_assoc($actresult)) {
                    if ($count==1) {
                        if ($result['news_img']==NULL)
                        {
                            echo "<img src='img/BISU.png' style='width:25vw; max-height:20vw; height:auto'>";
                        }
                        else
                        {
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($result['news_img'] ).'" height="auto" width="100%" max-heigh="20vw"" />';
                        }
                        ?>
                        <?php 
                }$count++;} ?>
                <!-- <img src="img/BISU.png" style="width:25vw; max-height:20vw; height:auto"> -->
                <div class="container">
                    <?php
                        $sql1 = "SELECT title FROM news ORDER BY date_added";
                        $actresult = mysqli_query($conn, $sql1);
                        $count = 1;
                        while($result = mysqli_fetch_assoc($actresult)) {
                            if ($count==1) {
                                ?>
                        <h2><b> <?php echo $result['title']; 
                        $count++; ?></b></h2>
                        <?php 
                        }}     
                    ?>
                </div>
            </div>
            <div class="card">
            <?php
                $sql1 = "SELECT `news_img` FROM news ORDER BY date_added";
                $actresult = mysqli_query($conn, $sql1);
                $count = 1;
                while($result = mysqli_fetch_assoc($actresult)) {
                    if ($count==2) {
                        if ($result['news_img']==NULL)
                        {
                            echo "<img src='img/BISU.png' style='width:25vw; max-height:20vw; height:auto'>";
                        }
                        else
                        {
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($result['news_img'] ).'" height="auto" width="100%" max-heigh="20vw"" />';
                        }
                       ?>
                        <?php 
                } $count++;} ?>
                <div class="container">
                <?php
                        $sql1 = "SELECT title FROM news ORDER BY date_added";
                        $actresult = mysqli_query($conn, $sql1);
                        $count = 1;
                        while($result = mysqli_fetch_assoc($actresult)) {
                            if ($count==2) {?>
                        <h2><b> <?php echo $result['title']; 
                        ?></b></h2>
                        <?php 
                        }
                        $count++;}
                    ?>
                </div>
            </div>
            <div class="card">
            <?php
                $sql1 = "SELECT `news_img` FROM news ORDER BY date_added";
                $actresult = mysqli_query($conn, $sql1);
                $count = 1;
                while($result = mysqli_fetch_assoc($actresult)) {
                    if ($count==3) {
                        if ($result['news_img']==NULL)
                        {
                            echo "<img src='img/BISU.png' style='width:25vw; max-height:20vw; height:auto'>";
                        }
                        else
                        {
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($result['news_img'] ).'" height="auto" width="100%" max-heigh="20vw"" />';
                        }
                       ?>
                        <?php 
                } $count++;} ?>
                <div class="container">
                <?php
                        $sql1 = "SELECT title FROM news ORDER BY date_added";
                        $actresult = mysqli_query($conn, $sql1);
                        $count = 1;
                        while($result = mysqli_fetch_assoc($actresult)) {
                            if ($count==3) {?>
                                <h2><b> <?php echo $result['title']; 
                                ?></b></h2>
                        <?php 
                        }
                        $count++; }
                    ?>
                </div>
            </div>
        </div>

        <div class="seeall_container">
            <a href="news.php">
                <button type="submit" id="seeallbtn">See All</button>
            </a>
        </div>
    
        <!-- gallery -->
        <p class="main_white_label">Gallery</p>
        <div class="card_container">
            <div class="card">
            <?php
                $sql1 = "SELECT `img` FROM gallery ORDER BY `date`";
                $actresult = mysqli_query($conn, $sql1);
                $count = 1;
                while($result = mysqli_fetch_assoc($actresult)) {
                    if ($count==1) {
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($result['img'] ).'" height="auto" width="100%" max-heigh="20vw" />';
                       ?>
                        <?php 
                } $count++;} ?>
            </div>
            <div class="card">
            <?php
                $sql1 = "SELECT `img` FROM gallery ORDER BY `date`";
                $actresult = mysqli_query($conn, $sql1);
                $count = 1;
                while($result = mysqli_fetch_assoc($actresult)) {
                    if ($count==2) {
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($result['img'] ).'" height="auto" width="100%" max-heigh="20vw" />';
                       ?>
                        <?php 
                } $count++;} ?>
            </div>
            <div class="card">
            <?php
                $sql1 = "SELECT `img` FROM gallery ORDER BY `date`";
                $actresult = mysqli_query($conn, $sql1);
                $count = 1;
                while($result = mysqli_fetch_assoc($actresult)) {
                    if ($count==3) {
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($result['img'] ).'" height="auto" width="100%" max-heigh="20vw" />';
                       ?>
                        <?php 
                } $count++;} ?>
            </div>
        </div>

        <div class="seeall_container">
            <a href="gallery.php">
                <button type="submit" id="seeallbtn">See All</button>
            </a>
        </div>

        <!-- events -->
        <p class="main_white_label">Upcoming Events</p>
        <div class="main_scroll_container">
            <div class="main_scroll">
                <?php
                    $sql1 = "SELECT activity,DATE_FORMAT(activity_date, '%M-%d-%Y') AS duedate FROM `events` ORDER BY activity_date";
                    $actresult = mysqli_query($conn, $sql1);
                    while($result = mysqli_fetch_assoc($actresult)) {
                        echo $result['duedate']."<br>&nbsp&nbsp&nbsp&nbsp&nbsp".$result['activity'];
                        echo "<br>";
                    }     
                ?>
            </div>
        </div>
        <?php
            if ($_SESSION['privilege']=='admin')
            {?>
                <div class="seeall_container">
                    <a href="addevents.php">
                        <button type="submit" id="seeallbtn">Add Events</button>
                    </a>
                </div><?php
            }
        ?>
        <?php
            if ($_SESSION['privilege']=='admin')
            {?>
                <div class="seeall_container">
                    <a href="addalbum.php">
                        <button type="submit" id="seeallbtn">Add Album</button>
                    </a>
                </div><?php
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
    </body>
    </head>
    </html>
    <?php
}
else  {
    header("Location: login.php");
    exit();
}