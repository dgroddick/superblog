<?php
/**
 * Set up new blog installation
 */
require_once './vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$blog = new SuperBlog\SuperBlog();

if (isset($_GET['reset'])) {
    $blog->db_reset();
    echo "resetting";
}

//$blog->create_user_table();
//$blog->create_post_table();

/*
$password = md5($_POST['password']);

$args = array(
    'username' => 'dgroddick',
    'email' => 'dgroddick@gmail.com',
    'password' => $password
);
$blog->create_user($args);
*/