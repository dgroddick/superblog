<?php
/**
 * Set up new blog installation
 */
exit();
require_once './vendor/autoload.php';
require_once './config.php';

$blog = new SuperBlog\SuperBlog();

if (isset($_GET['reset'])) {
    $blog->db_reset();
    echo "resetting";
}

//$blog->create_user_table();
//$password = md5($_POST['password']);
$password = md5('password1234');

$args = array(
    'username' => 'admin',
    'email' => 'dgroddick@gmail.com',
    'password' => $password
);
//$blog->create_user($args);



$blog->create_post_table();
$args = array(
    'user_id' => 1,
    'post_title' => 'This is a first fancy post',
    'post_content' => 'A bigger and better blog post'
);
$blog->create_post($args);
