<?php
/**
 * Admin page header
 */
session_start();
if (!$_SESSION['loggedin']) {
    header("Location: ../login.php");
}
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
<div class="admin_container">
    <h1 class="admin_header">SuperBlog Admin</h1>