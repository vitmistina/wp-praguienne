<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<?php
		// if ( is_sticky() && is_home() ) :
		// 	echo 'sticky';
		// endif;
	?>
	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<div class="blog-post__featured-image">
			<?php if ( !is_single() ) : ?>
			<a href="<?php the_permalink(); ?>">
				<span class="post-thumb-wrapper">
				<?php endif ?>
					<?php the_post_thumbnail( 'large' ); ?>
				<?php if ( !is_single() ) : ?>
					<span class="caption">
						<span class="the-btn">View Post</span>
					</span>
				</span>
			</a>
		<?php endif ?>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			if ( 'post' === get_post_type() ) :
				echo '<div class="blog-post__info">';
					if ( is_single() ) :
						praguienneEchoTimePosted();
						edit_post_link('edit post', '<span>', '</span>');
					else :
						praguienneEchoTimePostedLink();
						edit_post_link('edit post', '<span>', '</span>');
					endif;
				echo '</div><!-- .entry-meta -->';
			endif;

		?>
		</header>


	<div class="blog-post__content">
		<?php
			/* translators: %s: Name of current post */
			the_content('');
			wp_link_pages( array(
							'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
							'after'       => '</div>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
						) );
		?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<div class="single-post__footer">
		<?php
		$tagsList = get_the_tag_list( '', ' ' );
		if ($tagsList) {
			echo '<div class="single-post__footer-tags"><h3 class="screen-reader-text">Tags:</h3>' . $tagsList . '</div>';
		}
		 ?>
			<div class="fb-like" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		</div>
	 <div class="single-post__nav">
		 <?php previous_post_link('%link','<span class="single-post__nav-previous-link">Previous Post</span><span>%title</span>'); ?>
		 <?php next_post_link('%link','<span class="single-post__nav-next-link">Next Post</span><span>%title</span>'); ?>
	 </div>
		 <?php if ( comments_open() ) : ?>
		 	<div id="disqus_thread"></div>
			<script>

			/**
			*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
			*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

			var disqus_config = function () {
			this.page.url = '<?php echo get_permalink() ?>';  // Replace PAGE_URL with your page's canonical URL variable
			this.page.identifier = <?php the_ID(); ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
			};

			(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = 'https://praguienne.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
			})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<?php endif; ?>

	<?php endif; ?>

</article><!-- #post-## -->
