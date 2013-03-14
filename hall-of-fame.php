<?php
/**
/* Template Name: Hall Of Fame Template
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
					<span class='bold'>				
					<?php 
						the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 
					?>
					</span>
					<?php	
						$postCount++;
					endwhile; 
				endif; 
				$catName = '';
				if( is_page( 'hall-of-fame' ) ) { // a Pint With
					$catName = 'hall-of-fame';
				}
				$showPostsCount = -1;
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$queryParams = 'category_name=' . $catName . '&showposts=' . $showPostsCount . '&paged=' . $paged ;
				query_posts( $queryParams );
				if (have_posts()) : 
					$postCount = 0;
					$yearHeaderShown = false;
					$prevDate = '';
					$theDate = '';
					while (have_posts()) : 
						the_post(); 	
						$theDate = the_date('Y', '', '', false);
						
						if( $theDate != $prevDate ) :			
							$h1_css =  (($postCount == 0) ? "no_topmargin" : "" );
							$alt_headline = get_post_meta($post->ID, "alt_headline_title", true);
							?>
							<h1 class="<?php echo $h1_css; ?>" id="hof-post-years-<?php echo $theDate; ?>" ><?php echo $theDate; ?></h1>
						<?php endif; ?>
							<ul>
								<li>
									<a href="<?php the_permalink(); ?>"	><?php the_title(); ?></a>	
								</li>
							<ul>
					<?php 
						$prevDate = $theDate;
						$postCount++;
					endwhile; 
				endif; 
			?>
			</div> <!-- end of div#content_main_inner -->			        	
		</div> <!-- end of div#content_main -->
<?php 
get_sidebar();
get_footer(); 