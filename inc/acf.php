<?php

//remove ACF interfaces in WP Admin
if(get_site_env() == 'production') {
    define( 'ACF_LITE', true );
}

//setup options pages
if (function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'title' => 'Site Options',
        'capability' => 'manage_options'
    ));
}

?>