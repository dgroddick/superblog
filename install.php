<?php
/**
 * Set up new blog installation
 */
exit();
require_once './vendor/autoload.php';
require_once './config.php';

$blog = new SuperBlog();
$u = new SuperBlog\User();
$p = new SuperBlog\Post();

if (isset($_GET['reset'])) {
    $blog->db_reset();
    echo "resetting";
}

//$blog->create_user_table();
//$password = md5($_POST['password']);
$password = md5('password1234');

$args = array(
    'username' => 'sam',
    'email' => 'same@example.com',
    'password' => $password
);
$u->create_user($args);



//$blog->create_post_table();
$args = array(
    'user_id' => 2, 
    'post_title' => 'This is a first second post',
    'post_content' => 'A bigger and better blog post'
);
$p->create_post($args);
