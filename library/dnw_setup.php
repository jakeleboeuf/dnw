<?php
// Grab that dummy stuffs
	
	// Create post object
	$post = array(
	  'post_title'    => 'My post',
	  'post_content'  => 'This is my post.',
	  'post_status'   => 'publish',
	  'post_author'   => 1,
	  'post_category' => array(8,39)
	);


	$post_id = wp_insert_post( $post, $wp_error );
	//now you can use $post_id within add_post_meta or update_post_meta
	
	$defaults = array(
  'post_status'           => 'draft', 
  'post_type'             => 'post',
  'post_author'           => $user_ID,
  'ping_status'           => get_option('default_ping_status'), 
  'post_parent'           => 0,
  'menu_order'            => 0,
  'to_ping'               =>  '',
  'pinged'                => '',
  'post_password'         => '',
  'guid'                  => '',
  'post_content_filtered' => '',
  'post_excerpt'          => '',
  'import_id'             => 0
);