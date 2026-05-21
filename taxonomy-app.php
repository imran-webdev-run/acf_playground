<?php

get_header();

?>
<main id="primary" class="site-main layout-padding">

    

        <?php if ( have_posts() ) : ?>

            <header class="page-header">

                <?php
                    the_archive_title( '<h1 class="page-title">' , '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                ?>

            </header>

            <div class="post-type-filter pt-20 pb-20 ">
                <?php get_template_part( 'inc/archive-product-filter' ); ?>
            </div>
            <div class="project-filter">
                <?php
                    while ( have_posts()) : the_post();

                    get_template_part( 'inc/project-card' ); // IGNORE

                    endwhile; ?>

            </div>

            <div class="pagination">
                

                <?php
                    ob_start();
                    get_template_part('svgs/hover-arrow');
                    $arrow_icon = ob_get_clean();

                    the_posts_pagination([
                        'mid_size'  => 2,

                        'prev_text' => $arrow_icon ,

                        'next_text' => $arrow_icon,
                    ]);
                    ?>

                
            </div>
                        
        
        <?php            
        else : 

            get_template_part( 'template-parts/content', 'none' );



        endif; ?>





</main>




<?php 

get_footer();