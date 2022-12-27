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
    <div class="cardh_container_report">
        <?php
            $sql1 = "SELECT course, course_abb FROM courses ORDER BY id;";
            $actresult = mysqli_query($conn, $sql1);
            while($result = mysqli_fetch_assoc($actresult)) {?>
            <p>
                    <div class="cardh_report">
                        <div>
                            <p><?php echo $result['course'].":";?></p>
                            <?php 
                                $sql2 = "SELECT COUNT(*) AS `count` FROM `alumni` a WHERE a.`course_name`='".$result['course_abb']."';";
                                $actresult1 = mysqli_query($conn, $sql2);
                                $result1 = mysqli_fetch_assoc($actresult1);
                            ?>
                            <p><?php echo $result1['count']." Alumnis"; ?></p>
                        </div> 
                    </div>
            </p><?php
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>