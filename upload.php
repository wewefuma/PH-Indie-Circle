<?php 
// If file upload form is submitted
session_start();

$users_id = $_SESSION['id'];
$status = $statusMsg = '';
 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));
            $text = $_POST['post_summary'];
         
            // Insert image content into database 
            $insert = $db->query("INSERT INTO posts (post_summary, picture, likes, users_id) VALUES ('$text', '$imgContent', '0', '$users_id')"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    }
    
    header('localtion: index.php?id='. $users_id);
} 
 
// Display status message 
echo $statusMsg; 
?>