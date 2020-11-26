<?php include"header_v.php" ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="100%" height="570" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: First slide"><title>Placeholder</title><rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#555" dy=".3em">First slide</text></svg>
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
            </div>
            <div class="carousel-item">
            <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="100%" height="570" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Second slide"><title>Placeholder</title><rect width="100%" height="100%" fill="#666" /><text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text></svg>
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            </div>
            <div class="carousel-item">
            <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="100%" height="570" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Third slide"><title>Placeholder</title><rect width="100%" height="100%" fill="#555" /><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text></svg>
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section>
        <div class="container">
                <h2> Login </h2>
                        <?php if(!empty($session)) { 
                            ?>
                            <div class="alert alert-<?php echo $session['status'] ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                                <?php echo $session['message']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                        <?php 
                        } 
                        
                        if (!empty($isLogin)) 
                        {
                        ?> 

                            <a href="<?php echo site_url('Beranda/logout')?>" class="btn btn-danger"> Logout </a>
                        <?php 
                        
                        }

                        else{

                        ?>

                    <form method="POST" action="<?php echo site_url('Beranda/login') ?>">
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Username </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary"> Login </button>
                    </form>

                    <?php } ?>
        </div>
    </section>

<?php include"footer_v.php" ?>

