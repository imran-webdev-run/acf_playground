
<?php
    $section_title      = get_sub_field('section_title') ;
    $feature_section    = get_sub_field('feature_section') ;
    $columns            = get_sub_field('columns') ;



?>

<section>
    <div class="feature-section layout-padding pt-lg-100 pt-50 pb-lg-100 pb-50">
        <div class="feature-section-inner">

            <div class="feature-section-top">
                <h2 class="feature-section-top-heading"><?php echo esc_html($section_title) ; ?></h2>
            </div>

            <div class="feature-section-items columns-<?php echo esc_attr($columns) ; ?>">

                <?php if ( $feature_section ) : ?>
                    <?php foreach ($feature_section as $item ) : 

                            $feature_icon           = $item['feature_icon']; 
                            $feature_title          = $item['feature_title'];
                            $feature_description    = $item['feature_description'];
                            $feature_list_content   = $item['feature_list_content'] ;
                        ?>

                        <div class="feature-section-item">
                            <div class="feature-icon">
                                <?php if (!empty($feature_icon)) : ?>
                                    <img src="<?php echo esc_url($feature_icon['url']) ; ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="title">
                                <?php if ( !empty($feature_title) ) : ?>
                                    <h4><?php echo esc_html($feature_title) ; ?></h4>
                                <?php endif; ?>
                            </div>
                            <div class="description">
                                <?php if ( !empty($feature_description) ) : ?>
                                    <p><?php echo esc_html($feature_description) ; ?></p>
                                <?php endif; ?>
                            </div>
                        
                        
                        <div class="feature-section-item-list">
                            <?php if ( $feature_list_content ) : ?>
                                <ul class="feature-section-list-items">
                                    <?php foreach ( $feature_list_content as $list ) :
                                        $list_item = $list['list_item'] ;                                    
                                        ?>
                                        <?php if ( !empty($list_item)) : ?>
                                            <li class="feature-sectionlist-item">
                                                <?php echo esc_html($list_item) ; ?>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>    
                                </ul>
                            <?php endif; ?>
                        </div>
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>


            </div>
        </div>
    </div>
</section>