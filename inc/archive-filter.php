<?php

    $term_object         = get_queried_object();
    $taxonomy            = 'webdevelopment';

    $post_type           = get_post_type();
    $archive_url         = get_post_type_archive_link( $post_type );
    $on_all_page         = is_post_type_archive( $post_type );

    $terms               = get_terms([
        'taxonomy'       => $taxonomy,
        'hide_empty'     => false,
    ]);

?>

<nav class="archive-nav">
    <a href="<?php echo esc_url( $archive_url ); ?>">All</a>

    <?php if ( !empty( $terms ) && !is_wp_error( $terms )) : ?> 
        <?php foreach ( $terms as $term ) : ?>
            <a href="<?php echo esc_url( get_term_link( $term )); ?>"><?php echo esc_html( $term->name ) ; ?></a>
        <?php endforeach; ?>
    <?php endif; ?>
    
</nav>
