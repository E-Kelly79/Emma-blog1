<?php
    include "./includes/db.php";
    include "./includes/header.php";
?>
    <div class="header-wrapper">
    <div class="container">
        <div class="row">
            <?php include "./includes/navigation.php"; ?>
        </div>
    </div>
</div>
    <!-- header-section close -->
<!--
     page-header-start
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="page-section">
                        <h1 class="page-title ">blog single</h1>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li>blog single</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs">
                    <div class="page-section">
                        <p>“Please Enjoy!! Healthy Eating and Dietitian blogs. Get nutrition advice, tips and facts from Jessica”</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <!-- page-header-close -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="post-block">
                               <?php
                                if(isset($_GET['p_id'])){
                                    $post_id = $_GET['p_id'];
                                }
                                    $query = "SELECT * FROM posts WHERE post_id = ?";
                                    $allPosts = $connection->prepare($query);
                                    $allPosts->execute(array($post_id));
                                    while($row = $allPosts->fetch()){
                                        $title = $row["post_title"];
                                        $author = $row["post_author"];
                                        $date = $row["post_date"];
                                        $image = $row["post_image"];
                                        $content = $row["post_content"];

                                ?>
                                <!-- post holder -->
                                <div class="post-img">
                                    <!-- post img -->
                                    <img src="images/<?php echo $image;?>" alt="" class="img-responsive">
                                </div>
                                <!-- /.post img -->
                                <div class="post-content">
                                    <!-- post content -->
                                    <div class="post-header">
                                        <!-- post header -->
                                        <h2 class="post-title"><?php echo $title; ?></h2>
                                        <div class="meta">
                                            <span class="meta-categories"><?php echo $author;?></span>
                                            <span class="meta-date"><?php echo $date;?></span>
<!--                                            <span class="meta-comments">24 comments</span>-->
                                        </div>
                                    </div>
                                    <!-- /.post header -->
                                    <p><?php echo $content;?></p>

                                    <p>Nunc cursus leo risus non ac efficitur vel sed Mauris iaculis finibus ex et viverra. Aliquam blandit ornare justo, in sagittis sem ornare sit amet. Cras posuere vel ex at vulputate. Praesent volutpat consequat urt sagitton dimentum ditpat vivamus auctor magna eu vel</p>
                                    <img src="images/left-image.jpg" alt="" class="alignleft">
                                    <p class="mb60"> Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Aliquam idnisi consectetur auctor libero sagittis, tempor elituspendisse sit amet justo pulvinar eleifend nulla quislacinia eratn lacinia nisidapibus </p>
                                    <img src="images/right-image.jpg" alt="" class="alignright">
                                    <p> Aliquam idnisi consectetur auctor libero sagittis, tempor elituspendisse sit amet justo pulvinar eleifend nulla Praesent vel aliquet urnaauris molestie sollicitudin nisl non volutpatm mollis eros lacusac lorem tristique arcu facilisisquislacinia eratn lacinia nisidapibus justo viverrasit amet sodales risus lorem ipusm dfolor sit ulter lacina egeasrte noultriciesullam egestas egestaante non semper enimc facilisis auguenetus et malesuada lorem ipusm dolor sit famese gestas. </p>
                                    <p>Praesent vel aliquet urnaauris molestie sollicitudin nisl non volutpatm mollis eros lacusac lorem tristique arcu facilisis r elituspendisse sit amet justo pulvinar eleifend nulla quis semper enimc facilisis sedamus ullamcorper accumsan augue quis egestas.</p>
                                    <div class="related-post-block">
                                        <!-- related post block -->
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-sm-12">
                                                <h3 class="related-post-title">Recommended Posts</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="related-post">
                                                    <!-- related post -->
                                                    <div class="related-img">
                                                        <a href="#" class="imghover"><img src="images/related-post-2.jpg" alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="related-post-content">
                                                        <h4 class="related-title">
                                                            <a href="#" class="title">Nunc cursus leo risus non ac efficitur</a></h4>
                                                    </div>
                                                </div>
                                                <!-- /.related post -->
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="related-post">
                                                    <!-- related post -->
                                                    <div class="related-img">
                                                        <a href="#" class="imghover"><img src="images/related-post-1.jpg" alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="related-post-content">
                                                        <h4 class="related-title">
                                                        <a href="#" class="title">Nunc cursus leo risus non ac efficitur</a></h4>
                                                    </div>
                                                </div>
                                                <!-- /.related post -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.related post block -->
                                    <!--comments start-->
                                    <div class="comment-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="comment-title">
                                                    <h3>(4)Comments</h3>
                                                    <ul class="comment-list">
                                                        <li>
                                                            <div class="comment-author"> <img src="images/user-pic-1.jpg" alt="" class="img-circle"> </div>
                                                            <div class="comment-info">
                                                                <div class="comment-header">
                                                                    <h4>Emma Martin</h4>
                                                                    <span class="comment-meta-date">25 July, 2018</span>
                                                                </div>
                                                                <div class="comment-content">
                                                                    <p>Curabieet sitamet purus sed vestibulu ullam cursus, lacus eget pharetraium dui sed dius natoque penatibus et magnis dis parturiet the iaculis etiam.</p>
                                                                    <div><a href="#" class="btn-link">Reply</a></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul class="comment-list">
                                                        <li>
                                                            <div class="comment-author"><img src="images/user-pic-2.jpg" alt="" class="img-circle"></div>
                                                            <div class="comment-info">
                                                                <div class="comment-header">
                                                                    <h4>Ruby Simms</h4>
                                                                    <span class="comment-meta-date">25 July, 2018</span>
                                                                </div>
                                                                <div class="comment-content">
                                                                    <p>Proin purus diam, tristique quis pharetra et, pellentesque et jngilorem ipsum dolro sit amet psumellam hendrerit nibh eget sagittis hendrerit.</p>
                                                                    <div><a href="#" class="btn-link">Reply</a> </div>
                                                                </div>
                                                            </div>
                                                            <ul class="comment-list childern">
                                                                <li>
                                                                    <div class="comment-author"><img src="images/user-pic-3.jpg" alt="" class="img-circle"></div>
                                                                    <div class="comment-info">
                                                                        <div class="comment-header">
                                                                            <h4>Emma Martin</h4>
                                                                            <span class="comment-meta-date">25 July, 2020</span>
                                                                        </div>
                                                                        <div class="comment-content">
                                                                            <p>Suscipit metus quis pharetra etpeio nec nisl convallrerit nibh eget sagittis hendrerit.sum rateget the iaculis etiam.</p>
                                                                            <div><a href="#" class="btn-link">Reply</a></div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <ul class="comment-list">
                                                        <li>
                                                            <div class="comment-author"><img src="images/user-pic-4.jpg" alt="" class="img-circle"></div>
                                                            <div class="comment-info">
                                                                <div class="comment-header">
                                                                    <h4>Emma Martin</h4>
                                                                    <span class="comment-meta-date">25 July, 2018</span>
                                                                </div>
                                                                <div class="comment-content">
                                                                    <p>Curabieet sitamet purus sed vestibulu ullam cursus, lacus eget pharetraium dui sed dius natoque penatibus et magnis dis parturiet the iaculis etiam.</p>
                                                                    <div><a href="#" class="btn-link">Reply</a></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--comments close-->
                                    <div class="leave-comments">
                                        <h3 class="mb30">Leave A Reply</h3>
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label sr-only" for="textarea"></label>
                                                        <textarea class="form-control" id="textarea" name="textarea" rows="6" placeholder="Comments"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label sr-only required" for="name"></label>
                                                        <input id="name" name="name" type="text" class="form-control" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label sr-only required" for="email"></label>
                                                        <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label sr-only required" for="website"></label>
                                                        <input id="website" name="website" type="text" class="form-control" placeholder="Website">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary btn-sm">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.post content -->
                            </div>
                            <?php } ?>
                            <!-- /.post holder -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <!-- widget-search-start -->
                    <div class=" widget widget-search">
                        <form>
                            <div class="search-form">
                                <input type="text" class="form-control " placeholder="Search Here">
                                <button type="Submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- widget-search-close -->
                    <div class=" widget">
                                <!-- Post author -->
                                <h2 class="widget-title">About author</h2>
                                <div class=" author-block">
                                    <div class="author-img">
                                        <a href="#"><img src="images/author.jpg" class="img-circle" alt=""></a>
                                    </div>
                                    <div class="author-post-content ">
                                        <div class="author-header">
                                            <h3><a href="#" class="title">Emma Martin</a></h3></div>
                                        <div class="author-meta ">Food Blogger</div>
                                        <div class="author-content">
                                            <p>Aenean eu faucibus lectuenean is nec iaculis veliliam luctus enatises misit amet interdumdui.</p>
                                            <a href="#" class="btn btn-primary">View All Post</a> </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.post author -->

                    <!-- widget-categories-start -->
                    <div class=" widget widget-categories">
                        <h2 class="widget-title">Categories</h2>
                        <ul class="angle angle-right">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>
                    </div>
                    <!-- widget-categories-close -->
                    <!-- widget-recent-post-start -->
                    <div class=" widget widget-recent-post">
                        <h2 class="widget-title mb20">Recent Post</h2>
                        <ul>
                            <li>
                                <div class="recent-post">
                                    <div class="recent-pic">
                                        <a href="#" class="imghover"><img src="./images/recent-post-1.jpg" alt="" class="img-responsive"></a>
                                    </div>
                                    <div class="meta">
                                        <span class="meta-date"> 23 July, 2018</span></div>
                                    <h5 class="recent-title "><a href="#" class="title">Nunc cursus leo risus non ac efficitur</a></h5>
                                </div>
                            </li>
                            <li>
                                <div class="recent-post">
                                    <div class="recent-pic">
                                        <a href="#" class="imghover"> <img src="./images/recent-post-2.jpg" alt="" class="img-responsive"></a>
                                    </div>
                                    <div class="meta">
                                        <span class="meta-date"> 23 July, 2018</span> </div>
                                    <h5 class="recent-title"><a href="#" class="title">Nunc cursus leo risus non ac efficitur </a></h5>
                                </div>
                            </li>
                            <li>
                                <div class="recent-post">
                                    <div class="recent-pic">
                                        <a href="#" class="imghover"> <img src="./images/recent-post-3.jpg" alt="" class="img-responsive"></a></div>
                                    <div class="meta">
                                        <span class="meta-date">23 July, 2018</span>
                                    </div>
                                    <h5 class="recent-title"><a href="#" class="title">Nunc cursus leo risus non ac efficitur  </a></h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- widget-recent-post-close-->

                </div>
            </div>
        </div>
    </div>
    <!-- footer start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- footer-about-start -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <div class="footer-widget">
                        <h3 class="footer-title">Contact Infomation</h3>
                        <div class="">
                            <ul>
                                <li> <i class="icon-placeholder"></i>2177 Shearwood Forest , NH 03801</li>
                                <li><i class="icon-phone-call"></i>+180-123-4567</li>
                                <li><i class="icon-envelope"></i>info@emmascottagekitchen.com</li>
                            </ul>
                        </div>
                        <div class="footer-social">
                            <a href="#">
                                <span><i class="fa fa-facebook-square"></i></span>
                            </a> 
                            <a href="#">
                                <span><i class="fa fa-google-plus-square"></i></span> 
                            </a> 
                            <a href="#">
                                <span class="active"><i class="fa fa-twitter-square"></i> </span>
                            </a> 
                            <a href="#">
                            <span><i class=" fa fa-pinterest-square"></i> </span>
                            </a> 
                            <a href="#">
                            <span><i class="fa fa-linkedin-square"></i></span>
                            </a> 
                        </div>
                    </div>
                </div>
                <!-- footer-useful links-start -->
                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-widget">
                        <h3 class="footer-title">Quick Links</h3>
                        <ul class="angle angle-right">
                            <li><a href="#">Home </a></li>
                            <li><a href="#">About me</a></li>
                            <li> <a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <!-- footer-useful links-close -->
                <!-- footer-form-start -->
                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-widget">
                        <h3 class="footer-title">contact us</h3>
                        <form>
                            <div class="form-group">
                                <label class="control-label sr-only" for="name"></label>
                                <input id="name" type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="Email"></label>
                                <input id="email" type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="Phone"></label>
                                <input id="phone" type="text" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only" for="textarea"></label>
                                <textarea class="form-control" id="textarea" name="textarea" rows="3" placeholder="textarea"></textarea>
                            </div>
                            <button class="btn btn-primary btn-sm">submit</button>
                        </form>
                    </div>
                </div>
                <!-- footer-tiny-text-start -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="tiny-footer">
                        <p>2018 - Emma's Cottage Kitchen</p>
                    </div>
                </div>
                <!-- footer-tiny-text-start -->
                <!-- footer-form-close -->
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/navigation.js" type="text/javascript"></script>
    <script src="js/menumaker.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/sticky-header.js"></script>
</body>

</html>
