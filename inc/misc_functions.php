<?php 
	
/* ---------------------------------------------
Force Login
--------------------------------------------- */

function aceify_force_login() {
	global $post;
	if ( ( is_single() || is_front_page() || is_page() ) && !is_page('login') && !is_user_logged_in()){
		auth_redirect();
	}	
}
//add_action( 'wp_head', 'aceify_force_login' ); //uncomment to force users to login

/* ---------------------------------------------
shorter stylesheet directory function & get template directory function
--------------------------------------------- */
function gsdu() {
	return get_stylesheet_directory_uri();
}
function gtdu() {
	return get_template_directory_uri();
}

/* ---------------------------------------------
Enqueue Styles
--------------------------------------------- */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', gsdu() . '/style.css', '', '1.1' );

}

/* ---------------------------------------------
Enqueue Scripts.
--------------------------------------------- */

//remove jquery and re-enqueue in footer
function aceify_jquery_init() {
	if (!is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php') {
		wp_deregister_script('jquery');
		wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', FALSE, '1.12.4', TRUE);
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'aceify_jquery_init');

function theme_scripts_enqueue() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('waypoints', gtdu(). '/js/vendor/jquery.waypoints.min.js', 'jquery', '4.0.1', true);
	
	if(get_site_env() == 'staging' || get_site_env() == 'dev'){
		wp_enqueue_script('theme-scripts', gtdu(). '/js/site-scripts/site-scripts.js', array('jquery', 'waypoints'), '1.0.0', true);
	}
	else {
		wp_enqueue_script('theme-scripts-min', gtdu(). '/js/script-min.js', array('jquery','waypoints'), '1.0.0', true);
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts_enqueue' );

/* ---------------------------------------------
Remove file versions from enqueues on production site (increases page speed performance)
--------------------------------------------- */

function aceify_remove_ver_css_js( $src ) {
	if(strpos($src, 'ver=' ) && get_site_env() == 'production'){
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'aceify_remove_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'aceify_remove_ver_css_js', 9999 );

/* ---------------------------------------------
Google Analytics
--------------------------------------------- */

if(!empty($ga_account)){
	function google_analytics(){ 
		global $ga_account;
	?> 
		<!-- Begin GA Tag -->
		<script type="text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', '<?php echo $ga_account; ?>', 'auto');	 // Replace with your property ID.
		ga('send', 'pageview');
		</script>
		<!-- End GA Tag -->
	<?php }
	add_action( 'wp_head', 'google_analytics' );
}

/* ---------------------------------------------
Admin favicon
--------------------------------------------- */

function favicon(){
	echo '<link rel="shortcut icon" href="'. gsdu() .'/img/favicon.ico?v=1" />',"\n";
}
add_action('admin_head','favicon');
add_action('login_head','favicon');

/* ---------------------------------------------
Hide comment interfaces in admin
--------------------------------------------- */

function hide_admin_comments(){
	echo '<style>#wp-admin-bar-comments {display: none !important;}#latest-comments.activity-block {display: none !important;}</style>',"\n";
}
add_action('admin_head','hide_admin_comments');

function hide_page_comments(){
	echo '<script>jQuery("th.column-comments, td.column-comments").html("");</script>',"\n";
}
add_action('admin_footer','hide_page_comments');

/* ---------------------------------------------
Featured Image size note
--------------------------------------------- */

function featured_image_instructions(){
	$output = '';
	$output .= '<script type="text/javascript">';
	
		//$output .= 'jQuery("#postimagediv .inside").append("<p>(1600x620 for Content Landing Pages. 640x320 for press releases and posts.)</p>");';
		
		$output .= 'jQuery("#postimagediv .inside").append("<p>(1600x492 for Content Landing Pages. 640x320 for press releases and posts.)</p>");';
	
	$output .= '</script>';
	echo $output;
}
//add_action('admin_footer','featured_image_instructions');

/* ---------------------------------------------
Reformat default "read more" tag associated with the_excerpt()
--------------------------------------------- */

function replace_excerpt($content) {
	return str_replace('[&hellip;]','...',$content);
}
add_filter('the_excerpt', 'replace_excerpt');

/* ---------------------------------------------
Change length of excerpt returned with the_excerpt()
--------------------------------------------- */
function custom_excerpt_length( $length ) {
	$length = 30;
	return $length;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//excerpt length character limit
function get_the_trimmed_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = sanitize_text_field($excerpt);
	if(strlen($excerpt)>=80){
		$excerpt = substr($excerpt, 0, 80);
		$excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
		$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
		$excerpt = $excerpt.'&hellip; ';
	}
	return $excerpt;
}

/* ---------------------------------------------
Different posts per page on blog home vs archive & search
--------------------------------------------- */

function aceify_custom_posts_per_page($query) {
	if (is_home()) {
		$query->set('posts_per_page', 5);
	}
}  
add_action('pre_get_posts', 'aceify_custom_posts_per_page');

/* ---------------------------------------------
Return truncated Title
--------------------------------------------- */

//excerpt length character limit
function get_the_trimmed_title(){
	$title = get_the_title();
	$title = clean_string($title);
	if(strlen($title)<=40){
		return $title;
	} else {
		$title = substr($title, 0, 40);
		$title = substr($title, 0, strripos($title, ' '));
		$title = trim(preg_replace( '/\s+/', ' ', $title));
		$title = $title.'&hellip; ';
		return $title;
	}
}

function clean_string($string){
	// Strip HTML Tags
	$string = strip_tags($string);
	// Clean up things like &amp;
	$string = html_entity_decode($string, ENT_QUOTES, 'UTF-8');
	// Strip out any url-encoded stuff
	$string = urldecode($string);
	// Replace non-AlNum characters with space
	$string = preg_replace('/[^A-Za-z0-9]/', ' ', $string);
	// Replace Multiple spaces with single space
	$string = preg_replace('/ +/', ' ', $string);
	// Trim the string of leading/trailing space
	$string = trim($string);
	return $string;
}

/* ---------------------------------------------
Page Slug Body Class
--------------------------------------------- */

function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/* ------------------------------------------------------

IF USING THE ACIFY PLUGIN, REMOVE THE FOLLOWING FUNCTIONS

------------------------------------------------------ */

//remove admin areas
function remove_menus(){
//	remove_menu_page( 'index.php' ); //Hide Dashboard
//	remove_menu_page( 'edit.php' ); //Hide Posts
	remove_menu_page( 'link-manager.php' ); //Hide Link Manager
//	remove_menu_page( 'upload.php' ); //Hide Media
//	remove_menu_page( 'edit.php?post_type=page' ); //Hide Pages
	remove_menu_page( 'edit-comments.php' ); //Hide Comments
//	remove_menu_page( 'themes.php' ); //Hide Appearance
//	remove_menu_page( 'plugins.php' ); //Hide Plugins
//	remove_menu_page( 'users.php' ); //Hide Users
//	remove_menu_page( 'tools.php' ); //Hide Tools
//	remove_menu_page( 'options-general.php' ); //Hide Settings
	global $submenu;
	unset($submenu['themes.php'][6]); // Customize
}
add_action( 'admin_menu', 'remove_menus' );

//remove unwanted wordpress <head> tags
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head','feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link'); //Edit URI Link (xmlrpc)
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

//remove widget css ouput from header
add_action( 'widgets_init', 'my_remove_recent_comments_style' );
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'	 ) );
}

//remove emoji support
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//disable admin bar on front end
//add_filter('show_admin_bar', '__return_false');

//custom login page styles
function aceify_login_style() { ?>

	<style type="text/css">
		body.login {
			background: #F1FCFD;
		}
		body.login div#login {
			padding-top: 2%;
		}
		body.login div#login h1 a {
			display: none;
		}
		body.login div#login h1{
			background: url("<?php echo gsdu(); ?>/img/login-logo.png") center no-repeat;
			width: 100%;
			height: 160px;
		}
		.login form {
			
		}
	</style>
	
<?php 
}
add_action( 'login_enqueue_scripts', 'aceify_login_style' );

