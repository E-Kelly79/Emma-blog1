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
<!-- slider-start -->
<!--
<div class="slider">
    <div class="owl-carousel slider">
        <div class="item">
            <div class="slider-img"> <img src="./images/brunch.jpg" width="1900px" height="700px" class="img-responsive" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12  col-xs-12">
                        <div class="slider-profile">
                            <div class="back-pic"></div>
                            <div class="profile"><img src="./images/profile.jpg"  alt="" class="img-responsive"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="slider-captions">
                            <h1 class="slider-title">Hi, I Am A Food Blogger </h1>
                            <p class="slider-text hidden-xs">Recpies | Grow Your Own | Upcycling </p>
                            <a href="#" class="btn btn-default btn-lg hidden-sm hidden-xs">My Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="slider-img"><img src="./images/slider-2.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12  col-xs-12"></div>
                    <div class="col-lg-5 col-md-5 col-sm-12  col-xs-12">
                        <div class="slider-captions">
                            <h1 class="slider-title">Lorem ipsum</h1>
                            <p class="slider-text hidden-xs">Dolor Sit Amet| Consectetur Adipisicing  | Explicabo Inventore </p>
                            <a href="#" class="btn btn-default btn-lg hidden-sm hidden-xs">Impedit Enim Ipsam</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="slider-img"><img src="./images/slider-3.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12  col-xs-12"></div>
                    <div class="col-lg-5 col-md-5 col-sm-12  col-xs-12">
                        <div class="slider-captions">
                            <h1 class="slider-title">Saepe Ipsum Animi Optio  </h1>
                            <p class="slider-text hidden-xs">Nesciunt Iusto | Blanditiis Facilis | Odio Facere Dolores</p>
                            <a href="#" class="btn btn-default btn-lg  hidden-sm hidden-xs">Assumenda Natus Architecto.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!-- slider-close -->
<!-- Recent Blog Post -->
<div class="space-medium bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12">
                <div class="about-section">
                    <h1>Recent Blog Post</h1>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt20">
                            <h3>Lorem Ipsum</h3>
                            <p>
                                Sed accumsan libero quis lectus tempusmus liberoesw phare enimroin elementum.
                                Sed accumsan libero quis lectus tempusmus liberoesw phare enimroin elementum.
                                Sed accumsan libero quis lectus tempusmus liberoesw phare enimroin elementum.
                            </p>
                            <a href="#" class="btn btn-default">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-offset-1 col-lg-5 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="">
                    <img src="./images/" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-start -->
<div class="space-medium bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <!-- section title start-->
                    <h1>Specialize in baking and cooking </h1>
                    <p>Great advice to assist you in reaching your baking and cooking goals.</p>
                </div>
                <!-- /.section title start-->
            </div>
        </div>
        <div class="row">
            <?php
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = "";
                }

            if($page == "" || $page == 1){
                $page_1 = 0;
            }else{
                $page_1 = ($page * 5)- 5;
            }
                $select_posts_count = "SELECT * FROM posts ";
                $find_count = $connection->query($select_posts_count);
                $count = $find_count->rowCount();
            $count = ceil($count / 4);
                $query = $connection->query("SELECT * FROM posts LIMIT $page_1, 6");
                while($row = $query->fetch(PDO::FETCH_OBJ)) :
                    $post_id = $row->post_id;
                    $post_title = $row->post_title;
                    $post_author = $row->post_author;
                    $post_date = $row->post_date;
                    $post_image = $row->post_image;
                    $post_content = substr($row->post_content,0,153);
                    $post_status = $row->post_status;
            ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="service-block ">
                    <div class="service-img">
                        <a href="post.php?p_id=<?php echo $post_id;?>">
                            <img src="./images/<?php echo $post_image; ?>">
                        </a>
                    </div>
                    <div class="service-content">
                        <h3><?php echo $post_title; ?></h3>
                        <p><?php echo $post_content; ?></p>
                        <p><?php echo $post_date; ?></p>
                        <div class="header-btn">
                            <a href="post.php?p_id=<?php echo $post_id;?>" class="btn btn-default">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endWhile ?>
        </div>
        <ul class="pager">
            <?php
                for($i = 1; $i <= $count; $i++){
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }
            ?>
        </ul>
    </div>
