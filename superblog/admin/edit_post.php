<?php
/**
 * Admin edit post
 *
 */
include dirname(__FILE__) . '/header.php';

$blog = new SuperBlog\Post();

$post_id = $_GET['post_id'];
$posts = $blog->get_single_post($post_id);
//echo "<pre>"; print_r($post); echo "</pre>";
?>
<div id="admin_content">
<?php
if ($posts): ?>
    <?php foreach ($posts as $post): ?>
    <form method="post">
        <input type="text" name="post_title" value="<?php echo $post['post_title']; ?>"><br>
        <textarea rows="4" cols="50" name="post_content"><?php echo $post['post_content']; ?></textarea><br>
        <input type="submit" name="save" value="Save">
        <input type="submit" name="delete" value="Delete">
    </form>
    <?php endforeach; ?>
<?php endif; ?>
</div>
<?php include dirname(__FILE__) . '/footer.php'; ?>
<?php
if (isset($_POST['delete'])) {
    global $post_id;
    $blog = new SuperBlog\Post();
    //echo $post_id;
    $blog->delete_post($post_id);
    echo "<p>Post deleted successfully. Go back to <a href='" . ADMIN_DIR . "'>dashboard</a>.</p>";
    //header('Location: index.php');
}