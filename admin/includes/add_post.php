<?php
   if(isset($_POST['create_post'])) {
            $post_title = $_POST['title'];
            $post_user = $_POST['post_author'];
            $post_category_id = $_POST['post_category'];
            $post_status = $_POST['post_status'];
            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];
            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date('d-m-y');
        move_uploaded_file($post_image_temp, "../images/$post_image" );
        $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags) ";
        $query .= "VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertPost = $connection->prepare($query);
        $insertPost->execute(array($post_category_id, $post_title, $post_user, $post_date, $post_image, $post_content, $post_tags));
       if($insertPost){
           echo "<div class='alert alert-success'>Post Created Successfuly.</div>";
       }else{
            echo "<div class='alert alert-danger'>Post Not Created.</div>";
       }
   }
?>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" class="form-control" name="title">
      </div>
        <div class="form-group">
            <label for="category">Category</label>
        <select name="post_category" id="">
            <?php
                $query = "SELECT * FROM catergory";
                $select_categories = $connection->query($query);
                while($row = $select_categories->fetch()) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            ?>
        </select>
      </div>
<!--
       <div class="form-group">
            <label for="users">Users</label>
            <select name="post_user" id="">
                <?php
                    $users_query = "SELECT * FROM users";
                    $select_users = $connection->query($users_query);
                    while($row = $select_users->fetch()) {
                        $user_id = $row['user_id'];
                        $username = $row['user_username'];
                        echo "<option value='{$username}'>{$username}</option>";
                    }
                ?>
       </select>
      </div>
-->
       <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="post_author">
      </div>
       <div class="form-group">
         <select name="post_status" id="">
             <option value="draft">Post Status</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>
    <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>
      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
      </div>
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="" cols="30" rows="10">
         </textarea>
      </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>
</form>
