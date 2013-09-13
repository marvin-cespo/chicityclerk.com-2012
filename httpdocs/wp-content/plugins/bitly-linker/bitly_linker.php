<?php
	/* 
	 Plugin Name: Bit.ly linker
	 Plugin URI: http://isitablog.co.uk/bitly_linker
	 Description: Plugin for automatically creating Bit.ly links from blog posts
	 Author: Andy Gaukrodger
	 Version: 1.1
	 Author URI: http://isitablog.co.uk
	 */

function bitly_admin()
{
	include ('bitly_import.php');
}

//Bit.ly plugin code
function bitly()
{
	global $post;
	if (get_option('permalink_structure') != '') {
		$url = get_permalink() . '?';
	} else {
		$url = get_bloginfo('url') . '/?p=' . $post->ID . '&';
	}
	$source = get_option('bitly_source');
	$medium = get_option('bitly_medium');
	$campaign = get_option('bitly_campaign');
	$analytics = $url . 'utm_source=' . $source . '&utm_medium=' . $medium . '&utm_campaign=' . $campaign;
	$login = get_option('bitly_user');
	$apikey = get_option('bitly_apikey');
	$format = 'json';
	$version = '2.0.1';
	
	$bitly = 'http://api.bit.ly/shorten?version=' . $version . '&longUrl=' . urlencode($analytics) . '&login=' . $login . '&apiKey=' . $apikey . '&format=' . $format;
	$response = file_get_contents($bitly);
	if (strtolower($format) == 'json') {
		$json = @json_decode($response, true);
		$bitly = $json['results'][$analytics]['shortUrl'];
		print '<a href="' . $bitly . '">' . $bitly . '</a>';
	} else {
		$xml = simplexml_load_string($response);
		echo 'http://bit.ly' . $xml->results->nodeKeyVal->hash;
	}
}
function bitly_admin_action() //Add Admin page
{
	add_options_page('Bitly Linker Settings', 'Bitly Linker Settings', 1, 'bitly_admin', 'bitly_admin');
}
	add_action('admin_menu', 'bitly_admin_action');
function insertBitly($content) //Insert bit.ly function at end of content
{
	$content .= bitly();
	return $content;
}
//	add_filter('the_content', 'insertBitly');
//Widget Code
function widgetText() //Create the Widget text
{
	if (is_home() || is_page()) {
		print 'Click on a post to get your bit.ly shortcode.';
	} else {
		print '<span style="font-weight:600; font-size:12px;">';
		bitly();
		print '</span>';
		print '<br /><br />';
		print '<span style="font-weight:100; font-size:9px;">';
		include ('bitly_inc.php');
		print '</span>';
	}
}	
function widgetAdd($args) //Activate Widget
{
	extract($args);
	print $before_widget;
	print $before_title;
	print '<h2 class="widgettitle"><a href="http://isitablog.co.uk">bit.ly Linker</a>:</h2>';
	widgetText();
	print $after_title;
	print $after_widget;
}
function widgetAdd_init() //Initial Widget
{
	register_sidebar_widget(__('bit.ly Linker'), 'widgetAdd');
}

	add_action('plugins_loaded', 'widgetAdd_init');
function custom_bitly_box()
{
	add_meta_box( 
        'custom_bitly_link',
        __( 'Bit.ly Linker', 'custom_bitly_link' ),
        'custom_bitly_box_content',
        'post',
        'side',
        'high'
    );
}
function custom_bitly_box_content()
{
	global $post;
	if ($post->post_type == 'post' && $post->post_status == 'publish') {
		print 'Your bit.ly Link is: ';
		bitly();
	} else {
		print 'Save Post to create bit.ly link';
	}
}
	add_action('admin_init', 'custom_bitly_box', 1);
?>