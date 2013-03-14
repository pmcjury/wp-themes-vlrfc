<?php
/**
 * @package VLRFC
 * @subpackage
 */
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
        <META name="y_key" content="4d6d6f9c0a735107">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="google-site-verification" content="6BnRBta901ImM7Q3_VPub3X15TdJQ4ka4c0DslKlj_M" />
	<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?> </title>
        <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
        <link rel="SHORTCUT ICON" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
        <link href="<?php bloginfo('stylesheet_directory'); ?>/css/global_reset.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen" />
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_enqueue_script('jquery'); ?>
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
        <script type="text/javascript">
            (function($){
                $(document).ready(function(){
                    $("#nav_main > ul > li > ul").hide();
                    $("#nav_main > ul > li:last a").addClass('last_link');
                    $("#nav_main > ul > li").hover(function(e){$(this).find(":nth-child(2)").fadeIn('fast');return false;},function(e){$(this).find(":nth-child(2)").fadeOut('fast');});
                });
            })(jQuery);
        </script>
    </head>
    <body>
        <div id="container">
            <div>
                <?php dynamic_sidebar( 'PremiumSponsors'); ?>
            </div>
            <div id="header">
                <?php //bloginfo('description'); ?>
                <p class="header_text_left">Home Pitch: <?php echo get_option('vlrfc_theme_header_home_pitch'); ?> <br />Training: <?php echo get_option('vlrfc_theme_header_training'); ?> </p>
                <p class="header_text_right">Sponsor: <?php echo get_option('vlrfc_theme_header_sponsor'); ?><br /> <?php echo get_option('vlrfc_theme_header_hotline'); ?></p>
                <img name="header_only" src="<?php bloginfo('stylesheet_directory'); ?>/images/header.jpg" width="900" height="191" usemap="#m_header_only" alt="" />
                <map name="m_header_only" id="m_header_only">
                    <area shape="rect" coords="28,43,550,191" href="<?php echo get_option('home'); ?>" title="Home - Village Lions Rugby Football Club" alt="Home - Village Lions Rugby Football Club" />
                    <area shape="rect" coords="653,49,784,181" href="<?php echo bloginfo('url') . '/' . get_option('vlrfc_theme_header_join_us_slug') . '/'; ?>" title="Join Us button" alt="Join Us button" />
                </map>
            </div> <!-- end of div#header -->
      
            <?php wp_nav_menu( array( 'menu' => 'Main Nav', 'container_id' =>'nav_main'  ) ); ?>
<?php 
