<?php
/**
 * Admin create post
 *
 */
include dirname(__FILE__) . '/header.php';
?>
<form method="post">
    <input type="text" name="post_title" value=""><br>
    <textarea rows="4" cols="50" name="post_content"></textarea><br>
    <input type="submit" name="create" value="Save">
</form>
<?php
if (isset($_POST['create'])) {
    $post = [
        'user_id' => 1,
        'post_title' => $_POST['post_title'],
        'post_content' => $_POST['post_content'],
    ];

    $blog = new SuperBlog\Post();
    $blog->create_post($post);
}   