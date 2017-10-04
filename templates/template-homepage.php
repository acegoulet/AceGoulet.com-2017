<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<article <?php post_class('home-article'); ?>>
		<h1 class="home-title hidden"><?php bloginfo('name'); ?></h1>
		
		<div class="home-content">
			<div class="home-section container home-section-copy" id="who-scroll">
				<div class="fade-in-load">
					<?php the_field('section_1_copy'); ?>
				</div>
			</div>
			<div class="home-section middle-section container home-section-copy" id="where-scroll">
				<div class="fade-in-out-scroll">
					<?php the_field('section_2_copy'); ?>
					<div class="accent">
						<div class="palm-1"></div>
						<div class="palm-2"></div>
					</div>
				</div>
			</div>
			<div class="home-section middle-section container" id="what-scroll">
				<div class="fade-in-out-scroll">
					<div class="accent">
						<div class="code-1"></div>
						<div class="code-2"></div>
					</div>
					<?php the_field('section_3_copy'); ?>
					<div class="portfolio-links">
						<div class="grid_4 link-inner-wrapper">
							<?php 
								$links_per_column = get_field('links_per_column');
								if(get_field('portfolio')){
									$count = 0;
									while( has_sub_field('portfolio') ){
							?>
										<a href="<?php the_sub_field('link'); ?>" target="_blank" class="port-links">
											<span class="link-title"><?php the_sub_field('title'); ?></span>
											<span class="link-description"><?php the_sub_field('text'); ?></span>
										</a>
								
							<?php 
										if($count == $links_per_column - 1){ 
											echo '</div><div class="grid_4 link-inner-wrapper">'; 
										}
										$count++; 
										if($count == $links_per_column){ 
											$count = 0;
										} 
									} 
								} 
							?>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="home-section container home-section-copy" id="contact-scroll">
				<div class="fade-in-out-scroll">
					<?php the_field('section_4_copy'); ?>
					<div class="link-wrapper">
						<?php if( get_field('section_3_links') ): ?>
							<?php $count = 0; ?>
							<?php while( has_sub_field('section_3_links') ): ?>
								
								<a href="<?php the_sub_field('link'); ?>" target="_blank" class="button contact-links grid_third"><?php the_sub_field('text'); ?></a>
								<?php if( $count == 2 ){ echo '<div class="clear"></div>'; } ?>
							<?php $count++; if( $count == 3 ){ $count = 0; } endwhile; ?>
						<?php endif; ?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		
	</article>
	
<?php endwhile; ?>

<?php get_footer(); ?>