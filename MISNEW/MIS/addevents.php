<?php
include "Connection/dbcon.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="jquery-ui.min.css">
<body>
    <?php include "include/navbar.php"; ?>
    <div class="add_container">
        <div class="add_label">
            <p>Add Events</p>
        </div>
        <form class=add_form method="POST">
            <div>
                <p>Event: </p>
                <textarea placeholder="Enter Event" type="text" name="event" ></textarea>
            </div>
            <div class="date_container">
                <p>Date: </p>
                <input type="text" id="datepicker" name="datepicker"/>    
            </div>
            <div class="add_btn_container">
                <button type="submit" name="submit" value="Submit">Add</button>   
            </div>
        </form>
        <?php
            if (isset($_POST['submit']))
            {
                if(!$_POST['event']==null)
                {
                    if (!$_POST['datepicker']==null)
                    {     
                        $date = date('Y-m-d', strtotime($_POST['datepicker']));
                        $sql = "INSERT INTO `events` (activity, activity_date)
                        VALUES ('".$_POST['event']."','".$date."')";
        
                         if ($conn->query($sql) === TRUE) {
                            echo "<script>
                            alert('Event added successfully');
                            window.location.href='main.php';
                            </script>";
                         } else {
                            echo '<script>alert("There was an error in adding the Event.")</script>';
                         }
                    } else {
                        echo "<script>alert('Date is required!')</script>";
                    }
                } else{
                    echo "<script>alert('Event is required!')</script>";
                }
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
    <script type="text/javascript" src="jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <script>
        $("#datepicker").datepicker();
    </script>
</body>
</head>
</html>