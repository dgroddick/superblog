<?php
/**
 * Login page
 */
session_start();
require_once './vendor/autoload.php';
require_once './config.php';

if (isset($_SESSION['loggedin'])) {
    header("Location: admin/");
}
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

    $blog = new SuperBlog\User();
    $user = $blog->get_user_by_username($username);
    //echo "<pre>"; print_r($user); echo "</pre>"; die();

    if(hash_equals($hash, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: admin/");
    }
    else {
        echo "Password incorrect";
    }
    
}