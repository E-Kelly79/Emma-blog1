<?php
   if(isset($_POST['create_user'])) {
       $user_firstname = $_POST['user_firstname'];
       $user_lastname =$_POST['user_lastname'];
       $user_role =$_POST['user_role'];
       $username = $_POST['username'];
       $user_email = $_POST['user_email'];
       $user_password = $_POST['user_password'];
       $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
       $query = "INSERT INTO users(user_first_name, user_last_name, user_role, user_username, user_email, user_password) ";
       $query .= "VALUES(?,?,?,?,?,?)";
       $create_user_query = $connection->prepare($query);
       $create_user_query->execute(array($user_firstname, $user_lastname, $user_role, $username, $user_email, $user_password));
       if($create_user_query){
           echo "<div class='alert alert-success'> User Created: " . " " . "<a href='users.php'>View Users</a></div> ";
       }else{
           echo "<div class='alert alert-danger'> User was not created peales try again </div>";
       }
   }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <select name="user_role" id="">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    <!--
      <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>
-->
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>
