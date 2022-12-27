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
    <?php
        $sql1 = "SELECT * FROM `users` WHERE id=".$_SESSION['id'].";";
        $actresult = mysqli_query($conn, $sql1);
        $result = mysqli_fetch_assoc($actresult);
    ?>
    <div class="add_container">
        <div class="add_label">
            <p>Add Alumni</p>
        </div>        
        <form class=add_alumni_form method="POST">
            <div>
                <p>Name: </p>
                <input class="add_alumni_common_inp" type="text" name="name" value="<?php echo $result['name']; ?>">
            </div>
            <div>
                <p>Birthdate: </p>
                <input class="add_alumni_common_inp" type="text" name="birthdate" value="<?php echo $result['birthdate']; ?>">
            </div>
            <div>
                <p>Address: </p>
                <input class="add_alumni_common_inp" type="text" name="address" value="<?php echo $result['address']; ?>">
            </div>
            <div>
                <p>Employment Status: </p>
                <input class="add_alumni_common_inp" type="text" name="status" value="<?php echo $result['employment_status']; ?>">
            </div>
            <div>
                <p>Place of Work: </p>
                <input class="add_alumni_common_inp" type="text" name="workplace" value="<?php echo $result['workplace']; ?>">
            </div>
            <div>
                <p>Gender: </p>
                <input class="add_alumni_common_inp" type="text" name="gender" value="<?php echo $result['gender']; ?>">
            </div>
            <div>
                <p>E-mail: </p>
                <input class="add_alumni_common_inp" type="text" name="email" value="<?php echo $result['email']; ?>"> 
            </div>
            <div>
                <p>Position: </p>
                <input class="add_alumni_common_inp" type="text" name="position" value="<?php echo $result['position']; ?>">
            </div>
            <div>
                <p>Username: </p>
                <input class="add_alumni_common_inp" type="text" name="uname" value="<?php echo $result['username']; ?>">
            </div>
            <div>
                <p>Password: </p>
                <input class="add_alumni_common_inp" type="text" name="pword" value="<?php echo $result['password']; ?>">
            </div>
            <div class="add_btn_container">
                <button type="submit" name="submit" value="Submit">Save</button>   
            </div>
        </form>
        <?php
            if (isset($_POST['submit']))
            {
                $err=0;
                if (!$_POST['name'] || !$_POST['birthdate'] || !$_POST['address'] || !$_POST['status'] || !$_POST['workplace'] ||!$_POST['gender']||!$_POST['email']||!$_POST['position']||!$_POST['uname']||!$_POST['pword'])
                {
                    echo "<script>alert('Fill up everything!')</script>";
                    $err = 1;
                }
                
                $delete = $conn->query("DELETE from `temp`"); 

                if ($err!=1 && $delete)
                {
                    $sql = "UPDATE `users` 
                    SET `username`='".$_POST['uname']."',`password`='".$_POST['pword']."',`name`='".$_POST['name']."',`birthdate`='".$_POST['birthdate']."',`address`='".$_POST['address']."',`employment_status`='".$_POST['status']."',
                    `workplace`='".$_POST['workplace']."',`gender`='".$_POST['gender']."',`email`='".$_POST['email']."',`position`='".$_POST['position']."',`address`='".$_POST['address']."'
                    WHERE `id` = '".$_SESSION['id']."';";
                    if ($conn->query($sql) === TRUE)
                    {
                        $_SESSION['username'] =  $_POST['uname'];
                        echo '<script>alert("Profile Edited Successfully!") 
                        window.location.href="main.php"</script>';
                    }
                    else{
                        echo "<script>alert('wa basasha') </script>";
                    }
                }
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>