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
    <form class="searchbox" method="POST">   
        <input type="text" id="search_text" placeholder=" Search Alumni...." name="searchtext">   
        <button type="submit" name="submit" value="Submit">Search</button>   
    </form>  
    <div class="cardh_container">
        <?php
            if (!isset($_POST['submit'])){
            $sql1 = "SELECT course, course_abb FROM courses ORDER BY id;";
            $actresult = mysqli_query($conn, $sql1);
            while($result = mysqli_fetch_assoc($actresult)) {?>
                <a href="alumnibatch.php?course_abb=<?php echo $result['course_abb']; ?>" >
                    <div class="cardh">
                        <div>
                            <p><?php echo $result['course'];?></p>
                        </div> 
                    </div>
                </a><?php
            }} else {
                $sql1 = "SELECT course, course_abb FROM courses WHERE course_abb='".$_POST['searchtext']."';";
                $actresult = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($actresult) == 0){?>
                    <div class="cardh">
                            <div>
                                <p><?php echo "No Result Found";?></p>
                            </div> 
                        </div><?php
                }
                else{
                while($result = mysqli_fetch_assoc($actresult)) {?>
                    <a href="alumnibatch.php?course_abb=<?php echo $result['course_abb']; ?>" >
                        <div class="cardh">
                            <div>
                                <p><?php echo $result['course'];?></p>
                            </div> 
                        </div>
                    </a><?php
            }}}
        ?>
        <?php
            if ($_SESSION['privilege']=='admin')
            {?>
                <div class="admin_add_container">
                    <a href="addcourse.php?page=alumni">
                        <button type="submit" id="seeallbtn">Add Course</button>
                    </a>
                </div><?php
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>