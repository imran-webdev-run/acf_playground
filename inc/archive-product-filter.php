<?php

$term_object = get_queried_object();

$taxonomy = $term_object->taxonomy ?? 'app';

/**
 * Get correct CPT from taxonomy
 */
$taxonomy_object = get_taxonomy($taxonomy);

$post_type = $taxonomy_object->object_type[0] ?? '';

$archive_url = get_post_type_archive_link($post_type);

$terms = get_terms([
    'taxonomy'   => $taxonomy,
    'hide_empty' => false,
]);

?>

<nav class="archive-nav">

    <a href="<?php echo esc_url($archive_url); ?>">
        <?php esc_html_e('All', 'acf-playground'); ?>
    </a>

    <?php if (!empty($terms) && !is_wp_error($terms)) : ?>

        <?php foreach ($terms as $term) : ?>

            <a href="<?php echo esc_url(get_term_link($term)); ?>">
                <?php echo esc_html($term->name); ?>
            </a>

        <?php endforeach; ?>

    <?php endif; ?>

</nav>