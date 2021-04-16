<?php
/**
 * Login page
 */
session_start();
require_once './vendor/autoload.php';
require_once './config.php';

?>
<form method="post" action="">
    <p>username: <input type="text" name="username" /></p>
    <p>password: <input type="password" name="password" /></p>
    <input type="submit" name="login" value="Log In" />
</form>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = md5($password);

    $blog = new SuperBlog\SuperBlog();
    $user = $blog->get_user($username, $password);
    //echo "<pre>"; print_r($user); echo "</pre>"; die();
    if(hash_equals($hash, $user['password'])) {
        $_SESSION['loggedin'] = true;
        header("Location: admin/");
    }
    else {
        echo "Password incorrect";
    }
    
}