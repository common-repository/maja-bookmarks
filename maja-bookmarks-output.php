<?php 

/*

The Output class

*/
 

class Maja_Bookmarks_Output
{
	var $plugin = "maja-bookmarks";
    
	function output($instance, $before='', $after='') 
	{
	    if($instance['category_name'] == "All") $instance['category_name'] = '';
	    
	    $books = get_bookmarks($instance);
	    
	    if(count($books)>0)
	    {
			$template = $this->external_template($instance['use_hook']);
			$counter = 0;
			$ulclass = ($instance['use_class']) ? ' class="'.$instance['use_class'].'"' : '';
			$cont = ($template) ? $instance['use_container'] : "ul";
			$html = "<".$cont.$ulclass.">";
			
			echo $before.$html;
			
			foreach ( $books as $bookmark )
			{ 
				 if( $template )
				 {
				 	include($template);
				 	$counter++;
				 }else{
				 	echo '<li><a href="'.$bookmark->link_url.'" target="'.$bookmark->link_target.'">'.$bookmark->link_name.'</a></li>';
				 }
			}
			
			echo "</".$cont.">".$after;
		}
	}
	
	
	function external_template($hook)
	{
		$template = false;
		
		$path_ext = TEMPLATEPATH . "/" . $this->plugin . "/" . $hook . ".php";
		$path_int = WP_PLUGIN_DIR . "/" . $this->plugin . "/templates/" . $hook . ".php";

		if( file_exists( $path_int ))
		{
			$template = $path_int;
		}
		
		if( file_exists( $path_ext ))
		{
			$template = $path_ext;
		}
		
		return $template;
	}
	
}

?>