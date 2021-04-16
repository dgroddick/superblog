<?php
/**
 * Admin edit post
 *
 */
include dirname(__FILE__) . '/header.php';

$blog = new SuperBlog\SuperBlog();

$user_id = $_GET['user_id'];
$user = $blog->get_user_by_id($user_id);
//echo "<pre>"; print_r($post); echo "</pre>";
?>
<h3>Edit User</h3>
<?php
if ($user): ?>
    <form>
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>"></br>
        Username: <input type="text" name="username" value="<?php echo $user['username']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>
        Password: <input type="password" name="password" value="<?php echo $user['password']; ?>"><br>

        <input type="submit" name="save" value="Save">
    </form>
<?php endif; ?>