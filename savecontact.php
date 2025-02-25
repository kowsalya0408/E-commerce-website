<?php
require_once 'Config.php';

if(isset($_POST["submit"]))
{ 
   
		
        $name=$_POST['name'];
        $Email=$_POST['email'];
		$surname=$_POST['surname'];
		$message=$_POST['message'];
		
 // Insert image content into database 
            $insert = $conn->query("INSERT INTO `contact` (`Id`, `Name`, `surname`, `Email`, `Message`) VALUES (NULL, ' $name', '$surname', '$Email', '$message');"); 
             
            if($insert){ 
            echo '<script type="text/javascript">alert("SUBMITED SUCCESSFULLY!");</script>'; 
            echo "<script>setTimeout(\"location='contact.php'\",50);</script>";
            }else{ 
               
            }  
        }
		else{ 
           
        } 

?>