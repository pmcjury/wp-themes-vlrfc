<?php
/**
 * @package VLRFC
 * @subpackage 
 */

get_header(); ?>

	<div id="content_container">
		<div id="content_main_full">
			<?php $postCount = 0; ?>
			<?php if (have_posts()) : ?>
			
				<?php while (have_posts()) : the_post(); ?>
				
					<?php
						
						$h1_css =  (($postCount == 0) ? 'no_topmargin' : '' );
						$alt_headline = get_post_meta($post->ID, 'alt_headline_title', true);
                                                $data = get_post_meta( $post->ID, 'schedule_games', true );
                                                $schedule = new ScheduleGameData( $data );
					?>
				
					<h1 class="<?php echo $h1_css; ?>" id="post-<?php the_ID(); ?>" ><?php empty($alt_headline) ? the_title() : print($alt_headline); ?></h1>

                                        <?php 
                                            switch( get_post_meta( $post->ID, 'schedule_display', true ) ){
                                                case 'list':
                                                    PmcSkedjoolHelper::display_schedule_as_list( $schedule );
                                                    break;
                                                case 'divs':
                                               	default :
                                                    PmcSkedjoolHelper::display_schedule_as_divs( $schedule );
                                                    break;
                                            }
                                            the_excerpt();
                                        ?>
					<?php //wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
				<?php $postCount++;	?>
				<?php endwhile; ?>
			
			<?php endif; ?>
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
						        	
		</div> <!-- end of div#content_main -->

<?php //get_sidebar(); ?>

<?php get_footer(); 