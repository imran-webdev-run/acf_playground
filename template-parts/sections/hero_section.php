<?php

    $hero_title = get_sub_field('hero_title') ;
    $hero_description = get_sub_field('hero_description') ;
    
    $cta_button_group = get_sub_field('cta_button_group') ;
    $cta_button = get_sub_field('cta_button') ;

    $hero_bg = get_sub_field('hero_bg') ;

    if ($hero_bg === 'image' ){
        $hero_image = get_sub_field('hero_image') ;
        $section_class = 'bg-type-image';

    }elseif ($hero_bg === 'video' ){
        $hero_video = get_sub_field('hero_video') ;
        $section_class = 'bg-type-video';

    }elseif ($hero_bg === 'color' ){
        $bg_color = get_sub_field('bg_color') ;
        $section_class = 'bg-type-color';
    }


?>

<section>
    <div class="hero-section-wrapper layout-padding pt-lg-50 pt-30 <?php echo $section_class ; ?>">
        <div class="hero-inner" <?php if (!empty($bg_color)){echo 'style="background-color: ' . $bg_color . '; "';} ?>>
            
            <div class="hero-media-wrapper">
            <?php if ($hero_bg === 'image' && !empty($hero_image)){ ?>

                <div class="hero-image media">
                    <img src="<?php echo $hero_image['url'] ; ?>" alt="">
                </div>
           <?php } elseif ($hero_bg === 'video' && !empty($hero_video)){ ?>

                <div class="hero-video media">
                   <video controls autoplay>
                    <source src="<?php echo $hero_video['url'] ; ?>" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                    </video>
                </div>
           <?php } 
           
           ?>
            
            </div>

            <div class="hero-content">
                <div class="hero-title">
                    <h1><?php echo $hero_title ; ?></h1>
                </div>
                <div class="hero-description">
                    <p><?php echo $hero_description ; ?></p>
                </div>
                <div class="cta-btn">

                    <?php if ($cta_button_group == 'true' && !empty( $cta_button )) : ?>
                        <a href="<?php echo esc_url($cta_button['url']) ; ?>"><?php echo esc_html($cta_button['title']) ; ?>
                        <?php get_template_part('assets/svgs/button-right-arrow-icon' , 'page') ?>
                    </a>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</section>