<!DOCTYPE>
<html>
<head>
<script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>
    <title></title>
    <link rel="stylesheet" href="style.css">
<body class="index">
    <!--<img src="img/BISU.png">-->
    <div class="topframe"></div>
    <div class="index_img">
        <img src="img/Logo.png" width="80vw" height="auto">
        <p class="header_text" style="line-height:120%;">BOHOL ISLAND STATE UNIVERSITY <br> BALILIHAN CAMPUS <br> MAGSIJA, BALILIHAN, BOHOL</p>
    </div>
    <div class="welcome_text" >WELCOME</div>
    <div class="index_login_container">
        <a href="login.php">
            <button type="submit" id="index_login" >Login</button>
        </a>
    </div>
</body>
</head>
</html>