<?php

/*

The shortcode class

*/


class MAJA_Bookmarks_ShortCode
{
	function maja_func($atts, $content = null)
	{
		$defclass = new MAJA_Bookmarks_Default();
		$def = $defclass->get_default();
		
		$atts = shortcode_atts($def, $atts);
		
		ob_start();
			
		$out = new Maja_Bookmarks_Output();
		$out->output($atts);
				
		$res = ob_get_contents();
		ob_clean();
		return $res;
    }
}

add_shortcode( 'majabookmarks', array('MAJA_Bookmarks_ShortCode', 'maja_func') );


?>