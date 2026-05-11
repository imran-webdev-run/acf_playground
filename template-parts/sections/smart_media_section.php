<?php
    $smart_section_title = get_sub_field('smart_section_title') ;
    $smart_section_description = get_sub_field('smart_section_description') ;
    $section_button = get_sub_field('section_button') ;
    
    $media_position = get_sub_field('media_position') ; 
    $smart_media_type = get_sub_field('smart_media_type') ;

    $image = get_sub_field('image') ;
    $image_type = $image['image_type'] ;
    $smart_single_image = $image['smart_single_image'] ;
    $smart_gallery_images = $image['smart_gallery_images'] ;
    
    $smart_media_video = get_sub_field('smart_media_video') ;

    if ( $image_type == 'gallery'){
        $section_calss = 'image-gallery';
    }
    
?>


<section class="layout-padding">
    <div class="smart-media-section-wrapper pt-lg-50 pt-30">

        <div class="smart-media-section <?php echo esc_attr($section_calss) ; ?> <?php echo esc_attr($media_position) ; ?>">
            <?php if ($smart_media_type == 'image') : ?>
                <?php if ($image_type == 'single' && !empty($smart_single_image)) : ?>
                    <div class="smart-single-image media">
                        <img src="<?php echo esc_url($smart_single_image['url']) ; ?>" alt="">
                    </div>

                <?php elseif ($image_type == 'gallery' && !empty($smart_gallery_images)) : ?>
                    <div class="gallery-images-wrapper column-count-<?php echo esc_attr(count($smart_gallery_images)) ; ?>">
                        <?php foreach ($smart_gallery_images as $image ) : ?>
                            <div class="smart-gallery-images media">
                                <img src="<?php echo esc_url($image['url']) ; ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div> 

                <?php endif; ?>

                <?php elseif ($smart_media_type == 'video' && !empty($smart_media_video)) : ?>
                    <div class="smart-video media">
                        <video controls >
                            <source src="<?php echo esc_url($smart_media_video['url']) ; ?>" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                        </video>
                    </div>

            <?php endif; ?>
        </div>

        
        <div class="smart-content-section">

            <div class="smart-media-section-title">
                <?php if (!empty($smart_section_title)) : ?>
                    <h3><?php echo esc_html($smart_section_title) ; ?></h3>
                <?php endif; ?>
            </div>

            <div class="smart-media-section-description">
                <?php if (!empty($smart_section_description)) : ?>
                    <p><?php echo esc_html($smart_section_description) ; ?></p>
                <?php endif; ?>
            </div>

            <div class="smart-media-section-btn ">
                <?php if (!empty($section_button)) : ?>
                    <a href="<?php echo esc_url($section_button['url']) ; ?>" class="site-btn btn"><?php echo esc_html($section_button['title']) ; ?>
                    <?php get_template_part('assets/svgs/button-right-arrow-icon' , 'page') ?>
                </a>
                <?php endif; ?>
            </div>

        </div>



    </div>
</section>