<article <?php post_class('blog-roll-post'); ?>>
	<div class="entry-header">
		<h2 class="roll-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part('templates/partials/entry-meta'); ?>
	</div>
    <div class="entry-summary">
		<?php the_excerpt(); ?>
    </div>
</article>