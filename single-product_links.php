<?php
/**
 * @package VLRFC
 * @subpackage 
 */

get_header(); ?>

	<div id="content_container">
		<div id="content_main_full">
			<div>
			<?php $postCount = 0; ?>
			<?php if (have_posts()) : ?>
			
				<?php while (have_posts()) : the_post(); ?>
				
					<?php
						
						$h1_css =  (($postCount == 0) ? "no_topmargin" : "" );
						$product_link_url = get_post_meta( $post->ID, "product_link_url", true );
					?>
				
					<h2 class="<?php echo $h1_css; ?>" id="post-<?php the_ID(); ?>" ><?php the_title(); ?></h2>
                                        <p>
                                            <?php //the_pmc_thumbnail(); ?>
                                            <?php the_content(); ?>
                                        </p>
                                        <div class="clear"></div>
                                        <p>
                                        <a href="<?php echo $product_link_url; ?>" title="Click for Payment" target="_blank">Click here to make a payment &#0187;</a>
                                        </p>
                                        <p>
                                        <?php the_terms($post->ID, 'product_link_type', 'All Payment Types: ', ', ', ''); ?>
                                        </p>
                                        <div class="clear"></div>
                                        <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
				<?php $postCount++;	?>
				<?php endwhile; ?>
                                <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<?php endif; ?>
			</div> <!-- end of div#content_main_inner -->			        	
		</div> <!-- end of div#content_main -->

<?php get_footer(); 