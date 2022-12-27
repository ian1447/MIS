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
            <div>
                <p>Course Name: </p>
                <textarea placeholder="Enter Course Name" type="text" name="coursename" ></textarea>
            </div>
            <div class="add_course_div">
                <p>Course Abbreviation: </p>
                <input type="text" name="courseabb"/>  
            </div>
            <div class="add_btn_container">
                <button type="submit" name="submit" value="Submit">Add</button>   
            </div>
        </form>
        <?php
            if (isset($_POST['submit']))
            {
                if(!$_POST['coursename']==null)
                {
                    if (!$_POST['courseabb']==null)
                    {     
                        $sql1 = "SELECT * FROM courses WHERE course_abb='".$_POST['courseabb']."';";
                        $result = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result) === 1)
                        {
                            echo '<script>alert("Course already exists.")</script>';
                        }else{
                            $sql = "INSERT INTO `courses` (course, course_abb,date_addedd)
                            VALUES ('".$_POST['coursename']."','".$_POST['courseabb']."',NOW())";
            
                             if ($conn->query($sql) === TRUE) {
                                if($_GET['page']==="alumni")
                                {
                                    echo "<script>
                                    alert('Course added successfully');
                                    window.location.href='alumni.php';
                                    </script>";
                                }
                                else{
                                    echo "<script>
                                    alert('Course added successfully');
                                    window.location.href='chat.php';
                                    </script>";
                                }
                             } else {
                                echo '<script>alert("There was an error in adding the Event.")</script>';
                             }
                        }
                    } else {
                        echo "<script>alert('Course Abbreviation is required!')</script>";
                    }
                } else{
                    echo "<script>alert('Course Name is required!')</script>";
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