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
            <p>Add Events</p>
        </div>
        <form class=add_form method="POST">
            <div class="add_course_div">
                <p>Batch:</p>
                <input type="text" name="batch"/>  
            </div>
            <div class="add_btn_container">
                <button type="submit" name="submit" value="Submit">Add</button>   
            </div>
        </form>
        <?php
            if (isset($_POST['submit']))
            {
                if (!$_POST['batch']==null)
                {     
                    $sql1 = "SELECT * FROM batch WHERE batch_year='".$_POST['batch']."';";
                    $result = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result) === 1)
                    {
                        echo '<script>alert("Batch already exists.")</script>';
                    }else
                    {
                        $sql = "INSERT INTO `batch` (batch_year,date_addedd)
                        VALUES ('".$_POST['batch']."',NOW())";
                        if ($conn->query($sql) === TRUE) {
                        if($_GET['page']==="alumni")
                        {
                            echo "<script>
                            alert('Batch added successfully');
                            window.location.href='alumnibatch.php';
                            </script>";
                        }
                        else{
                            echo "<script>
                            alert('Batch added successfully');
                            window.location.href='chatbatch.php';
                            </script>";
                        }
                        } else {
                        echo '<script>alert("There was an error in adding the Event.")</script>';
                        }
                    }
                } else {
                }
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
    <script>
        $("#datepicker").datepicker();
    </script>
</body>
</head>
</html>