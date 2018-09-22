<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
            <?php
                if(isset($_GET['edit'])){
                    $cat_id =$_GET['edit'];
                        $query = "SELECT * FROM catergory  WHERE cat_id = ? ";
                        $select_categories_id = $connection->prepare($query);
                        $select_categories_id->execute(array($cat_id));
                        while($row = $select_categories_id->fetch()){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
            ?>
            <input value="<?php echo $cat_title; ?>" type="text" class="form-control" name="cat_title">
            <?php }} ?>
            <?php
                /////////// UPDATE QUERY
                if(isset($_POST['update_category'])) {
                    $updateCatergory = $connection->prepare("UPDATE catergory SET cat_title = ? WHERE cat_id = ? ");
                    $updateCatergory->execute(array($cat_title, $cat_id));
                    var_dump($updateCatergory);
                             if(!$updateCatergory){
                              die("QUERY FAILED");
                          }
                         redirect("categories.php");
                }
            ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>
