<?php
/**
 * SuperBlog
 * 
 * @author David Roddick <dgroddick@gmail.com>
 * @since  1.0
 */
require_once './vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require_once dirname(__FILE__) . '/config.php';

$blog = new SuperBlog\SuperBlog();


$args = array(
    'user_id' => 1,
    'post_title' => 'This is a first fancy post',
    'post_content' => 'A bigger and better blog post'
);
//$ng->create_post($args);

require_once dirname(__FILE__) . '/theme/page.php';

