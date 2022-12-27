<?php
    session_start();
    include "dbcon.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $privilege = validate($_POST['privilege']);

    if (empty($username )) {
        header("Location: ../login.php?error=Username is required");
        exit();
    }
    else if(empty($password)) {
        header ("Location: ../login.php?error=Password is required");
        exit();
    } 

    $sql = "SELECT * FROM users WHERE username='$username' and `password`='$password';";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1)
    {
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $username && $row['password'] === $password){
            if($row['privilege'] === $privilege)
            {
                echo "Logged IN";
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['course'] = $row['course'];
                $string = preg_replace('/\s+/', '', $row['batch']);
                $_SESSION['batch'] = $string;
                $_SESSION['privilege'] = $row['privilege'];
                header("Location: ../main.php");
                exit();
            }
            else
            {
                header("Location:../login.php?error=Invalid Privilege");
                exit();
            }
        }
    }
    else 
    {
        header("Location:../login.php?error=Incorrect Username or Password");
        exit();
    }
?>