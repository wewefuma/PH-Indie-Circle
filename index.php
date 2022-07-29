<?php 
include 'controllers/authController.php';
?>

<?php
// redirect user to login page if they're not logged in
    if (empty($_SESSION['id'])) {
        header('location: login.php');
        
    }  
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link rel="stylesheet" href="style.css">

        <!------------------LIght BOx for Gallery-------------->
        <link rel="stylesheet" href="lightbox.min.css">
        <script type="text/javascript" src="lightbox-plus-jquery.min.js"></script>
        <!------------------LIght BOx for Gallery-------------->
        <title>PH Indie Circle</title>
    </head>
<body>
    <!-------------------------------NAvigation Starts------------------>
    <nav class="navbar navbar-expand-md navbar-dark mb-4" style="background-color:#3097D1">
        <a href="index.php" class="navbar-brand"><img src="img/brand-white.png" alt="logo" class="img-fluid" width="80px" height="100px"></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#responsive"><span class="navbar-toggler-icon"></span></button>


        <div class="collapse navbar-collapse" id="responsive">
            <ul class="navbar-nav mr-auto text-capitalize">
                <li class="nav-item"><a href="index.php" class="nav-link active">home</a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link">profile</a></li>
                <li class="nav-item"><a href="#modalview" class="nav-link" data-toggle="modal">messages</a></li>
                <li class="nav-item dropdown">
       
                    <a class="nav-link" href ="#" id = "dropdown01" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Notifications<span class="badge badge-light">
                    <?php 
                    $sql = "SELECT COUNT(*) as total FROM notifications WHERE notif_active=1;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0)
                    {
                        $row = mysqli_fetch_assoc($result);
                        echo $row['total'];
                    }
                    
                    ?>
                
                    </span></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">                
                    
                    <?php
                    $sql = "SELECT * FROM notifications WHERE notif_active=1;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                        echo '<a class="dropdown-item" href="#"><b class="text-primary">', $row['profile_name'], '</b>', ' ', $row['notif_action'], '</a>';
                        }
                    }
                    ?> 
                    </li>
                    
                <li class="nav-item"><a href="#" class="nav-link d-md-none">logout</a></li>

            </ul>

            <form action="" class="form-inline ml-auto d-none d-md-block">
                <input type="text" name="search" id="search" placeholder="Search" class="form-control form-control-sm">
            </form>
            <p>&ensp;</p> 
            <a href="logout.php" style="color: white">Logout</a>
        </div>
    </nav>

    <!---------------------------------------------Ends navigation------------------------------>

    <!---------------------------MOdal Section  satrts------------------->

    <div class="modal fade" id="modalview">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title h4">Messages</div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <ul class="list-unstyled">
                     <a href="#" class="text-decoration-none">
                        <li class="media hover-media">
                                <img src="img/avatar-dhg.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">

                                <div class="media-body text-dark">
                                        <h6 class="media-header">Jchob Thunder and <strong> 1 others</strong></h6>
                                        <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                        </li>
                    </a>
                    <hr class="my-3">

                    <a href="#" class="text-decoration-none">
                        <li class="media hover-media">
                            <img src="img/avatar-fat.jpg" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
    
                            <div class="media-body text-dark">
                                <h6 class="media-header">Mark Otto and <strong> 3 others</strong></h6>
                                <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </li>
                    </a>


                    <hr class="my-3">
                    <a href="#" class="text-decoration-none">
                        <li class="media hover-media">
                            <img src="img/avatar-mdo.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">

                                <div class="media-body text-dark">
                                    <h6 class="media-header">Archer andu and <strong> 5 others</strong></h6>
                                    <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                        </li>
                    </a>

                    <hr class="my-3">
                    <a href="#" class="text-decoration-none">
                        <li class="media hover-media">
                            <img src="img/avatar-dhg.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">

                                <div class="media-body text-dark">
                                    <h6 class="media-header">Jchob Thunder and <strong> 1 others</strong></h6>
                                    <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                        </li>
                    </a>

                    <hr class="my-3">
                        <a href="#" class="text-decoration-none">
                            <li class="media hover-media">
                                <img src="img/avatar-fat.jpg" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
            
                                <div class="media-body text-dark">
                                    <h6 class="media-header">Mark Otto and <strong> 3 others</strong></h6>
                                    <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            
                                </div>
                            </li>
                        </a>
        
                    <hr class="my-3">
                        <a href="#" class="text-decoration-none">
                            <li class="media hover-media">
                                <img src="img/avatar-mdo.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
            
                                <div class="media-body text-dark">
                                    <h6 class="media-header">Archer andu and <strong> 5 others</strong></h6>
                                    <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                            </li>
                        </a>

                        
                    <hr class="my-3">
                        <a href="#" class="text-decoration-none">
                            <li class="media hover-media">
                                <img src="img/avatar-dhg.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
                
                                <div class="media-body text-dark">
                                    <h6 class="media-header">Jchob Thunder and <strong> 1 others</strong></h6>
                                    <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                            </li>
                        </a>
                                
                    <hr class="my-3">
                        <a href="#" class="text-decoration-none">
                            <li class="media hover-media">
                                <img src="img/avatar-fat.jpg" alt="img" width="60px" height="60px" class="rounded-circle mr-3">

                                <div class="media-body text-dark">
                                    <h6 class="media-header">Mark Otto and <strong> 3 others</strong></h6>
                                    <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                            </li>
                        </a>
                
                    <hr class="my-3">
                        <a href="#" class="text-decoration-none">
                            <li class="media hover-media">
                                <img src="img/avatar-mdo.png" alt="img" width="60px" height="60px" class="rounded-circle mr-3">
                    
                                <div class="media-body text-dark">
                                    <h6 class="media-header">Archer andu and <strong> 5 others</strong></h6>
                                    <p class="media-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------------MOdal Ends---------------------------->
    <!-------------------------------------------Start Grids layout for lg-xl-3 columns and (xs-lg 1 columns)--------------------------------->

    <div class="container">
        <div class="row">
            <!--------------------------left columns  start-->
            <div class="col-12 col-lg-3">
                <div class="left-column">
                    <div class="card card-left1 mb-4" >
                        <img src="img/photo-1455448972184-de647495d428.jpg" alt="" class="card-img-top img-fluid">
                        <div class="card-body text-center ">
                            <?php
                                
                                $sql = "SELECT * From users WHERE id = ".$_SESSION['id'];
                                $stmt = $conn->prepare($sql); 
                                if($stmt->execute())
                                {
                                $result = $stmt->get_result();
                                 
                                while($user = mysqli_fetch_array($result))
                                {

                                    echo '<img src="data:image/jpg;base64,'.base64_encode($user['profile_pic']), 
                                    '"alt="Profile" width="120px" height="120px" class="rounded-circle mt-n5">';
                                        
                                }
                                    
                                $stmt->close();
                                }
                                
        
                            ?>
                            <h5 class="card-title"></h5>
                            <a class="card-text text-center text-uppercase font-weight-bold mb-2" href="profile.php">
                            <?php 
                            $sql = "SELECT username FROM users WHERE id=".$_SESSION['id'];
                            $stmt = $conn->prepare($sql);
                            if($stmt->execute())
                            {

                                $result = $stmt->get_result();
                                
                                $user = $result->fetch_assoc();

                                if($user)
                                {
                                    echo $user['username'];
                                    $stmt->close();
                                }
                                
                            }
                            ?>
                            </a>
                            <p class="card-text text-center mb-2">
                            <?php 
                            $sql = "SELECT bio FROM users WHERE id=".$_SESSION['id'];
                            $stmt = $conn->prepare($sql);
                            if($stmt->execute())
                            {

                                $result = $stmt->get_result();
                                
                                $user = $result->fetch_assoc();

                                if($user)
                                {
                                    echo nl2br($user['bio']);
                                    $stmt->close();
                                }
                                
                            }
                            ?>



                            </p>
                            <ul class="list-unstyled nav justify-content-center">
                               <a href="#" class="mr-1 text-dark text-decoration-none"> <li class="nav-item">Followers<br>
                                <strong>
                                    
                                <?php 
                                $sql = "SELECT * FROM users WHERE username=?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param('s', $_SESSION['username']);
                                if($stmt->execute())
                                {
                                $result = $stmt->get_result();
                                
                                $user = $result->fetch_assoc();
                                echo $user['user_followers'];
                                $stmt->close();
                                }
                                ?>
                            
                                </strong></li></a>

                              
                              <a href="#" class="ml-1 text-dark text-decoration-none"> <li class="nav-item"> Following <br> 
                              <strong>
                                
                              <?php 
                                $sql = "SELECT user_following FROM users WHERE username=?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param('s', $_SESSION['username']);
                                if($stmt->execute())
                                {
                                $result = $stmt->get_result();
                                
                                $user = $result->fetch_assoc();
                                echo $user['user_following'];
                                $stmt->close();
                                }
                              ?>

                              </strong></li></a> 
                            </ul>
                        </div>
                    </div>

                    <div class="card shadow-sm card-left2 mb-4">
                        <div class="card-body">
                                <h5 class="mb-3 card-title">About <small><a href="editprofile.php" class="ml-1">Edit</a></small></h5>

                                <p class="card-text"> <i class="fas fa-calendar-week mr-2"></i> Went to <a href="#" class="text-decoration-none">
                                
                                <?php 
                                $sql = "SELECT education_place FROM users WHERE username=?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param('s', $_SESSION['username']);
                                if($stmt->execute())
                                {
                                $result = $stmt->get_result();
                                
                                $user = $result->fetch_assoc();
                                echo $user['education_place'];
                                $stmt->close();
                                }
                                ?>  
                            
                                </a></p>
                                <p class="card-text"> <i class="far fa-building mr-2"></i> Work at <a href="#" class="text-decoration-none">
                                    
                                <?php 
                                $sql = "SELECT work_place FROM users WHERE username=?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param('s', $_SESSION['username']);
                                if($stmt->execute())
                                {
                                $result = $stmt->get_result();
                                
                                $user = $result->fetch_assoc();
                                echo $user['work_place'];
                                $stmt->close();
                                }
                                ?>  
                                
                                </a></p>
                                <p class="card-text"> <i class="fas fa-map-marker mr-2"></i> From <a href="#" class="text-decoration-none">

                                <?php 
                                $sql = "SELECT city_location FROM users WHERE username=?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param('s', $_SESSION['username']);
                                if($stmt->execute())
                                {
                                $result = $stmt->get_result();
                                
                                $user = $result->fetch_assoc();
                                echo $user['city_location'];
                                $stmt->close();
                                }
                                ?>  
                                </a></p>
                        </div>
                        
                    </div>

                    <div class="card shadow-sm card-left3 mb-4">

                        <div class="card-body">
                            <h5 class="card-title">Photos<small class="ml-2"><a href="#">.Edit </a></small></h5>

                            <div class="row">
                                <div class="col-6 p-1">
                                    <a href="img/left1.jpg" data-lightbox="id" ><img src="img/left1.jpg" alt="img" class="img-fluid my-2"></a>  
                                    <a href="img/left2.jpg"data-lightbox="id"><img src="img/left2.jpg" alt="img" class="img-fluid my-2"></a>
                                    <a href="img/left3.jpg"data-lightbox="id"><img src="img/left3.jpg" alt="img" class="img-fluid my-2"></a>

                                </div>

                                <div class="col-6 p-1">
                                        <a href="img/left4.jpg"data-lightbox="id"><img src="img/left4.jpg" alt="img" class="img-fluid my-2"></a>
                                        <a href="img/left5.jpg"data-lightbox="id"><img src="img/left5.jpg" alt="img" class="img-fluid my-2"></a>
                                        <a href="img/left6.jpg"data-lightbox="id"><img src="img/left6.jpg" alt="img" class="img-fluid my-2"></a>
    
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
 <!--------------------------Ends Left columns-->

  <!---------------------------------------Middle columns  start---------------->
  <div class="col-12 col-lg-6" >
                <div class="middle-column">
                    <div class="card" >
                        <div class="card-header bg-transparent">
                            <form class="form-inline">
                                <div class="input-group w-100">
                                    <!-- Button trigger modal -->
                                    <!-- Button trigger modal -->
                                    <div class="button_post">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Post something
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Post</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="upload.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <textarea id="center_textarea" name="text" cols="80" rows="3"></textarea><br /> 
                                            </div>
                                            <div class="form-group">
                                                <input type="file" id="avatar" name="image" accept="image/png, image/jpeg">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="postSubmit" class="btn btn-primary">Post</button>
                                            </div>
                                        </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                           
                        <?php
                            $username = $_SESSION['username'];
                            $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 10";
                            $res = mysqli_query($conn, $sql);
                            if ($res && mysqli_num_rows($res) > 0)   {
                                while ($row = mysqli_fetch_assoc($res))  {
                                    ?>
                                        <div class="card-body">
                                            <div class="media">
                                                <img src="img/avatar-dhg.png" alt="img" width="55px" height="55px" class="rounded-circle mr-3">
                                                <div class="media-body">
                                                    <h5><?php echo $username; ?></h5>
                                                    <p class="card-text text-justify"><?php echo $row['post_summary']; ?></p>
                                                    <div class="row no-gutters mb-3">
                                                        <div class="col-6 p-1 text-center">
                                                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['picture']); ?>" alt="" class="img-fluid mb-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                    <div class="post">
                                        <h1>No posts found.</h1>
                                        <p>Sorry, no posts were found. Please try again later.</p>
                                    </div>
                                <?php
                            }
                        ?>


                    </div>
                </div>
            </div>

            <br> <br> <br><br> <br> <br>

            <br> <br> <br><br> <br> <br>
