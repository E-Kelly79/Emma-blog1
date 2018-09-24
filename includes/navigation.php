<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
    <a href="index.php"><img src="./images/logo_new.png" alt=""></a>
</div>
<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
    <div class="navigation">
        <div id="navigation">
            <ul>
                <li class="active"><a href="index.php" title="Home">Home</a></li>
                <li><a href="#" title="About me">About me</a> </li>
                <li><a href="contact-us.html" title="Contact Us">Contact Us</a></li>
                <li class="has-sub"><a href="" title="Categories">Categories</a>
                    <ul>
                       <?php
                            $query = "SELECT * FROM catergory";
                            $getCategories = $connection->query($query);
                            while($row = $getCategories->fetch()){
                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];
                        ?>
                        <li><a href="category.php?category=<?php echo $cat_id;?>" title=""><?php echo $cat_title;?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="https://www.facebook.com/Emmascottagekitchen/" target="_blank"><span><i class="fa fa-facebook-square"></i></span></a></li>
                <li><a href="https://www.instagram.com/emmascottagekitchen/" target="_blank"><span><i class="fa fa-instagram"></i></span></a></li>
                <li><a href="#" target="_blank"><span class="active"><i class="fa fa-twitter-square"></i></span></a></li>
                <li><a href="#" target="_blank"><span><i class=" fa fa-pinterest-square"></i> </span></a></li>
                <li><a href="#" target="_blank"><span><i class="fa fa-linkedin-square"></i></span></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-2 hidden-md hidden-sm hidden-xs">
    <div class="header-btn"><a href="#" class="btn btn-default" data-toggle="modal" data-target="#loginModal">Login</a></div>
</div>
