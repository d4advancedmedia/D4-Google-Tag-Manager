<?php
/*
	Plugin Name: D4 Google Tag Manager
	Plugin URI: https://github.com/d4advancedmedia/D4-Google-Tag-Manager
	GitHub Theme URI: https://github.com/d4advancedmedia/D4-Google-Tag-Manager
	GitHub Branch: master
	Description: Simple WordPress plugin to paste in Analytics code and hook it into the footer
	Version: 2017-01-23a
	Author: D4 Adv. Media
*/

$gtmcode = '';


function googletagmanager_head () {

	global $gtmcode;

	if ( !empty($gtmcode) ) {
		$output = "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','{$gtmcode}');</script>";
	} else {
		return;
	}

	echo $output;

} add_action( 'wp_head', 'googletagmanager_head');

function googletagmanager_footer () {

	global $gtmcode;

	if ( !empty($gtmcode) ) {
		$output = '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id='. $gtmcode .'" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>"';
	} else {
		return;
	}

	echo $output;
	
} add_action( 'wp_footer', 'googletagmanager_footer');


?>
