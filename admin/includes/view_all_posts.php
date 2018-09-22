<?php
include("delete_modal.php");
if(isset($_POST['checkBoxArray'])) {
    foreach($_POST['checkBoxArray'] as $postValueId ){
        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options) {
            case 'published':
                $query = $connection->prepare("UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = :post_id");
                $query->execute(array(
                    $postValueId
                ));
                break;

            case 'draft':
                $query = $connection->prepare("UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = :post_id");
                $query->execute(array(
                    $postValueId
                ));
                break;

            case 'delete':
                $query = $connection->prepare("DELETE FROM posts WHERE post_id = :post_id");
                $query->execute(array(
                    $postValueId
                ));
                break;

            case 'clone':
                $query = $connection->prepare("SELECT * FROM posts WHERE post_id = :post_id");
                 $result = $query->execute(array(
                    $postValueId
                ));
                while ($row = $result->fetchAssoc()) {
                    $post_title         = $row['post_title'];
                    $post_category_id   = $row['post_category_id'];
                    $post_date          = $row['post_date'];
                    $post_author        = $row['post_author'];
                    $post_status        = $row['post_status'];
                    $post_image         = $row['post_image'] ;
                    $post_tags          = $row['post_tags'];
                    $post_content       = $row['post_content'];
                }
      $query = $connection->prepare("INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags)");
      $query .= " VALUES(:post_cat_id, :post_title, :post_author, :post_date, :post_image, :post_content, :post_tags)";
      $query->execute(array(
        $post_category_id, $post_title, $post_author, now(), $post_image, $post_content, $post_tags
      ));
        if(!$query ) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        break;
    }
}
}

?>
<form action="" method='post'>
    <table class="table table-bordered table-hover">
        <div id="bulkOptionContainer" class="col-xs-4">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>
        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>Id</th>
                <th>Users</th>
                <th>Title</th>
                <!--<th>Category</th>-->
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Date</th>
                <th>View Post</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = $connection->query("SELECT * FROM posts");
                while($row = $query->fetch(PDO::FETCH_OBJ)) {
                    $post_id            = $row->post_id;
                    $post_author        = $row->post_author;
                    $post_title         = $row->post_title;
                    $post_category_id   = $row->post_category_id;
                    $post_status        = $row->post_status;
                    $post_image         = $row->post_image;
                    $post_tags          = $row->post_tags;
                    $post_comment_count = $row->post_comment_count;
                    $post_date          = $row->post_date;
                    //$post_views_count   = $row->post_views_count;
                    echo "<tr>";
            ?>
            <td>
                <input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'>
            </td>
            <?php
                echo "<td>$post_id </td>";
                if(!empty($post_author)) {
                    echo "<td>$post_author</td>";
                } elseif(!empty($post_user)) {
                    echo "<td>$post_user</td>";
                }
                echo "<td>$post_title</td>";
//        $query = $connection->prepare("SELECT * FROM catergory WHERE cat_id = :post_cat_id");
//        $result = $query->execute([':post_cat_id' => $post_category_id]);
//        $user = $result->fetch();

//        while($row = $result->fetch(PDO::FETCH_OBJ)) {
//        $cat_id = $row->cat_id;
//        $cat_title = $row->cat_title;
//        echo "<td>$cat_title</td>";
//        }
        echo "<td>$post_status</td>";
        echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
        echo "<td>$post_tags</td>";
        echo "<td>$post_date </td>";
        echo "<td><a class='btn btn-primary' href='../post.php?p_id={$post_id}'>View Post</a></td>";
        echo "<td><a class='btn btn-info' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        ?>
            <form method="post">
                <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                <?php
            echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>';
          ?>
            </form>
            <?php
         // echo "<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
        // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
      //  echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
        echo "</tr>";
    }
      ?>
        </tbody>
    </table>
</form>
<?php
 if(isset($_POST['delete'])){
     $the_post_id = $_POST['post_id'];
     $query = $connection->prepare("DELETE FROM posts WHERE post_id = :post_id");
     $query->execute([":post_id" => $the_post_id]);
     header("Location: /cms/admin/posts.php");
 }

 if(isset($_GET['reset'])){
     $the_post_id =$_GET['reset'];
     $query =$connection->prepare("UPDATE posts SET post_views_count = 0 WHERE post_id = :post_id");
     $query->execute([":post_id" => $the_post_id]);
     header("Location: posts.php");
 }
 ?>
<script>
    $(document).ready(function() {
        $(".delete_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "posts.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#myModal").modal('show');
        });
    });
    <?php if(isset($_SESSION['message'])){
          unset($_SESSION['message']);
      }
          ?>
</script>
