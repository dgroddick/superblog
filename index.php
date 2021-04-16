<?php
/**
 * SuperBlog
 * Description: The most secure Blog engine on the planet
 * 
 * @author David Roddick <dgroddick@gmail.com>
 * @since  1.0
 */
session_start();
require_once './vendor/autoload.php';
require_once dirname(__FILE__) . '/config.php';

$blog = new SuperBlog\Post();

require_once dirname(__FILE__) . '/theme/page.php';

