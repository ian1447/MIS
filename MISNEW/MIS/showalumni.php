<?php
    include "Connection/dbcon.php";
    session_start();
    $year = $_GET['batch_year'];
    $course = $_SESSION['course_abb'];
    if ($_SESSION['privilege']=='user')
    {
        if ($_SESSION['batch']!=$year)
        {
            header("Location: alumnibatch.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
    <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
<body>
    <?php include "include/navbar.php"; ?>
    <div class="alumni_container">
        <?php
            $sql1 = "SELECT * FROM alumni WHERE batch='".$year."' AND course_name='".$_SESSION['course_abb']."'ORDER BY date_added;";
            $actresult = mysqli_query($conn, $sql1);
            while($result = mysqli_fetch_assoc($actresult)) {
                echo '<div class="single_alumni_container">
                <img src="data:image/jpeg;base64,'.base64_encode($result['img'] ).'"  height="auto" width="100%" max-heigh="20vw" />'; ?>
                <h2><b> <?php echo $result['name']; ?></b></h2>
                <p><?php echo $result['course_name'];
                echo "</div>";
            }?>
    </div>
    <?php
            if ($_SESSION['privilege']=='admin')
            {?>
                <div class="add_alumni_container">
                    <a href="addalumni.php?batch=<?php echo $year;?> & course=<?php echo $course;?>">
                        <button type="submit" id="seeallbtn">Add Alumni</button>
                    </a>
                </div><?php
            }
        ?>

    <?php include "include/footer.php"; ?>
</body>
</head>
</html>