<?php
function sidebar_widgets_init() {

	register_sidebar( array(
		'name'          => 'Post Sidebar',
		'id'            => 'post_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
        'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Blog Roll Sidebar',
		'id'            => 'roll_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
        'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'sidebar_widgets_init' );
?>