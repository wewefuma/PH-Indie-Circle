<?php include 'controllers/authController.php' ?>

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
        <title>Application</title>
        </head>
<body>
    <!-------------------------------NAvigation Starts------------------>
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#3097D1">
            <a href="index.php" class="navbar-brand"><img src="img/PIClogo.png" alt="logo" class="img-fluid" width="40px" height="40px"></a>
    
            <button class="navbar-toggler" data-toggle="collapse" data-target="#responsive"><span class="navbar-toggler-icon"></span></button>
    
    
            <div class="collapse navbar-collapse" id="responsive">
                <ul class="navbar-nav mr-auto text-capitalize">
                    <li class="nav-item"><a href="index.php" class="nav-link active">home</a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link">profile</a></li>
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
    
                
                <p>&ensp;</p>
                <a href="logout.php" style="color: white">Logout</a>
    
    
    
    
    
            </div>
    
    
    
    
        </nav>
    

        <!---------------------------------------------Ends navigation------------------------------>







         <!---------------------------MOdal Section  satrts------------------->

    <div class="modal fade" id="modalview" >
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
    



















        <!-----------------------------------Banner/img Starts-------------------->


        <div class="banner">
            <div class="banner-title d-flex flex-column justify-content-center align-items-center">
                                <?php
                                
                                $sql = "SELECT * From users WHERE id = ".$_SESSION['id'];
                                $stmt = $conn->prepare($sql); 
                                if($stmt->execute())
                                {
                                 $result = $stmt->get_result();
                                          
                                 while($user = mysqli_fetch_array($result))
                                 {

                                 echo '<img src="data:image/jpg;base64,'.base64_encode($user['profile_pic']), 
                                 '"alt="Profile" width="80px" height="80px" class="rounded-circle center mr-1 ml-1">';
                                                  
                                 }
                                          
                                  $stmt->close();
                                }
                                          
                  
                                ?>
                           <h3 class="text-light text-center"><?php 
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
                            ?></h3>
                           <p class="text-light text-center"><?php 
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



                            </p></p>

            </div>


    


            

        </div>

        <!--------------------Image Portfolio----------------->


        <div class="grid-template container my-4">
            

            <div class="item-1">
                   
                
           
           <a href="portfolio/img1.jpg" data-lightbox="id"><img src="portfolio/img1.jpg" alt="" class="img-fluid" style="width:455px; height: 255px;"></a>     
          


            </div>

            <div class="item-2 ">
                <a href="portfolio/img2.jpg"data-lightbox="id"> <img src="portfolio/img2.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a>   

                </div>
                <div class="item-3">
                        <a href="portfolio/img3.jpg"data-lightbox="id"> <img src="portfolio/img3.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a> 
                    </div>
                    <div class="item-4">
                            <a href="portfolio/img4.jpg"data-lightbox="id"> <img src="portfolio/img4.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a> 
                    


                        </div>


                        <div class="item-5">

                                <a href="portfolio/img5.jpg"data-lightbox="id"><img src="portfolio/img5.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a> 
          


                        </div>
            
                        <div class="item-6">
                                <a href="portfolio/img6.jpg"data-lightbox="id">   <img src="portfolio/img6.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a> 
                            
            
                            </div>
                            <div class="item-7">
                                    <a href="portfolio/img7.jpg"data-lightbox="id"> <img src="portfolio/img7.jpg" alt="" class="img-fluid" style="width:455px; height: 255px;"></a> 
                              
                                </div>
                                <div class="item-8">
                                
                                        <a href="portfolio/img8.jpg"data-lightbox="id">  <img src="portfolio/img8.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a> 
            
                                    </div>

                                    <div class="item-9">
                                            <a href="portfolio/img9.jpg"data-lightbox="id"><img src="portfolio/img9.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a> 
          


                                    </div>
                        
                                    <div class="item-10">
                                            <a href="portfolio/img10.jpg"data-lightbox="id">    <img src="portfolio/img10.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a> 
                                        
                        
                                        </div>
                                        <div class="item-11">
                                                <a href="portfolio/img11.jpg"data-lightbox="id">   <img src="portfolio/img11.jpg" alt="" class="img-fluid" style="width:455px; height: 255px;"></a> 
                                          
                                            </div>
                                            <div class="item-12">
                                                    <a href="portfolio/img12.jpg"data-lightbox="id">   <img src="portfolio/img12.jpg" alt="" class="img-fluid" style="width:217px; height: 255px;"></a> 
                                            
                        
                        
                                                </div>

                        
                                
                                
            
        
    




        </div>















 










































































































































































<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>