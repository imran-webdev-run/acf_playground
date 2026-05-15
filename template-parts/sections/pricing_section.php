<?php

    $pricing_plan               = get_sub_field('pricing_plan') ; // ACF Repeater Field 

    
?>


<section class="pricing-section layout-padding">
    <div class=" pt-lg-100 pt-30 pb-lg-100 pb-30 pricing-section-inner">
        <div class="pricing-items">

            <?php if ( $pricing_plan ) : ?>
                <div class="pricing-item columns-<?php echo esc_attr( count($pricing_plan) ) ; ?>">
                    <?php
                        foreach ( $pricing_plan as $plan ) :
                            $pricing_plan_name          = $plan['pricing_plan_name'] ; // ACF text Field : Plane Name
                            $set_price_per_plan         = $plan['set_price_per_plan'] ; // ACF text Field : Plane Price
                            $pricing_plan_time_frame    = $plan['pricing_plan_time_frame'] ; // ACF text Field : Plane Time Frame 

                            $feature_list_items         = $plan['feature_list_items'] ; // ACF Repeater Field : Feature List
                            //$feature_list_item          = $feature_list_items['feature_list_item'] ; // ACF Text Field : Feature List

                            $pricing_cta_button         = $plan['pricing_cta_button'] ; // ACF Link Field : CTA

                            $highlight                  = $plan['highlight'] ; // ACF True / False Field : Pricing Card Higlight
                            if ( $highlight ) {
                                $highlight = 'highlight' ;
                            } else {
                                $highlight = '' ;
                                
                            }
                            
                    ?>

                    <div class="pricing-item-inner <?php echo esc_attr( $highlight ) ; ?>">
                        <h5><?php echo esc_html( $pricing_plan_name) ; ?></h5>
                        <div class="price">
                            <span class="price-amount"><?php echo esc_html( $set_price_per_plan) ; ?></span>
                            <span class="price-time-frame"><?php echo esc_html( $pricing_plan_time_frame) ; ?></span>
                        </div>
                        <div class="feature-list">
                            <?php if ( $feature_list_items ) : ?>
                                <ul>
                                    <?php foreach ( $feature_list_items as $feature ) : ?>
                                        <li><?php get_template_part('svgs/check-icon' , 'page') ?> <?php echo esc_html( $feature['feature_list_item'] ) ; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="cta-button">
                            <?php if ( $pricing_cta_button ) : 
                                $cta_url = $pricing_cta_button['url'] ;
                                $cta_title = $pricing_cta_button['title'] ;
                                $cta_target = $pricing_cta_button['target'] ? $pricing_cta_button['target'] : '_self' ;
                            ?>
                                <a href="<?php echo esc_url( $cta_url ) ; ?>" target="<?php echo esc_attr( $cta_target ) ; ?>"><?php echo esc_html( $cta_title ) ; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
        </div>
    </div>
</section>