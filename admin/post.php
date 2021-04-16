<?php
/**
 * Admin display all posts
 *
 */
require_once '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require_once dirname(__FILE__) . '/../config.php';
include dirname(__FILE__) . '/header.php';

$blog = new SuperBlog\SuperBlog();
?>
<div class="admin_content">

<?php $posts = $blog->get_posts(); ?>
<?php if ($posts): ?>
    <ul>
    <?php foreach ($posts as $post): ?>
    <?php /*echo "<pre>"; print_r($post); echo "</pre>";*/ ?>
        <li><a href="edit.php?post_id=<?php echo $post['id']; ?>"><?php echo $post['post_title']; ?></a></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

</div><!-- #admin_content -->