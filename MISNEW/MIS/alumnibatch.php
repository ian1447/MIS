<?php
    include "Connection/dbcon.php";
    session_start();
    if(isset($_GET['course_abb']))
    {
        $_SESSION['course_abb'] = $_GET['course_abb'];
    }
    if ($_SESSION['privilege']=='user')
    {
        if ($_SESSION['course']!=$_SESSION['course_abb'])
        {
            header("Location:alumni.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
<body>
    <?php include "include/navbar.php"; ?>
    <form class="searchbox" method="POST">   
        <input type="text" id="search_text" placeholder=" Search Batch...." name="searchtext">   
        <button type="submit" name="submit" value="Submit">Search</button>   
    </form>  
    <div class="cardh_container">
        <?php
           if (!isset($_POST['submit'])){
            $sql1 = "SELECT batch_year FROM batch ORDER BY batch_year;";
            $actresult = mysqli_query($conn, $sql1);
            $count = 0;
            while($result = mysqli_fetch_assoc($actresult)) {?>
                <a href="showalumni.php?batch_year=<?php echo $result['batch_year']; ?>" >
                    <div class="cardh">
                        <div>
                            <p><?php echo $result['batch_year'];?></p>
                        </div> 
                    </div>
                </a><?php
            }} else {
                $sql1 = "SELECT batch_year FROM batch where batch_year='".$_POST['searchtext']."';";
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
                    <a href="showalumni.php?batch_year=<?php echo $result['batch_year']; ?>" >
                        <div class="cardh">
                            <div>
                                <p><?php echo $result['batch_year'];?></p>
                            </div> 
                        </div>
                    </a><?php
            }}}
        ?>
        <?php
            if ($_SESSION['privilege']=='admin')
            {?>
                <div class="admin_add_container">
                    <a href="addbatch.php?page=alumni.php">
                        <button type="submit" id="seeallbtn">Add Batch</button>
                    </a>
                </div><?php
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>