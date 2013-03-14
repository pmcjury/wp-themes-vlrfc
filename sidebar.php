<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	<div id="sidebar">
		<div id="sidebar_inner">
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'sidebarRight' ) ) : 
					endif;
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'sidebarLinksPage') ) : 
					endif;
			?>
		</div> <!-- end of div#sidebar_inner -->
	</div> <!-- end of div#sidebar -->
<?php

