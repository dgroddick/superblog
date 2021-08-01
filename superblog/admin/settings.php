<?php
/**
 * Admin index page
 */
include dirname(__FILE__) . '/header.php';
$blog = new SuperBlog\Settings();
//$blog->create_settings_table();

$args = array(
    'setting_name' => 'site_description',
    'setting_value' => 'The most secure blog in the world'
);
//$blog->add_setting($args);
$settings = $blog->get_all_settings();

//echo "<pre>"; print_r($settings); echo "</pre>";
?>
<div id="admin_content">
    <h2>Settings</h2>
    <form method="post">
        <?php foreach ($settings as $setting): ?>
        <table>
            <tr><td><?= ucwords(str_replace("_", " ", $setting['setting_name'])); ?></td><td><input size=100 type="text" name="<?= $setting['setting_name']; ?>" value="<?= $setting['setting_value']; ?>"></td></tr>
        </table>
        <?php endforeach; ?>
        <input type="submit" name="save" value="Save">
        <input type="submit" name="delete" value="Delete">
    </form>
    
</div>

<?php include dirname(__FILE__) . '/footer.php';