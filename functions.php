<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
//require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default


/************* INSTALL NEEDED PLUGINS *************/

// Jake - Note to self: This needs to be worked on
require_once('library/plugins/plugin-includer/plugin-includer.php');




/************* Jake's Theme stuff *************/
// Check for Updates
require_once('theme/update.php');

// Check for theme updates:
include("update_notifier.php");

/**
 * Callback function to the add_theme_page
 * Will display the theme options page
 */
function dnw_theme_page()
{
?>
<div class="section panel">
<h1>Custom Theme Options</h1>
<form method="post" enctype="multipart/form-data" action="options.php">
        <?php
          settings_fields('dnw_theme_options'); 
          do_settings_sections('dnw_theme_options.php');
        ?>
<p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            
</form>
</div>
    <?php
}

/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'dnw_register_settings' );
/**
 * Function to register the settings
 */
function dnw_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'dnw_theme_options', 'dnw_theme_options', 'dnw_validate_settings' );
    // Add settings section
    add_settings_section( 'dnw_text_section', 'Home Page Content', 'dnw_display_section', 'dnw_theme_options.php' );
    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'dnw_dates',
      'name'      => 'dnw_dates',
      'desc'      => ' Example: 4 DATES',
      'std'       => '',
      'label_for' => 'dnw_dates',
      'class'     => 'css_class'
    	);
    add_settings_field( 'example_textbox', 'Number of Dates', 'dnw_display_setting', 'dnw_theme_options.php', 'dnw_text_section', $field_args );

		$field_args = array(
      'type'      => 'text',
      'id'        => 'dnw_weeks',
      'name'      => 'dnw_weeks',
      'desc'      => ' Example: 4 WEEKS',
      'std'       => '',
      'label_for' => 'dnw_weeks',
      'class'     => 'css_class'
    	);
    add_settings_field( 'dnw_weeksBox', 'Number of Weeks', 'dnw_display_setting', 'dnw_theme_options.php', 'dnw_text_section', $field_args );

		$field_args = array(
      'type'      => 'text',
      'id'        => 'dnw_mc',
      'name'      => 'dnw_mc',
      'desc'      => 'http://datenightdenver.us5.list-manage.com/subscribe/post',
      'std'       => '',
      'label_for' => 'dnw_mc',
      'class'     => 'css_class',
			'dnw_form_url' => '&nbsp;&nbsp;<a href="http://www.datenightlabs.com/how-to-center/adding-mailchimp-form-to-your-site.html" target="_blank">Learn more here</a>'
    	);
    add_settings_field( 'dnw_mc', 'Mailchimp Form Action', 'dnw_display_setting', 'dnw_theme_options.php', 'dnw_text_section', $field_args );


		$field_args = array(
      'type'      => 'text',
      'id'        => 'dnw_url',
      'name'      => 'dnw_url',
      'desc'      => 'b6276d88b79fa6d75e99f2ba6',
      'std'       => '',
      'label_for' => 'dnw_url',
      'class'     => 'css_class',
			'dnw_form_url' => '&nbsp;&nbsp;<a href="http://www.datenightlabs.com/how-to-center/adding-mailchimp-form-to-your-site.html" target="_blank">Learn more here</a>'
    	);
    add_settings_field( 'dnw_url', 'Mailchimp Form U', 'dnw_display_setting', 'dnw_theme_options.php', 'dnw_text_section', $field_args );


		$field_args = array(
      'type'      => 'text',
      'id'        => 'dnw_id',
      'name'      => 'dnw_id',
      'desc'      => '4f4348f437',
      'std'       => '',
      'label_for' => 'dnw_id',
      'class'     => 'css_class',
			'dnw_form_url' => '&nbsp;&nbsp;<a href="http://www.datenightlabs.com/how-to-center/adding-mailchimp-form-to-your-site.html" target="_blank">Learn more here</a>'
    	);
    add_settings_field( 'dnw_id', 'Mailchimp Form ID', 'dnw_display_setting', 'dnw_theme_options.php', 'dnw_text_section', $field_args );

		$field_args = array(
      'type'      => 'text',
      'id'        => 'dnw_fb',
      'name'      => 'dnw_fb',
      'desc'      => 'facebook.com/YOURPAGE',
      'std'       => '',
      'label_for' => 'dnw_fb',
      'class'     => 'css_class'
    	);
    add_settings_field( 'dnw_fb', 'Your Facebook URL', 'dnw_display_setting', 'dnw_theme_options.php', 'dnw_text_section', $field_args );

		$field_args = array(
      'type'      => 'text',
      'id'        => 'dnw_tw',
      'name'      => 'dnw_tw',
      'desc'      => 'twitter.com/YOURPAGE',
      'std'       => '',
      'label_for' => 'dnw_tw',
      'class'     => 'css_class'
    	);
    add_settings_field( 'dnw_tw', 'Your Twitter Username', 'dnw_display_setting', 'dnw_theme_options.php', 'dnw_text_section', $field_args );


		$field_args = array(
      'type'      => 'text',
      'id'        => 'dnw_app',
      'name'      => 'dnw_app',
      'desc'      => 'gloo.us/join/YOURAPP',
      'std'       => '',
      'label_for' => 'dnw_app',
      'class'     => 'css_class',
			'dnw_form_url' => '&nbsp;&nbsp;<a href="http://www.datenightlabs.com/how-to-center/your-app-link.html" target="_blank">Learn more here</a>'
    	);
    add_settings_field( 'dnw_app', 'Your gloo App Donwload Link', 'dnw_display_setting', 'dnw_theme_options.php', 'dnw_text_section', $field_args );
}

