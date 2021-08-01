<?php
/**
 * SuperBlog
 * Description: The most secure Blog engine on the planet
 * 
 * @author David Roddick <dgroddick@gmail.com>
 * @since  1.0
 */
session_start();
require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . '/includes/SuperBlog.php';
require_once dirname(__FILE__) . '/includes/User.php';
require_once dirname(__FILE__) . '/includes/Post.php';
require_once dirname(__FILE__) . '/includes/Settings.php';

$settings = new \SuperBlog\Settings();
$site_description = $settings->get_setting('site_description');

$blog = new \SuperBlog\Post();

require_once dirname(__FILE__) . '/theme/page.php';