<!------------------------Middle column Ends---------------->
<!---------------------------Starts Right Columns----------------->
            <div class="col-12 col-lg-3">
                <div class="right-column">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h6 class="card-title ">Likes <a href="#modalviewall" data-toggle="modal" class="ml-1"><small>View All</small> </a> </h6>
                                <div class="row no-gutters d-none d-lg-flex" id="avail-users-limited">
                                    
                                <?php
                                
                                    $sql = "SELECT * From users WHERE id !=? ";   
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
                                    
                                </div>
                                    <div class="modal fade" id="modalviewall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Friends you may know</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" id="avail-users">
                                            
                                            <?php
                                
                                                $sql = "SELECT * From users WHERE id != ?";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param("s", $_SESSION['id']);
                                                if($stmt->execute())
                                                {
                                                $result = $stmt->get_result();
                                                $followers = json_decode($_SESSION['user_followers_names']);
                                                while($user = mysqli_fetch_array($result))
                                                {

                                                    if(in_array($user['username'], $followers))
                                                    {   
                                                      

                                                    }
                                                    else
                                                    {
                                                        echo '<div class="col-sm-6"><div class="card"><div class="card-body">',
                                                        '<img src="data:image/jpg;base64,'.base64_encode($user['profile_pic']), 
                                                        '" alt="img/PICDefault.png" width="80px" height="80px" class="rounded-circle mb-4" style="float:left"/>',
                                                        '<h6>', $user['username'], '</h6>',
                                                        '<button class="btn btn-outline-info" id="', $user['username'],'-button" name="', $user['username'],'" btn-sm mb-3"><i class="fas fa-user-friends"></i>Follow</button>', '</div></div></div>';

                                                    }
                                                   
                                                 
                                                }
                                                    
                                                $stmt->close();
                                                }
                                                
                        
                                            ?>
                                         
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>   
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <script>
            
            $(document).ready(function(){
            $("#avail-users :button, #avail-users-limited :button").click(function(event){  
                var btnname = event.target.name;

                $("#avail-users").load("updatefollowdb.php", {  
                    user: btnname
                });
                $("#avail-users").load("updatefollowbox.php", {
                });
                $("#avail-users-limited").load("updatefollow.php", {
                    
                });
                location.reload();
            
                
            });
            });
            
    
            

        </script>
      

        <script>




        </script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
        
    </body>
</html>