<?php
include "Connection/dbcon.php";
include "tmpimg.php";
session_start();
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
            <p>Add Album</p>
        </div>
        <div class="first_label_add">
            <p>Alumni Picture:</p>
        </div>
        <div class="alumni_picture_container">
            <form action='multipleadd.php' method="POST" enctype="multipart/form-data" class="choose_form">  
                    <p>Enter Album:</p>
                    <input type="text" name = "album">   
                    <p>Choose Images:</p>
                    <input type="file" name="image[]" multiple>
                    <input type="submit" name="upload" value="Upload">
            </form>
            <div>
            <?php              
                $sql1 = "SELECT * FROM `temp`;";
                $actresult = mysqli_query($conn, $sql1);
                while($result = mysqli_fetch_assoc($actresult)) {
                echo '<img src="data:image/jpeg;base64,'.base64_encode($result['img'] ).'" height="auto" width="360vw" max-heigh="50vw" class="img-thumnail" />';
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
                if (mysqli_num_rows($result) >= 1)
                {
                    $insert = $conn->query("INSERT INTO `gallery` (img,album) (SELECT img,album FROM `temp`)"); 
                    
                    if($insert){ 
                        $delete = $conn->query("DELETE from `temp`"); 
                        echo "<script>
                        alert('Album added successfully');
                        window.location.href='gallery.php';
                        </script>";
                    }else{ 
                        echo "<script>alert('failed')</script>";
                    } 
                }
                else
                {
                    echo "<script> alert('Please insert image!')</script>";
                }
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>