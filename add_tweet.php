<?php
    function addTweet() {
        echo 
        '<div class="card-body">
            <div class="media">
                    <div class="media-body">
                        <h5>'.$_SESSION['user'].'</h5>
                        <p class="card-text text-justify">Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <div class="row no-gutters mb-3">
                            <div class="col-6 p-1 text-center">
                                <img src="img/adventure-alps-clouds-2259810.jpg" alt="" class="img-fluid mb-2">
                                <img src="img/aerial-view-architectural-design-buildings-2228123.jpg" alt="" class="img-fluid">
                            </div>

                            <div class="col-6 p-1 text-center">
                                    <img src="img/celebration-colored-smoke-dark-2297472.jpg" alt="" class="img-fluid mb-2">
                                    <img src="img/bodybuilding-exercise-fitness-2294361.jpg" alt=""class="img-fluid">
                            </div>
                        </div>

                        <div class="media mb-3">
                                <img src="img/avatar-dhg.png" alt="img" width="45px" height="45px" class="rounded-circle mr-2">
                                <div class="media-body">
                                        <p class="card-text text-justify">Jacon Thornton: Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.</p>
                                </div>
                        </div>

                        
                        <div class="media">
                                <img src="img/avatar-mdo.png" alt="img" width="45px" height="45px" class="rounded-circle mr-2">
                                <div class="media-body">
                                        <p class="card-text text-justify">Mark Otto: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                                </div>
                        </div>
                    </div>

                    <small>5min</small>
            </div>
        </div>';
    }
?>