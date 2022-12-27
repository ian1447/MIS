<?php 
    include "Connection/dbcon.php";
    if(isset($_POST["upload"])){ 
        if(!empty($_FILES["image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
            
                $insert = $conn->query("INSERT into `temp` (img) VALUES ('$imgContent')"); 
                if($insert){ 
                    echo "<script>window.location.href='addalumnipicture.php'</script>";
                }else{ 
                    echo "<script>
                        alert('Failed');
                        window.location.href='addalumnipicture.php';
                        </script>";
                }  
            }else{ 
                echo "<script>
                alert('Not Supported');
                window.location.href='addalumnipicture.php';
                </script>";
            } 
        }else{ 
            echo "<script>
                alert('No Name!');
                window.location.href='addalumnipicture.php';
                </script>";
        } 
    }
?>