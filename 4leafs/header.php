<?php
/**
 * @package VLRFC
 * @subpackage
 */
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
	

        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

        <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/4leafs/favicon.ico" type="image/x-icon" />
        <link rel="SHORTCUT ICON" href="<?php bloginfo('stylesheet_directory'); ?>/4leafs/favicon.ico" type="image/x-icon" />
        <title><?php bloginfo('name'); ?> | 4 Leaf Fifteens <?php wp_title(' - ', true, 'left'); ?> </title>
        <link href="<?php bloginfo('stylesheet_directory'); ?>/css/global_reset.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php bloginfo('stylesheet_directory'); ?>/4leafs/style.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_enqueue_script('jquery'); ?>
        <?php wp_head(); ?>
        <script type="text/javascript">
            (function($){
                $(document).ready(function(){

                    $("#nav_main ul > li > ul").hide();
                    $("#nav_main ul > li:last-child a").addClass('last_link');
                    $("#nav_main ul > li > ul > li:last-child a").addClass('last_link_bottom');
                    $("#nav_main li").hover(
                        function(e){
                            $(this).find(":nth-child(2)").fadeIn('fast');
                            return false;
                        },
                        function(e){
                            $(this).find(":nth-child(2)").fadeOut('fast');
                        }
                    );
                });
            })(jQuery);
        </script>
		<!--[if IE]>
        <style type="text/css">
        #content_main{width:65%}
        #sidebar{width:24.9%}
        </style>
        <![endif]-->
    </head>
    <body>
        <div id="container">
            <div id="back-link">
                <h1 class="back round-top-left round-top-right" >
                    <a href="<?php bloginfo('url') ?>" title='Back to Village Lions RFC Home page'>Back to Village Lions RFC Home page</a>
                </h1>
            </div>
            <div>
                <?php dynamic_sidebar('Premium Tournament Sponsors'); ?>
            </div>
            <div id="header" >
                <img name="header_only" src="<?php bloginfo('stylesheet_directory'); ?>/4leafs/images/banner.png" alt="Village Lions New York CIty Four Leaf Fifteens Annual Tournament" />
            </div> <!-- end of div#header -->
            <?php wp_nav_menu( array( 'menu' => 'Tournament Nav', 'container_id' =>'nav_main'  ) ); ?>
<?php 