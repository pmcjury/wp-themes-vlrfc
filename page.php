<?php
/**
 * @package VLRFC
 * @subpackage 
 */

get_header(); ?>

	<div id="content_container">
		<div id="content_main">
			<div id="content_main_inner">
			<?php $postCount = 0; ?>
			<?php if (have_posts()) : ?>
			
				<?php while (have_posts()) : the_post(); ?>
				
					<?php	
                                            $h1_css =  (($postCount == 0) ? "no_topmargin" : "" );
                                            $alt_headline = get_post_meta($post->ID, "alt_headline_title", true);
                                            $alt_author = get_post_meta($post->ID, "alt_author_name", true);
                                            
                                            ?>
                            <h1 class="<?php echo $h1_css; ?>" id="post-<?php the_ID(); ?>" ><a href="<?php the_permalink(); ?>" style="color:#fff;"><?php empty($alt_headline) ? the_title() : print($alt_headline); ?></a><br/><small style="color:#e0e0e0; font-size: 11px; font-weight: normal; text-transform: lowercase;">Posted on <?php the_modified_date( 'l F jS, Y \@ h:i:s a' ); ?><?php echo !empty($alt_author) ? " by ".$alt_author : ""; ?></small></h1>
					
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
				<?php $postCount++;	?>
				<?php endwhile; ?>
			
			<?php endif; ?>
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</div> <!-- end of div#content_main_inner -->			        	
		</div> <!-- end of div#content_main -->

<?php get_sidebar(); ?>

<?php get_footer(); 