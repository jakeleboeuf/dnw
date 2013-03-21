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
require_once('library/custom-post-type.php'); // you can disable this if you like
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

//require_once('library/plugins/plugin-includer/plugin-includer.php');/**





/************* Jake's Theme stuff *************/
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
      'id'        => 'dnw_url',
      'name'      => 'dnw_url',
      'desc'      => ' youraccount.us5.list-manage.com/',
      'std'       => '',
      'label_for' => 'dnw_url',
      'class'     => 'css_class',
			'dnw_form_url' => '&nbsp;&nbsp;<a href="http://kb.mailchimp.com/article/where-do-i-find-the-link-for-my-sign-up-form" target="_blank">Learn more here</a>'
    	);
    add_settings_field( 'dnw_url', 'Mailchimp Form URL', 'dnw_display_setting', 'dnw_theme_options.php', 'dnw_text_section', $field_args );
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
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
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
