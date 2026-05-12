<?php
    
$post_type = get_field('post_source');
$limit     = get_field('posts_limit') ?: 5;
$title     = get_field('section_title');

$query = new WP_Query([
    'post_type'      => $post_type ?: 'post',
    'posts_per_page' => $limit,
    'orderby'        => 'date',
    'order'          => 'DESC'
]);


?>

<?php if($title): ?>
    <h2><?php echo esc_html($title); ?></h2>
<?php endif; ?>

<div class="latest-posts">

<?php if($query->have_posts()): ?>
    <?php while($query->have_posts()): $query->the_post(); ?>

        <article>
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>">Read More</a>
        </article>

    <?php endwhile; ?>
<?php endif; ?>

</div>

<?php wp_reset_postdata(); ?>