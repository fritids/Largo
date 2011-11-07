<?php
/**
 * The template for displaying Category Archive pages.
 */

$cat = $wp_query->get_queried_object();
?>

<?php get_header(); ?>

		<div id="content" class="grid_8" role="main">

			<?php if ( have_posts() ) : ?>

			<div class="category-background">
				<p class="subscribe"><a href="<?php echo get_term_feed_link( $cat->term_id, $cat->taxonomy ); ?>">Follow this category</a></p>
				<h1 class="page-title"><?php single_cat_title(); ?></h1>

				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<div class="category-description">' . $category_description . '</div>' );
				?>

				<div class="related-topics clearfix">
					<h4>Key topics in this category:</h4>
					<?php echo argo_get_related_topics_for_category( $cat ); ?>
				</div> <!-- /.related-topics -->
			</div> <!-- /.category-background -->
			
			<h3 class="recent-posts">Recent posts</h3>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>				
				<?php 
				/* Run the loop for the category page to output the posts.
				* If you want to overload this in a child theme then include a file
				* called loop-category.php and that will be used instead.
				*/
				get_template_part( 'content', 'category' ); ?>

				<?php endwhile; ?>
				<?php argo_content_nav( 'nav-below' ); ?>
			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'argo' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

		</div>
		<!-- /.grid_8 #content -->
<aside id="sidebar" class="grid_4">
<?php get_sidebar('topic'); ?>
</aside>
<!-- /.grid_4 -->
<?php get_footer(); ?>