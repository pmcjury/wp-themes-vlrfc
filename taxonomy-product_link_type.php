<?php
/**
 * @package VLRFC
 * @subpackage
 */

get_header(); ?>

	<div id="content_container">
		<div id="content_main_full">
                        <h1>VLRFC Store</h1>
                        <?php $postCount = 0; ?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); $product_link_url = get_post_meta( $post->ID, "product_link_url", true ); ?>
                                    <div style="width:48%; float:left; margin: 0 5px 15px 5px; border-bottom: 1px solid #999; padding-bottom: 5px;">
					<h3 class="<?php echo $h1_css; ?>" id="post-<?php the_ID(); ?>" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <a href="<?php the_permalink(); ?>">
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                                        </a>
                                        <div class="clear"></div>
                                  
                                        <p>
                                        <?php the_terms($post->ID, 'product_link_type', 'Payment type: ', ', ', ''); ?>
                                        <br/>
                                        <a href="<?php echo $product_link_url; ?>" title="Click for Payment" target="_blank">Click here to make a payment &#0187;</a>
                                        </p>
                                        <?php //edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
                                    </div>
				<?php $postCount++;	?>
				<?php endwhile; ?>
                                <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<?php endif; ?>
                        <div class="clear"></div>
		</div> <!-- end of div#content_main -->
                <div class="clear"></div>
<?php get_footer();