//remove admin menu toolbars
function aceify_remove_toolbar_items( $bar ){
	$bar->remove_node( 'new-media' ); // +New
	//$bar->remove_node( 'wp-logo' ); // wp Logo
	$bar->remove_node( 'new-content' );
	$bar->remove_node( 'about' );
	$bar->remove_node( 'wporg' );
	$bar->remove_node( 'wp-logo-external' );
}
add_action( 'admin_bar_menu', 'aceify_remove_toolbar_items', PHP_INT_MAX -1 );

//change admin logo (top left)
function aceify_add_admin_logo_node( $wp_admin_bar ){
	//print_r($wp_admin_bar);
	$node_args = array(
		'id' => 'wp-logo',
		'title' => '<img src="'.gsdu().'/img/icon-white.png" alt="" style="width: 16px; height: auto; margin-top: 9px;" />',
		'href' => ''
	);
	$wp_admin_bar->add_node( $node_args );
}
add_action( 'admin_bar_menu', 'aceify_add_admin_logo_node', 9999 );

//hide admin footer
function aceify_remove_footer_admin () {
	echo '';
}
add_filter('admin_footer_text', 'aceify_remove_footer_admin');

//deactivate dashboard widgets
function aceify_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_welcome']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
add_action('wp_dashboard_setup', 'aceify_remove_dashboard_widgets' );

?>