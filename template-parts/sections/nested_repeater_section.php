
<?php
    $section_title = get_sub_field('section_title') ;

    $feature_section = get_sub_field('feature_section');



?>

<section>
    <div class="feature-section layout-padding pt-lg-50 pt-30">
        <div class="feature-section-inner">

            <div class="feature-section-top">
                <h2><?php echo esc_html($section_title) ; ?></h2>
            </div>

            <div class="feature-section-items">

                <?php if ( $feature_section ) : ?>
                    <?php foreach ($feature_section as $item ) : ?>

                        <?php
                            $feature_icon = $item['feature_icon']; 
                            $feature_title = $item['feature_title'];
                            $feature_description = $item['feature_description'];
                            
                        ?>

                        <div class="feature-section-item">
                            <div class="feature-icon">
                                <?php if (!empty($feature_icon)) : ?>
                                    <img src="<?php echo esc_url($feature_icon['url']) ; ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="title">
                                <h4><?php echo esc_html($feature_title) ; ?></h4>
                            </div>
                            <div class="description">
                                <p><?php echo esc_html($feature_description) ; ?></p>
                            </div>
                        </div>
                        
                        <div class="feature-section-item-list">
                            
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>


            </div>
        </div>
    </div>
</section>