<?php
/**
/* Template Name: Category Page Template
 * @package VLRFC
 * @subpackage 
 */
get_header(); ?>
	<div id="content_container">
            <div id="content_main">
                    <div id="content_main_inner">
                    <?php pmc_page_of_posts() ; ?>
                    </div> <!-- end of div#content_main_inner -->
            </div> <!-- end of div#content_main -->
<?php get_sidebar(); ?>
<?php get_footer(); 