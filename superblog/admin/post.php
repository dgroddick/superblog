<?php
/**
 * Admin display all posts
 *
 */
include dirname(__FILE__) . '/header.php';

$blog = new SuperBlog\Post();
?>
<div id="admin_content">

<?php $posts = $blog->get_posts(); ?>
<?php if ($posts): ?>
    <ul>
    <?php foreach ($posts as $post): ?>
    <?php /*echo "<pre>"; print_r($post); echo "</pre>";*/ ?>
        <li><a href="edit_post.php?post_id=<?php echo $post['id']; ?>"><?php echo $post['post_title']; ?></a></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

</div><!-- #admin_content -->

<?php include dirname(__FILE__) . '/footer.php';