<?php
 $var_value = $_GET['varname'];
 echo $var_value;
?>
<!-- <?php
include "../Connection/dbcon.php";
session_start();
if ($_SESSION['privilege']=='user')
{
    if ($_SESSION['batch']!='2018-2019')
    {
        header("Location: ../BSETchatbatch.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../chatstyle.css">
    <meta http-equiv="refresh" content="15" />
    <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
<body>
<div class="topframe"> </div>
    <div class="main_header">
        <div>
            <img src="../img/Logo.png" class="responsive">
            <p id="main_header_text" style="line-height:120%;">BOHOL ISLAND STATE UNIVERSITY <br> BALILIHAN CAMPUS <br> MAGSIJA, BALILIHAN, BOHOL</p>
        </div>
        <ul>
            <li><a href="../main.php">Home</a></li>
            <li><a href="../alumni.php">Alumni</a></li>
            <li><a href="../chat.php">Chat</a></li>
            <li><a href="../news.php">News/Activities</a></li>
            <li><a href="../gallery.php">Gallery</a></li>
            <div class="dropdown">
                <button class="dropbtn">More</button>
                <div class="dropdown-content">
                    <img src="../img/Logo.png" class="responsive_dropdown">
                    <p><?php echo $_SESSION['username']; ?></p>
                    <a href="../main.php">Home</a>
                    <a href="../alumni.php">Alumni</a>
                    <a href="../chat.php">Chat</a>
                    <a href="../news.php">News/Activities</a>
                    <a href="#">Gallery</a>
                    <a href="#">Association</a>
                    <a href="#">About</a>
                    <a href="../Connection/logout.php">Logout</a>
                </div>
            </div>
        </ul>
</div>
    <div class="chat_box_container">
        <p> Batch 2017-2018 </p>
        <div class="chat_box">
            <?php
                $sql1 = "SELECT CONCAT(chat_time,' ',`user`,': ', chat_text) AS chat_string FROM `chat` WHERE batch='2017-2018' AND course='BSET' ORDER BY chat_time ASC";
                $actresult = mysqli_query($conn, $sql1);
                $count = 0;
                while($result = mysqli_fetch_assoc($actresult)) {
                    echo $result['chat_string'];
                    echo "<br>";
                }
            ?>
        </div>    
        <form class="userchatbox" method="POST">   
            <input type="text" id="chat_text" name="chattext">   
            <button type="submit" name="submit" value="Submit">Chat</button>   
        </form>  
    </div>
     <?php
        if (isset($_POST['submit'])){
            $sql = "INSERT INTO chat (chat_time,chat_text,user,batch,course) VALUES (NOW(),'{$_POST['chattext']}','{$_SESSION['username']}','2017-2018','BSET')";
            mysqli_query($conn,$sql);
            header("Location:BSIT1718chat.php");
        }
        ?>
    <?php include "../include/footer.php"; ?> */
</body>
</head>
</html> -->

