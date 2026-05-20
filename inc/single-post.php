<div class="single-post">

    <div class="project-title">
        <h2><a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a></h2>
    </div>

    <div class="post-thumb media">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    </div>
    <div class="project-info">

        

        <div class="project-description">
            <p><?php the_content() ; ?></p>
        </div>

    </div>
</div>