<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class(); ?>>
		<div class="entry-header container roll-header text-center">
			<div class="grid_12">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</div>
			<div class="clear"></div>
		</div>
		<div class="blog-wrapper container">
			<div class="grid_12">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</article>
	
<?php endwhile; ?>

<?php get_footer(); ?>