<?php
    $post_card                  = get_sub_field('post_card') ; // Field Type Button Group Post Query = post, project, product.

    $post_type                  = get_sub_field('post_type') ; // Field Type Group Type. 
    $project_post_type          = get_sub_field('project_post_type') ; // Field Type Group Product Post Type. Post Query = project,
    $blog_post_type             = get_sub_field('blog_post_type') ; // Field Type Group Product Post Type. Post Query = blog,


?>

<section class="layout-padding">
    <div class="post-card-section-wrapper pt-lg-50 pt-30">

        <?php if ( $post_card == 'product' ) :  
                $products = $post_card['product_post_type'] ;
            ?>
        <?php if ( $products == 'manual' ) :  
                $manual_post_type = $products['manual_post_type'];
            ?>

            <?php foreach ( $manual_post_type as $post ) : ?>

                    <h4><?php the_title($post); ?></h4>

                <?php endforeach; ?>


        <?php endif; ?>

    </div>
</section>

<h4> Imran Hossain</h4>