
<?php
    $accordion   = get_sub_field('accordion') ; // ACF Repeater Field : Accordion
    $show_accordion_answer = get_sub_field('show_accordion_answer') ; // ACF True / False Field : Show Accordion Answer
?>

<section class="accordion-section layout-padding" >
    <div class="accordion-section-inner pt-lg-100 pt-50">
        <?php if ( $accordion ) : ?>
            <div class="accordion-items-wrapper">
                <?php foreach ( $accordion as $item ) : 
                    $accordion_question    = $item['accordion_question'] ;
                    $accordion_answer      = $item['accordion_answer'] ; // ACF wysiwyg Field : Accordion Answer
                    $show_accordion_answer      = $item['show_accordion_answer'] ;

                     if ( $show_accordion_answer == true ) {
                        $show_accordion = 'active' ;
                     } else {
                        $show_accordion = '' ;
                     }

                    ?>   
                    
                    <div class="accordion-item <?php echo esc_attr( $show_accordion ) ; ?>"> 
                        <div class="accordion-question">
                            <h4>
                                <?php if ( $accordion_question ) : ?>
                                    <?php echo esc_html( $accordion_question ) ; ?>
                                <?php endif; ?>
                            </h4>
                            <div class="dowun-arrow-icon"><?php get_template_part('svgs/down-arrow' , 'page') ;  ?></div>
                        </div>

                            <div class="accordion-answer">
                                <?php if ( $accordion_answer ) : ?>
                                    <span><?php echo wp_kses_post( $accordion_answer ) ; ?></span>
                                 <?php endif; ?>
                            </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif;  ?>
    </div>


</section>