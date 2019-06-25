<?php
/**
 * Plugin Name: Auto Alt text on upload
 * Plugin URI: http://designous.gr
 * Description: Add Alt Text on every image upload. Made by the creative team of DESIGNOUS | Creative Agency
 * Author: DESIGNOUS
 * Author URI: http://designous.gr
 * Version: 0.1.0
 */

add_action( 'add_attachment', 'designous_set_image_meta_on_upload' );
function designous_set_image_meta_on_upload( $post_ID ) {


	if ( wp_attachment_is_image( $post_ID ) ) {

		$my_image_title = get_post( $post_ID )->post_title;

		
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );
        
		$my_image_title = ucwords( strtolower( $my_image_title ) );

		$my_image_meta = array(
			'ID'		=> $post_ID,			// (ID)
			'post_title'	=> $my_image_title,		//  (Image Title)
			'post_content'	=> $my_image_title,		// (Content)
		);
        
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

		wp_update_post( $my_image_meta );

	} 
}
// ---------------- END ----------------- //

?>