<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class(); ?>>
		<div class="entry-header container roll-header text-center">
			<div class="grid_12">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php get_template_part('templates/partials/entry-meta'); ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="blog-wrapper container">
			<div class="grid_12">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			
				<div class="entry-footer">
					
					<nav class="single-pagination">
						<p class="next"><?php next_post_link('Next post: %link'); ?></p>
						<p class="previous"><?php previous_post_link('Previous post: %link'); ?></p>									</nav>
				</div>
				<div class="widget">Tags: <span class="widget-list tag-list"><?php the_tags(''); ?></span></div>
			</div>
			
			<?php //get_template_part('templates/partials/post-sidebar'); ?>
	
			<div class="clear"></div>
		</div>
	</article>
	
<?php endwhile; ?>

<?php get_footer(); ?>