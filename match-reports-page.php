<?php
/**
/* Template Name: Match Reports Template
 * @package VLRFC
 * @subpackage 
 */

get_header(); ?>

	<div id="content_container">
		<div id="content_main">
			<div id="content_main_inner">
			
				<?php 
					//$catId = get_post_meta($post->ID, "alt_headline_title", true);
					$catId = '';
					if( is_page( '11' ) ) {
						$catId = '10';
					}
					if( is_page( '25' ) ) {
						$catId = '13';
					}
					if( is_page( '45' ) ) {
						$catId = '8';
					}
					require_once( 'posts-inc.php' );
				?>
			</div> <!-- end of div#content_main_inner -->			        	
		</div> <!-- end of div#content_main -->

<?php get_sidebar(); ?>

<?php get_footer(); 