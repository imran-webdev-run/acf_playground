<?php
    $post_type = get_sub_field('post_type') ; // ACF Button Group With Post Type : latest, manual
    
    $latest_post_type_source = get_sub_field('latest_post_type_source') ; // ACF Group Field : Latest Post Query
    $post_perpage = $latest_post_type_source['post_perpage'] ; // ACF Number Field : Post Perpage

    $layout_style = get_sub_field('layout_style');
    $columns = get_sub_field('columns');
    
    


?>



<section class="layout-padding">
    <div class="post-card-section">

        <?php if ( $post_type == 'latest') : ?>

            <div class="latest-post-card-items <?php if ( $layout_style === 'grid') : ?> <?php echo esc_attr( $layout_style ) ; ?> <?php endif; ?> columns-<?php echo esc_attr( $columns ) ; ?> ">
                <?php 
                    $latest_posts = new WP_Query(array(
                        'post_type'         => $latest_post_type_source,
                        'posts_per_page'    => $post_perpage,
                    ));
                    ?>
                <?php if ( $latest_posts->have_posts()) : ?>
                    <?php while ( $latest_posts->have_posts()) : $latest_posts->the_post() ; ?>
                    <div class="latest-post-card-item">
                        <div class="post-thumb">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <div class="short-description">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="box-footer">
                            <a href="<?php the_permalink(); ?>" class="site-btn">
                                Lees Blog
                            </a>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>

        <?php elseif ( $post_type == 'manual' ) : ?>

            <div class="manually-post-card-items <?php echo esc_attr( $layout_style ) ; ?> columns-<?php echo esc_attr( $columns ) ; ?>">

                <?php $manually_post = get_sub_field('manually_post'); 
                        if ( $manually_post ) :
               
                    foreach ( $manually_post as $post ) : 
                        setup_postdata( $post ) ;
                ?>

                <div class="product-item">
                    <div class="product-inner">
                        <div class="post-thumb">
                            <?php echo get_the_post_thumbnail( $post->ID ); ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <div class="short-description">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="box-footer">
                            <a href="<?php the_permalink(); ?>" class="site-btn">
                                Lees Blog
                            </a>
                        </div>
                    </div>
                </div>

                <?php endforeach;  wp_reset_postdata(); endif; ?>

            </div>

        <?php endif; ?>

    </div>
</section>




