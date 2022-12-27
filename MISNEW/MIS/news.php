<?php
include "Connection/dbcon.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
<body>
    <?php include "include/navbar.php"; ?>
    <div class="news_label_container">
        <p>News/Activity</p>
    </div>
    <div class="cardh_news_container">
        <?php
            $sql1 = "SELECT news_img, title FROM `news` ORDER BY date_added";
            $actresult = mysqli_query($conn, $sql1);
            while($result = mysqli_fetch_assoc($actresult)) {
            ?><div class="cardh_news">
                <?php 
                    if ($result['news_img']==null)
                    {?>
                        <img src="img/BISU.png" class="responsive_news">
                    <?php } else {
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($result['news_img'] ).'" class="responsive_news" />';
                    }
                ?>
                <div>
                    <p><?php echo $result['title'];?></p>
                </div>
            </div><?php
            }     
        ?>
    </div>

    <?php include "include/footer.php"; ?>
</body>
</head>
</html>