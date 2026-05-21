<div class="project-card">
    <div class="project-thumb media">
        <?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ) ; ?> 
        <?php if ( $thumbnail ) : ?>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $thumbnail[0] ) ; ?>" alt="<?php the_title( ); ?>"></a>
        <?php endif; ?> 
    </div>
    <div class="project-info">

        <div class="post-category">
            <?php
                $categories = get_the_terms( get_the_ID(), 'app' ); 
                foreach ($categories as $category) :
            ?>

                <a href="<?php echo esc_url(get_term_link($category)); ?>">
                    <?php echo esc_html($category->name); ?>
                </a>

                <?php echo '  '; ?>

            <?php endforeach; ?>

        </div>

        <div class="project-title">
            <h2><a href="<?php the_permalink(); ?>">
                <?php 
                    $title = get_the_title();
                    $trim_title = mb_strimwidth( $title , 0, 40, '...' );
                    echo esc_html( $trim_title ) ;
                     ?>
            </a></h2>
        </div>

        <div class="project-description">
            <p><?php 
                $excerpt = get_the_excerpt();
                $trim_excerpt = mb_strimwidth( $excerpt , 0, 100, '...' );
                echo esc_html( $trim_excerpt ) ;
            
             ?></p>
        </div>

    </div>
</div>