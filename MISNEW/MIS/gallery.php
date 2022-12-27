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
    <div class="gallery_label_container">
        <p>Gallery</p>
    </div>
    <div class="cardh_gallery_container">
        <?php
            $sql1 = "SELECT DISTINCT album FROM `gallery`";
            $actresult = mysqli_query($conn, $sql1);
            while($result = mysqli_fetch_assoc($actresult)) {
            ?>
            <a href="showgallery.php?album=<?php echo $result['album']; ?>"><div class="cardh_news">
                <?php 
                    $sql2 = "SELECT img FROM `gallery` WHERE album='".$result['album']."' LIMIT 1";
                    $actresult2 = mysqli_query($conn, $sql2);
                    $result2 = mysqli_fetch_assoc($actresult2);
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($result2['img'] ).'" class="responsive_gallery" />';
                ?>
                <div>
                    <p><?php echo $result['album'];?></p>
                </div>
            </div></a><?php
            }     
        ?>
       
    </div> 
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>