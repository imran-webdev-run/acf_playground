<?php 
    $testimonial_source = get_sub_field('testimonial_source') ; // ACF Button Group Field : Testimonial Source
    $manual_testimonial = get_sub_field('testimonial') ; // ACF Repeater Field : Manual Testimonial 
    $show_avatar        = get_sub_field('show_avatar') ; // ACF True / False Field : Show Avater in Testimonial
    $show_rating        = get_sub_field('show_rating') ; // ACF True / False Field : Show Ratting in Testimonial

    $testimonial_perpage = get_sub_field('testimonial_perpage') ; // ACF Number Field : Testimonial Perpage for testimonial source : post

    $layout             = get_sub_field('layout') ; // ACF Button Group Field : Layout grid or slider

?>


<section class="testimonial-section layout-padding">
    <div class="testimonial-section-inner pt-lg-100 pt-50 pb-lg-100 pb-50"> 

        <?php if ( $testimonial_source == 'manual') : ?>
            <div class="testimonial-items-wrapper <?php echo esc_attr( $layout ) ; ?> " > 
                <?php foreach ( $manual_testimonial as $testimonial ) : 
                        $rattings              = $testimonial['rattings'] ;
                        $reviews               = $testimonial['reviews'] ;
                        $author_avatar         = $testimonial['author_avatar'] ;
                        $author_name           = $testimonial['author_name'] ;
                        $author_designation    = $testimonial['author_designation'] ;

                        $first_latter          = strtoupper( substr( $author_name , 0 , 1 ) ) ;

                    ?> 
                    <div class="testimonial-item">

                        <div class="testimonial-top">
                            <?php for ( $i = 1; $i <= $rattings ; $i++) : ?>
                                <?php if ( $show_rating == true) : ?>
                                <span class="rating-star">
                                    <?php get_template_part('svgs/star-icon' , 'page') ?>
                                </span>
                                <?php endif; ?>
                            <?php endfor ; ?>

                            <div class="text-review">
                                <p>
                                    <?php if ($reviews) : ?>
                                        <?php echo esc_html( $reviews ) ; ?>
                                    <?php endif; ?> 
                                </p>
                            </div>
                        </div>

                        <div class="testimonial-bottom">
                            <?php if ( $show_avatar == true )  : ?>
                                <div class="avatar">
                                    <?php if ( $author_avatar ) : ?> 
                                        <img src="<?php echo esc_url( $author_avatar['url'] ) ; ?>" alt="<?php echo esc_attr( $author_avatar['alt'] ) ; ?>">

                                    <?php else : ?>
                                        <span class="avatar-placeholder">
                                            <?php echo esc_html( $first_latter ); ?>
                                        </span>

                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="authore-info">
                                <?php if ( $author_name ) : ?>
                                    <h5 class="author-name">
                                        <?php echo esc_html( $author_name ) ; ?>
                                    </h5>
                                <?php endif; ?>
                                <?php if ( $author_designation ) : ?>
                                    <span class="author-designation">
                                        <?php echo esc_html( $author_designation ) ; ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>

                <?php endforeach ; ?>

            </div>
        
        <?php else : ?>
            <div class="testimonial-items-wrapper ">
                <?php 
                    $testimonial_posts = new WP_Query( array(
                        'post_type'       => 'testimonial',
                        'posts_per_page'  => $testimonial_perpage,
                    ));
                
                ?>
                <?php if ( $testimonial_posts->have_posts() ) : ?>
                    <div class="testimonial-items-wrapper <?php echo esc_attr( $layout ) ; ?>">
                        <?php while ( $testimonial_posts->have_posts() ) : $testimonial_posts->the_post() ; 
                            $rattings              = get_field('rattings') ;
                            $reviews               = get_field('reviews') ;
                            $author_avatar         = get_field('author_avatar') ;
                            $author_name           = get_field('author_name') ;
                            $author_designation    = get_field('author_designation') ;

                            $first_latter          = strtoupper( substr( $author_name , 0, 1 )) ;
                        
                        ?>
                        <div class="testimonial-item">
                            <div class="testimonial-top">
                                <?php for ( $i = 1; $i <= $rattings ; $i++) : ?>
                                    <?php if ( $show_rating == true ) : ?>
                                        <span class="rating-star">
                                            <?php get_template_part('svgs/star-icon' , 'page') ?>
                                        </span>
                                    <?php endif; ?>
                                <?php endfor ; ?>

                                <div class="text-review">
                                    <p>
                                        <?php if ($reviews) : ?>
                                            <?php echo esc_html( $reviews ) ; ?>
                                        <?php endif; ?> 
                                    </p>
                                </div>
                            </div>

                            <div class="testimonial-bottom">
                                <?php if ( $show_avatar == true ) : ?>
                                    <div class="avatar">
                                        <?php if ( $author_avatar ) : ?>
                                            <img src="<?php echo esc_url( $author_avatar['url'] ) ; ?>" alt="<?php echo esc_attr( $author_avatar['alt'] ) ; ?>">

                                        <?php else : ?>
                                            <div class="avatar-placeholder">
                                                <span><?php echo esc_html( $first_latter ) ; ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="authore-info">
                                    <?php if ( $author_name ) : ?>
                                        <h5 class="author-name">
                                            <?php echo esc_html( $author_name ) ; ?>
                                        </h5>
                                    <?php endif; ?>
                                    <?php if ( $author_designation ) : ?>
                                        <span class="author-designation">
                                            <?php echo esc_html( $author_designation ) ; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php endif; ?>

    </div>
</section>