/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function dnw_display_setting($args)
{
    extract( $args );
    $option_name = 'dnw_theme_options';
    $options = get_option( $option_name );
    switch ( $type ) {
          case 'text':
              $options[$id] = stripslashes($options[$id]);
              $options[$id] = esc_attr( $options[$id]);
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' placeholder='$desc' />";
							echo "$dnw_form_url";
          break;
    }
}

/**
 * Callback function to the register_settings function will pass through an input variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */
function dnw_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    // Check the input is a letter or a number
    if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
      //$newinput[$k] = '';
    }
  }
  return $newinput;
}

/**
 * Function to add extra text to display on each section
 */
function dnw_display_section($section){ 
}

// Add the section to the theme
function dnw_theme_menu()
{
  add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'dnw_theme_options.php', 'dnw_theme_page');
}
add_action('admin_menu', 'dnw_theme_menu');


function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

/************* LOADING STUFF *************/
// Install starter content


/** Custom folder location for image uploads. */
define( 'UPLOADS', '/wp-content/themes/dnw/library/img' );

// Custom Menus
// Turn off all error reporting
error_reporting(0);


$check = get_option('theme_name_activation_check');
$checker = get_option('theme_name_activation_checker');
if ( is_admin() && isset($_GET['activated'] ) && $check != "loadedOnce") {
    // do something
			$loaded = true;
			
			function create_my_cat () {
  			if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
	        require_once (ABSPATH.'/wp-admin/includes/taxonomy.php'); 
	        if ( ! get_cat_ID( 'Date Nigt Deals' ) ) {
            wp_create_category( 'Date Night Deals' );
	        }
					if ( ! get_cat_ID( 'Feature Slider' ) ) {
            wp_create_category( 'Feature Slider' );
	        } 
					if ( ! get_cat_ID( 'Date Nigt Events' ) ) {
            wp_create_category( 'Date Night Events' );
	        }
		    }
			}
			add_action ( 'after_setup_theme', 'create_my_cat' );
	  	add_option('theme_name_activation_check', "loadedOnce");
		} 
		
		if (is_admin() && $checker != "loaded"){
			runInit();
		}
