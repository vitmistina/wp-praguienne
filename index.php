<?php get_header(); ?>
		<?php
        /* Start Secondary Loop */
        $other_posts = new WP_Query( /*maybe some args here? */ );
				while( $others_posts->have_posts() ): $other_posts->the_post(); 
				
				the_title();
				
        endwhile; /* end secondary loop */ 
        wp_reset_postdata(); /* Restore the original queried page to the $post variable */
    ?>
    <main>
      <div class="container">
        <div class="col-md-8  col-lg-9 post-list">
          <?php
    			if ( have_posts() ) :

    				/* Start the Loop */
    				while ( have_posts() ) : the_post();

    					/*
    					 * Include the Post-Format-specific template for the content.
    					 * If you want to override this in a child theme, then include a file
    					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    					 */
    					get_template_part( 'template-parts/post/content' );

    				endwhile;

    				the_posts_pagination( array(
              'mid_size' => 2,
    					'prev_text' => '<span class="screen-reader-text">Previous Page</span>',
    					'next_text' => '<span class="screen-reader-text">Next Page</span>',
    				) );

    			else :

    				get_template_part( 'template-parts/post/content', 'none' );

    			endif;
    			?>

        </div>
        <?php get_sidebar(); ?>
      </div>
    </main>

    <?php get_footer(); ?>
