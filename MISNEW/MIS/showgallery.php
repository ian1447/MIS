<?php
    include "Connection/dbcon.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style.css">
    <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
<body>
    <?php include "include/navbar.php"; ?>
    
    <div class="album_header">
        <?php
            echo $_GET['album'];
        ?>
    </div>
    <div class="showgallery_container">
        <?php
            $sql1 = "SELECT img FROM gallery WHERE album ='".$_GET['album']."' ORDER BY DATE ASC;";
            $actresult = mysqli_query($conn, $sql1);
            while($result = mysqli_fetch_assoc($actresult)) {
                echo '<div>
                <img src="data:image/jpeg;base64,'.base64_encode($result['img'] ).'" height="90%" width="100%"/>
                 </div>';
            }
        ?>
    </div>
    <?php include "include/footer.php"; ?>
</body>
</head>
</html>