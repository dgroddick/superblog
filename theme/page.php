<?php include dirname(__FILE__) . '/header.php'; ?>

  <div class="row g-5">
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Latest News
        </h3>
        <?php $posts = $blog->get_posts(); ?>
        <?php 
        if ($posts):
            foreach ($posts as $post): ?>
                <article class="blog-post">
                    <h2 class="blog-post-title"><?php echo $post['post_title']; ?></h2>
                    <p class="blog-post-meta"><?php echo $post['post_date']; ?></p>

                    <?php echo $post['post_content']; ?>
                </article>
            <?php
            endforeach;
        endif;
        ?>

    </div>


<?php include dirname(__FILE__) . '/sidebar.php'; ?>
<?php include dirname(__FILE__) . '/footer.php';  ?>
