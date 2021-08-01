<?php
/**
 * Admin page header
 */
session_start();
if (!$_SESSION['loggedin']) {
    header("Location: ../login.php");
}
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

require_once '../vendor/autoload.php';
require_once dirname(__FILE__) . '/../config.php';
?>
<!doctype html>
<html>
<head>
    <title><?php echo SITE_TITLE; ?></title>
    <link rel="stylesheet" href="<?php echo ADMIN_DIR . '/css/style.css'; ?>">
</head>
<body>
<div id="admin_container">

    <div id="admin_header">
        <h1>SuperBlog Admin</h1>
        <p>Howdy, <?php echo $username; ?></p>
    </div>