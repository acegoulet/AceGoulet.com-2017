<?php get_header(); ?>
<h1 class="articles-title hidden"><?php single_post_title(); ?></h1>

<div class="blog-wrapper container">
	<div class="grid_8">
		<?php while (have_posts()) : the_post(); ?>
			
			<?php get_template_part('templates/partials/roll-item'); ?>
			
		<?php endwhile; ?>
		
		<div class="clear"></div>
		
		<?php get_template_part('templates/partials/roll-pagination'); ?>
		
	</div>
	
	<?php get_template_part('templates/partials/roll-sidebar'); ?>
	
	<div class="clear"></div>
</div>
<?php get_footer(); ?>
