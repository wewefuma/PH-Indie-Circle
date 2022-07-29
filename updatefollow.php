    
<?php
include 'controllers/authController.php';

$sql = "SELECT * From users WHERE id !=?";   
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $_SESSION['id']);
if($stmt->execute())
{
    $result = $stmt->get_result();
    $followers = json_decode($_SESSION['user_followers_names']);
    $counter = 0;
    while($user = $result->fetch_assoc())
    {
        if($counter == 2)
        {
        break;
        }
        if(in_array($user['username'], $followers))
        {
                                            
        }
        else
        {
            echo '<div class="card-body">',
            '<img src="data:image/jpg;base64,'.base64_encode($user['profile_pic']),
            '"alt="img" width="80px" height="80px" class="rounded-circle mb-4" style="float:left";>',
            '<h6>', $user['username'], '</h6>',
            '<button class="btn btn-outline-info" id="',$user['username'] ,
            '-button" name="', $user['username'],'"btn-sm mb-3"><i class="fas fa-user-friends"></i>Follow</button>', '</div>';
        $counter++;
        }                
    }
    $stmt->close();
}
?>
                                