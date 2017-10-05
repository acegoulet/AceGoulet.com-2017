<?php get_header(); ?>
	<h1 class="articles-title hidden">Search: <?php the_search_query(); ?></h1>
	<div class="roll-header container text-center"></div>
	
	<div class="blog-wrapper container">
		<div class="grid_8">
			<?php if (have_posts()) : ?>
		
				<?php while (have_posts()) : the_post(); ?>
					
					<?php get_template_part('templates/partials/roll-item'); ?>
						
				<?php endwhile; ?>
				
				<div class="clear"></div>
				
				<?php get_template_part('templates/partials/roll-pagination'); ?>
		
			<?php else : ?>
				<h3 class="roll-title">No posts found in this archive.</h3>
			<?php endif; ?>
		</div>
		
		<?php get_template_part('templates/partials/roll-sidebar'); ?>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>