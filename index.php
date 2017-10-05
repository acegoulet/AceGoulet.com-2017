<?php get_header(); ?>
<h1 class="articles-title hidden"><?php single_post_title(); ?></h1>
<div class="roll-header container">
	<div class="bookmarked-posts">
		<?php $bookmarks = get_field('bookmarked_posts', 'options');
			if(!empty($bookmarks)){
				//print_r($bookmarks);
				foreach($bookmarks as $bookmark){
		?>
					<a class="grid_6 bookmark" href="<?php echo get_permalink($bookmark->ID); ?>">
						<div class="bookmark-inner">
							<?php echo $bookmark->post_title; ?>
						</div>
					</a>
		<?php
				}
			}
		?>
	</div>
	<div class="clear"></div>
	<div class="grid_12">
		<?php get_search_form(); ?>
	</div>
	<div class="clear"></div>
</div>
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
