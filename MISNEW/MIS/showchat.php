<?php
include "Connection/dbcon.php";
session_start();
if(isset($_GET['batch_year']))
{
    $_SESSION['batch_year'] = $_GET['batch_year'];
}
if ($_SESSION['privilege']=='user')
{
    if ($_SESSION['batch']!=$_SESSION['batch_year'])
    {
        header("Location: chatbatch.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="chatstyle.css">
    <meta http-equiv="refresh" content="15" />
    <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
<body>
    <?php include "include/navbar.php"; ?>
    <div class="chat_box_container">
        <p><?php echo "Batch ".$_SESSION['batch_year'];?></p>
        <div class="chat_box">
            <?php
                $sql1 = "SELECT CONCAT(chat_time,' ',`user`,': ', chat_text) AS chat_string FROM `chat` WHERE batch='".$_SESSION['batch_year']."' AND course='".$_SESSION['course_abb']."' ORDER BY chat_time ASC";
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
            $sql = "INSERT INTO chat (chat_time,chat_text,user,batch,course) VALUES (NOW(),'{$_POST['chattext']}','{$_SESSION['username']}','".$_SESSION['batch_year']."','".$_SESSION['course_abb']."')";
            mysqli_query($conn,$sql);
            header("Location:showchat.php");
        }
        ?>
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>