function runInit() {
			//require_once(get_template_directory_uri() . 'library/dnw_setup.php');
				// Create post object
				$category_ID = get_category_id('Feature Slider');
				$post = array(
				  'post_title'    => 'Learn to Fight Fair with the One You Love.',
				  'post_content'  => '“Fight Night,” is an event designed to address relationship issues with a wildly funny and engaging twist...The speakers, married relationship therapists Drs. Les and Leslie Parrott, pretend to “Duke-it-out” while sharing how-to’s for healthy conflict resolution. The Parrotts have been guests on Oprah, The View, The Early Show, CNN and other nationally syndicated TV and radio programs. Join us March 7, 2013 for this Ultimate Date. Get your tickets now through <a href="http://itickets.com">iTickets.com</a> Event is March 7, 2013.',
				  'post_status'   => 'publish',
				  'post_author'   => 1,
				  'post_category' => array($category_ID)
				);
				$post_id = wp_insert_post( $post );
				
				// Add Featured Image
				$filename = 'slide_03.png';
			  $wp_filetype = wp_check_filetype(basename($filename), null );
			  $wp_upload_dir = wp_upload_dir();
			  $attachment = array(
			     'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ), 
			     'post_mime_type' => $wp_filetype['type'],
			     'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
			     'post_content' => '',
			     'post_status' => 'inherit'
			  );
			  $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			  // you must first include the image.php file
			  // for the function wp_generate_attachment_metadata() to work
			  require_once(ABSPATH . 'wp-admin/includes/image.php');
			  $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
			  wp_update_attachment_metadata( $attach_id, $attach_data );
				set_post_thumbnail( $post_id, $attach_id );

				
				$category_ID = get_category_id('Date Night Deals');
				$post = array(
				  'post_title'    => 'BOGO at Wild Side',
				  'post_content'  => 'Bingo Bango! This is an example of a deal. Grab the deal at <a href="http://wildsidebbq.com" target="_blank">wilsidebbq.com</a>',
				  'post_status'   => 'publish',
				  'post_author'   => 1,
				  'post_category' => array($category_ID)
				);
				$post_id = wp_insert_post( $post );
				
				
				$category_ID = get_category_id('Date Night Events');
				$category_ID2 = get_category_id('Feature Slider');
				$post = array(
				  'post_title'    => 'FlashMob at The Denver Space Museum!',
				  'post_content'  => 'http://vimeo.com/35173889<br/>Bingo Bango! This is an example of an Event. Here are the details<br/><br/><ul><li>When: Saturday, May 4th</li><li>Where: 1423 Museum Drive, Denver, CO 584298</li></ul>',
				  'post_status'   => 'draft',
				  'post_author'   => 1,
				  'post_category' => array($category_ID, $category_ID2)
				);
				$post_id = wp_insert_post( $post );
				
				// Add Featured Image
				$filename = 'video_01.png';
			  $wp_filetype = wp_check_filetype(basename($filename), null );
			  $wp_upload_dir = wp_upload_dir();
			  $attachment = array(
			     'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ), 
			     'post_mime_type' => $wp_filetype['type'],
			     'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
			     'post_content' => '',
			     'post_status' => 'inherit'
			  );
			  $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			  // you must first include the image.php file
			  // for the function wp_generate_attachment_metadata() to work
			  require_once(ABSPATH . 'wp-admin/includes/image.php');
			  $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
			  wp_update_attachment_metadata( $attach_id, $attach_data );
				set_post_thumbnail( $post_id, $attach_id );
				
				
				
				$category_ID = get_category_id('Feature Slider');
				$post = array(
				  'post_title'    => 'USA TODAY:',
				  'post_content'  => '<em>“The Results Are In! People who have "couple time" at least weekly were 3.5 times more likely to report being "very happy" in their relationship.”</em><br/>Learn more at <a href="http://www.usatoday.com/news/health/wellness/marriage/story/2012-02-06/Date-night-can-improve-marriage-sexual-satisfaction/52994442/1">USA TODAY</a>.',
				  'post_status'   => 'publish',
				  'post_author'   => 1,
				  'post_category' => array($category_ID)
				);
				$post_id = wp_insert_post( $post );
				
				// Add Featured Image
				$filename = 'usa_today.jpeg';
			  $wp_filetype = wp_check_filetype(basename($filename), null );
			  $wp_upload_dir = wp_upload_dir();
			  $attachment = array(
			     'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ), 
			     'post_mime_type' => $wp_filetype['type'],
			     'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
			     'post_content' => '',
			     'post_status' => 'inherit'
			  );
			  $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
			  // you must first include the image.php file
			  // for the function wp_generate_attachment_metadata() to work
			  require_once(ABSPATH . 'wp-admin/includes/image.php');
			  $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
			  wp_update_attachment_metadata( $attach_id, $attach_data );
				set_post_thumbnail( $post_id, $attach_id );
				
				
				$post = array(
				  'post_title'    => 'Home Page',
				  'post_content'  => '[callout title="WHAT IS"]DATE NIGHT PDX[/callout]<br/>[dnw_slide]',
				  'post_status'   => 'publish',
				  'post_type'    => 'page',
				  'post_author'   => 1
				);
				$post_id = wp_insert_post( $post );
				update_post_meta($post_id, "_wp_page_template", "page-home.php");
				
				
				$post = array(
				  'post_title'    => 'Couples Checkup',
				  'post_content'  => '[iframe]https://www.couplecheckup.com/launch/go_nwfs.html[/iframe]',
				  'post_status'   => 'publish',
				  'post_type'    => 'page',
				  'post_author'   => 1
				);
				$post_id = wp_insert_post( $post );
				update_post_meta($post_id, "_wp_page_template", "page-iframe.php");
				
				
				$post = array(
				  'post_title'    => 'Date Night Retailers',
				  'post_content'  => '[iframe width="650"]http://datenightpdx.wufoo.com/forms/date-night-pdx-inquiry/[/iframe]',
				  'post_status'   => 'publish',
				  'post_type'    => 'page',
				  'post_author'   => 1
				);
				$post_id = wp_insert_post( $post );
				update_post_meta($post_id, "_wp_page_template", "page-iframe.php");
				
				
				$post = array(
				  'post_title'    => 'Date Night Deals',
				  'post_content'  => 'This is where we can put all the date night deals. This will be a the page that lists out all the blogs. Do not put any content here, because it will not show up.<br/><br/><span style="color: #ff0000;"><strong>MAKE SURE DATE NIGHT DEALS TEMPLATE IS SELECTED -->></strong></span>',
				  'post_status'   => 'publish',
				  'post_type'    => 'page',
				  'post_author'   => 1
				);
				$post_id = wp_insert_post( $post );
				update_post_meta($post_id, "_wp_page_template", "page-deals.php");
				
				
				$post = array(
				  'post_title'    => 'Date Night Events',
				  'post_content'  => 'This is where we pull in all the Date Night Events Posts. Do not put any content here, because it will not show up.<br/><br/><span style="color: #ff0000;"><strong>MAKE SURE DATE NIGHT EVENTS TEMPLATE IS SELECTED -->></strong></span>',
				  'post_status'   => 'publish',
				  'post_type'    => 'page',
				  'post_author'   => 1
				);
				$post_id = wp_insert_post( $post );
				update_post_meta($post_id, "_wp_page_template", "page-events.php");
				
			
				$post = array(
				  'post_title'    => 'About Us',
				  'post_content'  => '<p>Research shows that couples who devote time to each other at least once a week are more likely to have higher levels of communication, sexual satisfaction and commitment. These results are fueling a dating movement nationwide that challenges couples to go on 3 dates in 3 weeks.<br/><br/>In the Denver area, from February 11, 2013 to March 7, 2023, it is “Date Night Month.” During which, couples can intentionally date one another and take workshops to learn more skills at www.marry-well.com. This is for the young, old, married and single; “Now, Go get your date on!”<br/><br/>The Date Night Denver month will conclude Thursday night, March 7, with “Fight Night.” An event designed to address relationship issues with a wildly funny and engaging twist...The speakers, married relationship therapists, Drs. Les and Leslie Parrott, pretend to “Duke-it-out.” Get your tickets through Itickets.com now!</p><h6>For more information, research/studies, press and video visit <a href="http://datenightdenver.com/">DateNightDenver.com</a>. Date Night Denver is a subsidiary of the 501 C3, <a href="http://www.myrelationshipcenter.org/Marry-Well" target="_blank">Center For Relationship Eduction</a>, and exists to encourage everyone to invest in their most-valued relationships for a healthier more thriving community.</h6>',
				  'post_status'   => 'publish',
				  'post_type'    => 'page',
				  'post_author'   => 1
				);
				$post_id = wp_insert_post( $post );
				update_post_meta($post_id, "_wp_page_template", "page-general.php");
				
				
				$post = array(
				  'post_title'    => 'Date Night App',
				  'post_content'  => '<h3>DOWNLOAD THE FREE DATE NIGHT APP AND “GET YOUR DATE ON!”</h3><p>Download our FREE Date Night App with lots of great things to do in our area: Date Night Conversations, Date Night Ideas, and some fun Date Night Couple’s Quizzes. Each of these elements are designed to keep you engaged in your relationship and help you "Get Your Date On!"</p><p>Download the FREE Date Night App and then join us at participating Date Night Locations and Events.</p><p>Available for <a href="http://itunes.apple.com/us/app/date-night-pdx/id547276386?ls=1&amp;mt=8">iPhone</a> and <a href="https://play.google.com/store/apps/details?id=com.gloo.dnc.pdx&amp;feature=more_from_developer#?t=W251bGwsMSwyLDEwMiwiY29tLmdsb28uZG5jLnBkeCJd">Android</a> now!</p>',
				  'post_status'   => 'publish',
				  'post_type'    => 'page',
				  'post_author'   => 1
				);
				$post_id = wp_insert_post( $post );
				update_post_meta($post_id, "_wp_page_template", "page-general.php");
				
				
				$post = array(
				  'post_title'    => 'Contact',
				  'post_content'  => '<h1>NEED HELP?</h1><p>The Center for Relationship Education<br/>8101 E Belleview Ave., Suite D-2<br/>Denver, CO 80237</p>&nbsp;<p>Telephone: (720) 488-8888<br/>Fax: (720) 214-2001</p><p>Email: <a href="mailto:Info@myrelationshipcenter.org">Info@myrelationshipcenter.org</a></p>',
				  'post_status'   => 'publish',
				  'post_type'    => 'page',
				  'post_author'   => 1
				);
				$post_id = wp_insert_post( $post );
				update_post_meta($post_id, "_wp_page_template", "page-general.php");
				
				
				$post = array(
				  'post_title'    => 'Legal',
				  'post_content'  => 'Put all your legal info in here',
				  'post_status'   => 'publish',
				  'post_type'    => 'page',
				  'post_author'   => 1
				);
				$post_id = wp_insert_post( $post );
				update_post_meta($post_id, "_wp_page_template", "page-general.php");
				
				/* 
				Solution for custom menu if there is time:
				
				$menuname = $lblg_themename . ' DNW Top Menu';
				$dnw_menulocation = 'dnw_tp_menu';
				// Does the menu exist already?
				$menu_exists = wp_get_nav_menu_object( $menuname );

				// If it doesn't exist, let's create it.
				if( !$menu_exists){
		    $menu_id = wp_create_nav_menu($menuname);

		    // Set up default BuddyPress links and add them to the menu.
		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Home'),
		        'menu-item-classes' => 'home',
		        'menu-item-url' => home_url( '/' ), 
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Activity'),
		        'menu-item-classes' => 'activity',
		        'menu-item-url' => home_url( '/activity/' ), 
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Members'),
		        'menu-item-classes' => 'members',
		        'menu-item-url' => home_url( '/members/' ), 
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Groups'),
		        'menu-item-classes' => 'groups',
		        'menu-item-url' => home_url( '/groups/' ), 
		        'menu-item-status' => 'publish'));

		    wp_update_nav_menu_item($menu_id, 0, array(
		        'menu-item-title' =>  __('Forums'),
		        'menu-item-classes' => 'forums',
		        'menu-item-url' => home_url( '/forums/' ), 
		        'menu-item-status' => 'publish'));

		    // Grab the theme locations and assign our newly-created menu
		    // to the BuddyPress menu location.
		    if( !has_nav_menu( $dnw_menulocation ) ){
		        $locations = get_theme_mod('nav_menu_locations');
		        $locations[$dnw_menulocation] = $menu_id;
		        set_theme_mod( 'nav_menu_locations', $locations );
		    }
				*/
				
				/*
				Uploading images and attaching them to template posts
 				$filename =  get_template_directory_uri() . "/library/img/slide_03.png";
				$wp_filetype = wp_check_filetype(basename($filename), null );
				$attachment = array(
				     'post_mime_type' => $wp_filetype['type'],
				     'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
				     'post_content' => '',
				     'post_status' => 'inherit'
				);

				$attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
				$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
				wp_update_attachment_metadata( $attach_id, $attach_data );
				set_post_thumbnail( $post_id, $attach_id );
				*/
				
	  // Add marker so it doesn't run in future
	  add_option('theme_name_activation_checker', "loaded");
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-dnw', 600, 330, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'bonestheme'),
		'description' => __('The first (primary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'bonestheme'),
		'description' => __('The second (secondary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/img/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'bonestheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'bonestheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'bonestheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','bonestheme').'" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
	</form>';
	return $form;
} // don't remove this bracket!


?>
