<?php
/**
/* Template Name: Awards Template
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
				$catName = '';
				if( is_page( 'awards' ) ) { // a Pint With
					$catName = 'awards';
				}
				$showPostsCount = 1;
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$queryParams = 'category_name=' . $catName . '&showposts=' . $showPostsCount . '&paged=' . $paged ;
				query_posts( $queryParams );
				if (have_posts()) : 
					$postCount = 0;
					while (have_posts()) : 
						the_post(); 			
						$h1_css =  (($postCount == 0) ? "no_topmargin" : "" );
						$alt_headline = get_post_meta($post->ID, "alt_headline_title", true);
						?>
						<h1 class="<?php echo $h1_css; ?>" id="post-<?php the_ID(); ?>" ><?php empty($alt_headline) ? the_title() : print($alt_headline); ?></h1>
						<?php 
						the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 	
						$postCount++;
					endwhile; 
					?> <br/> <?php
					$newerPostText = 'Next Award Year &raquo;';
					$olderPostText = '&laquo; Previous Award Year';
					include( 'paged-navigation-inc.php' );
				endif; 
			?>
			</div> <!-- end of div#content_main_inner -->			        	
		</div> <!-- end of div#content_main -->
<?php 
get_sidebar();
get_footer(); 