<!DOCTYPE html>
<html lang="en" class="gt-ie9" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php wp_title(' &mdash; ',true,'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png?v=3">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/img/favicon-32x32.png?v=3">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/img/favicon-16x16.png?v=3">
	<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/img/manifest.json?v=3">
	<link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/img/safari-pinned-tab.svg?v=3" color="#25ac99">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico?v=3">
	<meta name="apple-mobile-web-app-title" content="AceGoulet.com">
	<meta name="application-name" content="AceGoulet.com">
	<meta name="msapplication-config" content="<?php bloginfo('template_directory'); ?>/img/browserconfig.xml?v=3">
	<meta name="theme-color" content="#ffffff">
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
		<div class="header-inner">
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
		</div>
	</header>