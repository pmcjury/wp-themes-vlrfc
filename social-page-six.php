<?php
/**
/* Template Name: Page Six Template
 * @package VLRFC
 * @subpackage 
 */

get_header(); ?>
	<div id="content_container">
		<div id="content_main">
			<div id="content_main_inner">
				<?php 
				if (have_posts()) : 
					$postCount = 0;
					while (have_posts()) : 
						the_post(); 						
					?>					
					<?php 
						the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 
	
						wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); 
	
						$postCount++;
					endwhile; 
				endif; 
				edit_post_link('Edit this entry.', '<p>', '</p>');			
				$catName = '';
				if( is_page( 'page-6' ) ) { // Page Six
					$catName = 'page-six';
				}
				$showPostsCount = 10;
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$queryParams = 'category_name=' . $catName . '&showposts=' . $showPostsCount . '&paged=' . $paged ;
				query_posts( $queryParams );
				if (have_posts()) : 
					$newerPostText = 'Newer Sightings &raquo;';
					$olderPostText = '&laquo; Older Sightings';
					include( 'paged-navigation-inc.php' );
					?>
					<br/><br/>
					<?php
					$postCount = 0;
					while (have_posts()) : 
						the_post(); 						
						$h1_css =  (($postCount == 0) ? "no_topmargin" : "" );
						$alt_headline = get_post_meta($post->ID, "alt_headline_title", true);
					?>
									
					<?php 
						the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 
	
						wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); 
						
						$postCount++;
					endwhile; 
					$newerPostText = 'Newer Sightings &raquo;';
					$olderPostText = '&laquo; Older Sightings';
					include( 'paged-navigation-inc.php' );
				endif; 
			?>
			</div> <!-- end of div#content_main_inner -->			        	
		</div> <!-- end of div#content_main -->
<?php 
get_sidebar();
get_footer(); 