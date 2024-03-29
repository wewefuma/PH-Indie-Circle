<?php
session_start();
$username = "";
$email = "";
$errors = [];


$conn = new mysqli('localhost', 'root', '', 'phindiecircle_registration');

// SIGN UP USER
if (isset($_POST['signup-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['username'] = "Username already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO users SET username=?, email=?, password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $username, $email, $password);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            header('location: index.php?id=' . $user_id);
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
}



// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);  
        $stmt->bind_param('ss', $username, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (!$user) {
                $errors['login_fail'] = "Wrong username / password";
            }
            else if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_followers_names'] = $user['user_followers_names'];
                $_SESSION['user_following'] = $user['user_following'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php?id=' . $user['id']);
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}

//Edit Profile

if(isset($_POST['saveedit-btn']))
{
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['bio'])) {
        $errors['bio'] = 'Bio cannot be blank';
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['username'] = "Username already exists";
    }


    if (count($errors) === 0) 
    {

        $query = "UPDATE users SET username=?, bio=?, email=? WHERE id=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssss', $username, $bio, $email, $_SESSION['id']);
        
        if($stmt->execute())
        {
            $stmt->close();
            $query = "SELECT * FROM users WHERE id=? LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $_SESSION['id']);
            
            if($stmt->execute())
            {
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                if (!$user) {
                    $stmt->close();
                }else
                {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['bio'] = $user['bio'];
                    $stmt->close();

                }

            }


           
           
        }
        
    }







}
