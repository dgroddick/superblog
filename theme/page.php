<?php
/**
 * Simple theme template
 */
include dirname(__FILE__) . '/header.php';
?>
<div id="content">
    <?php $posts = $blog->get_posts(); ?>
    <?php 
    if ($posts) {
        foreach ($posts as $post) {
        ?>
            <h1><?php echo $post['post_title']; ?></h1>
            <p class="post_date"><?php echo $post['post_date']; ?></p>
            <?php echo $post['post_content']; ?>
        <?php
        }
    }
    ?>
</div>
<?php
include dirname(__FILE__) . '/footer.php'; 