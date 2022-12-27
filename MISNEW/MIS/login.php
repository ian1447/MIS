<!DOCTYPE>
<html>
<head>
    <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
    <title></title>
    <link rel="stylesheet" href="style.css" type="text/css">
    
<body class="loginpage">
    <!--<img src="img/BISU.png">-->
    <div class="topframe"></div>
    <div>
        <a href="index.php">
            <img src="img/Logo.png" width="80vw" height="auto">
        </a>
    </div>
    <form method="POST" class="loginform" style="color:black;" action="Connection/logincheck.php">
        <div class="loginerrordiv">
            <?php if (isset($_GET['error'])) { ?>
                <p class="loginerror"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        </div>
        <p class="loginlabel">Username:</p>
        <div class="logindiv">
            <input type="text" id="username" name="username">
        </div>
        <br>
        <p class="loginlabel">Password:</p>
        <div class="logindiv">
            <input type="password" id="password" name="password" >
        </div>
        <div class="loginselectdiv">
            <select name="privilege" id="privilege">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="loginselectdiv">
            <button type="submit" id="loginbtn" >Login</button>
        </div>
    </form>
</body>
</head>
</html>