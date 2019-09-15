<?php
/**
 * Admin index page
 */
require_once '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require_once dirname(__FILE__) . '/../config.php';
include dirname(__FILE__) . '/header.php';
?>
<div class="admin_content">
    <ul>
        <li><a href="post.php">Posts</a></li>
    </ul>
</div>

