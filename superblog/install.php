<?php
/**
 * Set up new blog installation
 */
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . '/includes/SuperBlog.php';
require_once dirname(__FILE__) . '/includes/User.php';
require_once dirname(__FILE__) . '/includes/Post.php';
require_once dirname(__FILE__) . '/includes/Settings.php';

$blog = new \SuperBlog\SuperBlog();
$u = new \SuperBlog\User();
$p = new \SuperBlog\Post();
$settings = new \SuperBlog\Settings();

if (isset($_GET['reset'])) {
    $blog->db_reset();
    echo "resetting";
    exit;
}

$u->create_user_table();
$password = md5('password1234');
$args = array(
    'username' => 'admin',
    'email' => 'admin@superblog.test',
    'password' => $password
);
$u->create_user($args);
echo "User created<br>";



$p->create_post_table();
$args = array(
    'user_id' => 1, 
    'post_title' => 'This is a first second post',
    'post_content' => 'A bigger and better blog post'
);
$p->create_post($args);
echo "Posts created<br>";

$settings->create_settings_table();
echo "Settings created<br>";
