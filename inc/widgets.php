<?php
function sidebar_widgets_init() {

	register_sidebar( array(
		'name'          => 'Post Sidebar',
		'id'            => 'post_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
        'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Blog Roll Sidebar',
		'id'            => 'roll_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
        'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'sidebar_widgets_init' );
?>