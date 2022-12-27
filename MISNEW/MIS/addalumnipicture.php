<?php
include "Connection/dbcon.php";
include "tmpimg.php";
session_start();
if(isset($_GET['name']))
{
    $_SESSION['alumniname']=$_GET['name'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
<body>
    <?php include "include/navbar.php"; ?>
    <div class="add_container">
        <div class="add_label">
            <p>Add Alumni</p>
        </div>
        <div class="first_label_add">
            <p>Alumni Picture:</p>
        </div>
        <div class="alumni_picture_container">
            <form action='tmpimg.php?name=<?php $_GET["name"]?>' method="POST" enctype="multipart/form-data">        
                    <input type="file" name="image">
                    <input type="submit" name="upload" value="Upload">
            </form>
            <div>
            <?php              
                $sql1 = "SELECT * FROM `temp`;";
                $actresult = mysqli_query($conn, $sql1);
                while($result = mysqli_fetch_assoc($actresult)) {
                echo '<div>
                <img src="data:image/jpeg;base64,'.base64_encode($result['img'] ).'" height="auto" width="360vw" max-heigh="20vw" class="img-thumnail" />';
                echo "</div>";

            }?>
            </div>
        </div>
        <form method="POST">
            <div class="add_btn_container">
                <button type="submit" name="submit" value="Submit">Add</button>   
            </div>
        </form>
        <?php
            if (isset($_POST['submit']))
            {       
                $sql = "SELECT * FROM `temp`";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1)
                {
                    $insert = $conn->query("UPDATE `alumni` set img=(SELECT img FROM `temp`) where `name`='".$_SESSION['alumniname']."'"); 
                    if($insert){ 
                        $delete = $conn->query("DELETE from `temp`"); 
                        echo "<script>
                        alert('Alumni added successfully');
                        window.location.href='alumni.php';
                        </script>";
                    }else{ 
                        echo "<script>alert('failed')</script>";
                    } 
                }
                else
                {
                    echo "<script> alert('Please insert alumni image!')</script>";
                }
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>