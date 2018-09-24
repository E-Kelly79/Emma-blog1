<?php
    if(isset($_GET['p_id'])){
        $the_post_id =  $_GET['p_id'];
    }
    $query = "SELECT * FROM posts WHERE post_id = ?";
    $select_posts_by_id = $connection->prepare($query);
    $select_posts_by_id->execute(array($the_post_id));
    while($row = $select_posts_by_id->fetch()) {
        $post_id            = $row['post_id'];
        $post_user          = $row['post_author'];
        $post_title         = $row['post_title'];
        $post_category_id   = $row['post_category_id'];
        $post_status        = $row['post_status'];
        $post_image         = $row['post_image'];
        $post_content       = $row['post_content'];
        $post_tags          = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date          = $row['post_date'];
    }
    if(isset($_POST['update_post'])) {
        $post_user           =  escape($_POST['post_author']);
        $post_title          =  escape($_POST['post_title']);
        $post_category_id    =  escape($_POST['post_category']);
        $post_status         =  escape($_POST['post_status']);
        $post_image          =  escape($_FILES['image']['name']);
        $post_image_temp     =  escape($_FILES['image']['tmp_name']);
        $post_content        =  escape($_POST['post_content']);
        $post_tags           =  escape($_POST['post_tags']);
        move_uploaded_file($post_image_temp, "../images/$post_image");
        if(empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = ?";
            $select_image = $connection->prepare($query);
            $select_image->execute(array($the_post_id));
            while($row = $select_image->fetch()) {
                $post_image = $row['post_image'];
            }
        }
        $query = "UPDATE posts SET ";
        $query .="post_title  = ?, ";
        $query .="post_category_id = ?, ";
        $query .="post_date   =  ?, ";
        $query .="post_user = ?, ";
        $query .="post_status = ?, ";
        $query .="post_tags   =?, ";
        $query .="post_content= ?, ";
        $query .="post_image  = ? ";
        $query .= "WHERE post_id = ?";
        $update_post = $connection->prepare($query);
        $update_post->execute(array($post_title, $post_category_id, now(), $post_user, $post_status, $post_tags, $post_content, $post_image, $the_post_id));
        echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="categories">Categories</label>
        <select name="post_category" id="" class="form-control">
            <?php
                $query = "SELECT * FROM catergory ";
                $select_categories = $connection->query($query);
                while($row = $select_categories->fetch()) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    if($cat_id == $post_category_id) {
                        echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                    } else {
                        echo "<option value='{$cat_id}'>{$cat_title}</option>";
                    }
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="users">Users</label>
        <select name="post_user" id="" class="form-control">
            <?php
                echo "<option value='{$post_user}'>{$post_user}</option>";
                $users_query = "SELECT * FROM users";
                $select_users = $connection->query($users_query);
                while($row = $select_users->fetch()) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    echo "<option value='{$username}'>{$username}</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $post_user; ?>" type="text" class="form-control" name="post_user">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
         </textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>
