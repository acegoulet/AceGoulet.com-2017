<!DOCTYPE html>
<html lang="en" class="gt-ie9" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php wp_title(' &mdash; ',true,'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/img/appletouch-114x114.jpg" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/img/appletouch-144x144.jpg" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a href="javascript:void(0)" class="navicon">
    	<div class="top-left all-transition"></div>
    	<div class="top-middle all-transition"></div>
    	<div class="top-right row-end all-transition"></div>
    	<div class="middle-left all-transition"></div>
    	<div class="middle-middle all-transition"></div>
    	<div class="middle-right row-end all-transition"></div>
    	<div class="bottom-left bottom-row all-transition"></div>
    	<div class="bottom-middle bottom-row all-transition"></div>
    	<div class="bottom-right row-end bottom-row all-transition"></div>
	</a>
	<header>
		<div class="menu-title"><?php bloginfo('name'); ?></div>
		<?php 
			wp_nav_menu( 
				array(
					'theme_location' => 'main-nav',
					'fallback_cb' => false,
					'menu_id' => 'main-nav'
				)
			);
		?>
	</header>