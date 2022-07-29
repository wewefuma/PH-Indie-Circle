<?php include 'controllers/authController.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="main.css">
<title>PH Indie Circle - Register</title>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-md-4 offset-md-4 form-wrapper auth">
        <h3 class="text-center form-title"><img src="img/PIClogo.png" alt="logo" class="img-fluid" width="80px" height="80px">Edit Profile</h3>
        <?php if (count($errors) > 0): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
    <?php echo $error; ?>
    </li>
    <?php endforeach;?>
</div>
<?php endif;?>
        <form action="index.php" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control form-control-lg" value="<?php echo $username; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control form-control-lg" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label>Bio</label>
            <textarea class="form-control" name="bio" rows="5"></textarea>
        </div>
        
        <div class="form-group">
            <button type="submit" name="saveedit-btn" class="btn btn-lg btn-block">Save Edit</button>
        </div>
        </form>
    </div>
    </div>
</div>
</body>
</html>