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
    <div class="add_container">
        <div class="add_label">
            <p>Add Alumni</p>
        </div>        
        <form class=add_alumni_form method="POST">
            <div>
                <p>Name: </p>
                <input class="add_alumni_common_inp" type="text" name="name">
            </div>
            <div>
                <p>Birthdate: </p>
                <input class="add_alumni_common_inp" type="text" name="birthdate">
            </div>
            <div>
                <p>Address: </p>
                <input class="add_alumni_common_inp" type="text" name="address">
            </div>
            <div>
                <p>Employment Status: </p>
                <input class="add_alumni_common_inp" type="text" name="status">
            </div>
            <div>
                <p>Place of Work: </p>
                <input class="add_alumni_common_inp" type="text" name="workplace">
            </div>
            <div>
                <p>Gender: </p>
                <input class="add_alumni_common_inp" type="text" name="gender">
            </div>
            <div>
                <p>E-mail: </p>
                <input class="add_alumni_common_inp" type="text" name="email">
            </div>
            <div>
                <p>Position: </p>
                <input class="add_alumni_common_inp" type="text" name="position">
            </div>
            <div>
                <p>Username: </p>
                <input class="add_alumni_common_inp" type="text" name="uname">
            </div>
            <div>
                <p>Password: </p>
                <input class="add_alumni_common_inp" type="text" name="pword">
            </div>
            <div class="add_btn_container">
                <button type="submit" name="submit" value="Submit">Save and Select Alumni Photo</button>   
            </div>
        </form>
        <?php
            $trimmedbatch = trim($_GET['batch'],"&nbsp;");
            if (isset($_POST['submit']))
            {
                $sql = "SELECT * FROM users WHERE username='".$_POST['uname']."' and `password`='".$_POST['pword']."';";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1)
                {
                    echo "<script>alert('Username and Password already taken!')</script>";
                }
                else
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
                        $sql = "INSERT INTO `users` (username,`password`,batch,course,privilege,`name`,birthdate,`address`,employment_status,workplace,gender,email,position,added_on)
                        VALUES('".$_POST['uname']."','".$_POST['pword']."','".$trimmedbatch."','".$_GET['course']."','user','".$_POST['name']."',
                        '".$_POST['birthdate']."','".$_POST['address']."','".$_POST['status']."','".$_POST['workplace']."','".$_POST['gender']."',
                        '".$_POST['email']."','".$_POST['position']."',NOW())";
                        $sql2 = "INSERT INTO alumni (course_name,batch,date_added,`name`)
                        VALUES ('".$_GET['course']."','".$_GET['batch']."',NOW(),'".$_POST['name']."')";
                        $conn->query($sql2);
                        if ($conn->query($sql) === TRUE)
                        {
                            echo '<script>alert("Alumni added successfully\n Please Select Alumni Picutre") 
                            window.location.href="addalumnipicture.php?name='.$_POST['name'].' & course='.$_GET['course'].' & batch='.$_GET['batch'].'"</script>';
                        }
                        else{
                            echo "<script>alert('wa basasha') </script>";
                        }
                    }
                }
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>