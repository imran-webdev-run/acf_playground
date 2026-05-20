<div class="project-card">
    <div class="project-thumb">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    </div>
    <div class="project-info">

        <div class="project-title">
            <h2><a href="<?php the_permalink(); ?>">
                <?php 
                    $title = get_the_title();
                    $trim_title = wp_trim_words( $title , 7 );
                    echo esc_html( $trim_title ) ;
                     ?>
            </a></h2>
        </div>

        <div class="project-description">
            <p><?php 
                $excerpt = get_the_excerpt();
                $trim_excerpt = wp_trim_words( $excerpt , 6 ) ;
                echo esc_html( $trim_excerpt ) ;
            
             ?></p>
        </div>

    </div>
</div>