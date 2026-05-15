<?php 
    $testimonial_source = get_sub_field('testimonial_source') ; // ACF Button Group Field : Testimonial Source
    $manual_testimonial = get_sub_field('testimonial') ; // ACF Repeater Field : Manual Testimonial 
    $show_avatar        = get_sub_field('show_avatar') ; // ACF True / False Field : Show Avater in Testimonial
    $show_rating        = get_sub_field('show_rating') ; // ACF True / False Field : Show Ratting in Testimonial

?>


<section class="testimonial-section layout-padding">
    <div class="testimonial-section-inner pt-lg-100 pt-50 pb-lg-100 pb-50"> 

        <?php if ( $testimonial_source == 'manual') : ?>
            <div class="testimonial-items-wrapper" >
                <?php foreach ( $manual_testimonial as $testimonial ) : 
                        $rattings              = $testimonial['rattings'] ;
                        $reviews               = $testimonial['reviews'] ;
                        $author_avatar         = $testimonial['author_avatar'] ;
                        $author_name           = $testimonial['author_name'] ;
                        $author_designation    = $testimonial['author_designation'] ;

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
                                    <?php echo esc_html( $reviews ) ; ?>
                                </p>
                            </div>
                        </div>

                        <div class="testimonial-bottom">
                            <?php if ( $show_avatar == true )  : ?>
                                <div class="avatar">
                                    <?php if ( $author_avatar ) : ?> 
                                        <img src="<?php echo esc_url( $author_avatar['url'] ) ; ?>" alt="<?php echo esc_attr( $author_avatar['alt'] ) ; ?>">

                                    <?php endif; ?>

                                
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endforeach ; ?>





            </div>

            <?php endif; ?>

    </div>
</section>