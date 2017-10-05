<article <?php post_class('blog-roll-post'); ?>>
	<div class="entry-header">
		<h3 class="roll-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="entry-meta">
			<p><?php the_time(get_option('date_format')); ?></p>
		</div>
	</div>
    <div class="entry-summary">
		<?php the_excerpt(); ?>
    </div>
</article>