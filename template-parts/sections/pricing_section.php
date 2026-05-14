<?php

    $pricing_plan               = get_sub_field('pricing_plan') ; // ACF Repeater Field 
    $pricing_plan_name          = get_sub_field('pricing_plan_name') ; // ACF text Field : Plane Name
    $set_price_per_plan         = get_sub_field('set_price_per_plan') ; // ACF text Field : Plane Price
    $pricing_plan_time_frame    = get_sub_field('pricing_plan_time_frame') ; // ACF text Field : Plane Time Frame 

    $feature_list_items         = get_sub_field('feature_list_items') ; // ACF Repeater Field : Feature List

    $pricing_cta_button         = get_sub_field('pricing_cta_button') ; // ACF Link Field : CTA

    $highlight                  = get_sub_field('highlight') ; // ACF True / False Field : Pricing Card Higlight

    
  
    
?>


<section class="layout-padding">
    <div class="pricing-section pt-lg-50 pt-30">
        <div class="pricing-items">

            <div class="pricing-item">
                <?php
                
                
                
                ?>
            </div>

        </div>
    </div>
</section>