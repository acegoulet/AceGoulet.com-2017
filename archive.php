<?php get_header(); ?>

	<div class="roll-header container text-center">
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1 class="page-title"><?php single_cat_title(); ?></h1>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1 class="page-title"><?php single_tag_title(); ?></h1>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1 class="page-title">Archive: <?php the_time('F j, Y'); ?></h1>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1 class="page-title">Archive: <?php the_time('F, Y'); ?></h1>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1 class="page-title">Archive: <?php the_time('Y'); ?></h1>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="page-title">Posts by <?php echo wp_title(''); ?></h1>
		<?php } ?>
	</div>
	
	<div class="blog-wrapper container">
		<div class="grid_8">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				
					<?php get_template_part('templates/partials/roll-item'); ?>
					
				<?php endwhile; ?>
		
			<?php else : ?>
				<h3 class="roll-title">No posts found in this archive.</h3>
			<?php endif; ?>
			
			<div class="clear"></div>
		
			<?php get_template_part('templates/partials/roll-pagination'); ?>
	
		</div>
		
		<?php get_template_part('templates/partials/roll-sidebar'); ?>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>