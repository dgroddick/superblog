<?php
/**
 * Admin display all posts
 *
 */
include dirname(__FILE__) . '/header.php';

$blog = new SuperBlog\SuperBlog();
?>
<div class="admin_content">

<?php $users = $blog->get_users(); ?>
<?php /*echo "<pre>"; print_r($users); echo "</pre>";*/ ?>

<?php if ($users): ?>
    <ul>
    <?php foreach ($users as $user): ?>
        <li><a href="edit_user.php?user_id=<?php echo $user['id']; ?>"><?php echo $user['username']; ?></a></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

</div><!-- #admin_content -->