</div>
<!-- blog-close -->
<!-- diet-plan-close -->

<!-- about-close -->
<!-- news-start -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <!-- section title start-->
                    <h1>Tempus quam pellentesque nec nam</h1>
                </div>
                <!-- /.section title start-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="post-block">
                    <div class="post-img">
                        <a href="#" class="imghover">
                            <img src="./images/post-img-small-1.jpg" alt="" class="img-responsive"></a>
                    </div>
                    <!-- post block -->
                    <div class="post-content">
                        <div class="meta">
                            <span class="meta-categories"><a href="#">Odio ut </a></span>
                            <span class="meta-date">30 July, 2020</span>
                        </div>
                        <h4><a href="#" class="title">Pharetra diam sit amet </a></h4>
                        <p>Nam vitae aliquet metus semper vehicula juonecin dolor....</p>
                        <a href="#" class="btn-link">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="post-block">
                    <div class="post-img">
                        <a href="#" class="imghover">
                            <img src="./images/post-img-small-2.jpg" alt="" class="img-responsive">
                        </a>
                    </div>
                    <!-- post block -->
                    <div class="post-content">
                        <div class="meta">
                            <span class="meta-categories"><a href="#">Velit Velit</a></span>
                            <span class="meta-date">29 July, 2020</span>
                        </div>
                        <h4><a href="#" class="title">Sed risus pretium</a></h4>
                        <p>Vitae aliquet metus semperveicula juonecin doloreer ornare....</p>
                        <a href="#" class="btn-link">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="post-block">
                    <div class="post-img">
                        <a href="#" class="imghover">
                            <img src="./images/post-img-small-3.jpg" alt="" class="img-responsive"></a>
                    </div>
                    <!-- post block -->
                    <div class="post-content">
                        <div class="meta">
                            <span class="meta-categories"><a href="#">Non Enim</a></span>
                            <span class="meta-date">28 July, 2020</span>
                        </div>
                        <h4><a href="#" class="title">Est velit egestas dui id</a></h4>
                        <p>Aliquet metus semper vehiculase juonecin dolor sederate....</p>
                        <a href="#" class="btn-link">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- news-close -->
<!-- testimonials-start -->
<div class="space-medium bg-light">
    <div class="container">
        <div class="testimonial-carousel">
            <div class="owl-carousel slider">
                <div class="item">
                    <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <img src="./images/quote.png" alt="">
                                </div>
                                <div class="">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-empty"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                                <h2>Lorem ipsum dolor sit amet</h2>
                                <p class="testimonial-text">
                                    "Ut enim ad minim veniam, quis nostrud exercitation
                                     ullamco laboris nisi ut aliquip ex ea commodo consequat."
                                 </p>
                                <div class="testimonial-meta">
                                    <span>- CICERO</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <img src="./images/quote.png" alt="">
                                </div>
                                <div class="">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-empty"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                                <h2>Lorem ipsum dolor sit amet</h2>
                                <p class="testimonial-text">
                                    “Ut enim ad minim veniam, quis nostrud exercitation
                                     ullamco laboris nisi ut aliquip ex ea commodo consequat.”
                                </p>
                                <div class="testimonial-meta">
                                    <span>- CICERO</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <img src="./images/quote.png" alt="">
                                </div>
                                <div class="">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-empty"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                                <h2>Lorem ipsum dolor sit amet</h2>
                                <p class="testimonial-text">
                                    “Ut enim ad minim veniam, quis nostrud exercitation
                                     ullamco laboris nisi ut aliquip ex ea commodo consequat.”
                                </p>
                                <div class="testimonial-meta">
                                    <span>- CICERO</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">LOGIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="img-responsive" style="margin: 0 auto;" src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <form class="form" action="includes/login.php" method="post">
                                <div class="form-group">
                                    <label for="username">USERNAME</label>
                                    <input type="text" id="username" class="form-control" style="text-transform:none;" name="username" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">PASSWORD</label>
                                    <input type="text" id="password" class="form-control" style="text-transform:none;" name="password" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" id="login" class="btn btn-success btn-block" value="Log In">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonials-close  -->
<?php include "./includes/footer.php"; ?>
