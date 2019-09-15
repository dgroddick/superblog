<?php
/**
 * Admin edit post
 *
 */
require_once '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require_once dirname(__FILE__) . '/../config.php';
include dirname(__FILE__) . '/header.php';

$blog = new SuperBlog\SuperBlog();

$post_id = $_GET['post_id'];
$posts = $blog->get_single_post($post_id);
//echo "<pre>"; print_r($post); echo "</pre>";

if ($posts): ?>
    <?php foreach ($posts as $post): ?>
    <form>
        <input type="text" name="post_title" value="<?php echo $post['post_title']; ?>"><br>
        <textarea rows="4" cols="50" name="post_content"><?php echo $post['post_content']; ?></textarea><br>
        <input type="submit" name="save" value="Save">
    </form>
    <?php endforeach; ?>
<?php endif; ?>