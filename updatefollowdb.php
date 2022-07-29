<?php 
include 'controllers/authController.php';


$user = $_POST['user'];
$user_followers = json_decode($_SESSION['user_followers_names']);

array_push($user_followers, $user);         
                                                             
$user_followers = json_encode($user_followers);
                                                             

$added_user_following = $_SESSION['user_following'] + 1;
$query = "UPDATE users SET user_followers_names=?, user_following=? WHERE id=? LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param('sss', $user_followers, $added_user_following, $_SESSION['id']);
$stmt->execute();

$_SESSION['user_followers_names'] = $user_followers;
$_SESSION['user_following'] = $added_user_following;



?>