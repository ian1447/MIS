<?php 
    include "Connection/dbcon.php";
    if(isset($_POST["upload"])){ 
        $album = $_POST['album'];
        $images = $_FILES['image'];
        $num_of_images = count($images['name']);
        for ($i=0; $i< $num_of_images; $i++)
        {
               $image_name = $images['name'][$i]; 
               $tmp_name = $images['tmp_name'][$i];
               $error = $images['error'][$i]; 

               if ($error===0)
               {
                    $img_ex = pathinfo($image_name,PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowTypes = array('jpg','png','jpeg'); 
                    if (in_array($img_ex_lc, $allowTypes))
                    {
                        $imgContent = addslashes(file_get_contents($tmp_name)); 
                    
                        $insert = $conn->query("INSERT into `temp` (img,album) VALUES ('$imgContent','$album')"); 
                        if($insert){ 
                            echo "<script>window.location.href='addalbum.php'</script>";
                        }else{ 
                            echo "<script>
                                alert('Failed');
                                window.location.href='addalbum.php';
                                </script>";
                        }  
                    }
                    else
                    {
                        echo "<script>
                        alert('Not Supported');
                        window.location.href='addalbum.php';
                        </script>";
                    }
               }
               else
               {
                echo "<script>
                    alert('No Name!');
                    window.location.href='addalbum.php';
                    </script>";
               }
        }
    }
?>
