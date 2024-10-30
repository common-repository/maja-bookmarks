<?php

/*

The Widget class

*/



class MAJA_Bookmarks_Widget extends WP_Widget
{

	
	  function MAJA_Bookmarks_Widget()
	  {
	    $widget_ops = array('classname' => 'MAJA_Bookmarks_Widget', 'description' => 'Display a list of bookmarks through several options' );
	    $this->WP_Widget('MAJA_Bookmarks_Widget', 'MAJA Bookmarks', $widget_ops);
	  }
	 
	 
	
	
	  function form($instance)
	  {
	  		$defclass = new MAJA_Bookmarks_Default();
	  		
	  		$instance = wp_parse_args( (array) $instance, $defclass->get_default() );
	  		$out = new Maja_Bookmarks_Form();
	  		$out->output($this, $instance);
	  }
		
		
	
	
	
	  function update($new_instance, $old_instance)
	  {
		    $instance = $old_instance;
		    
	  		$defclass = new MAJA_Bookmarks_Default();
		    $fields = $defclass->get_default();
		    
		    foreach($fields as $k => $v)
		    {
		    	$instance[ $k ] = strip_tags( $new_instance[ $k ] );
		    }
		    
		    return $instance;
	  }
	 
	 
	 
	 
	 
	 
	  function widget($args, $instance)
	  {
	  		if(!is_admin()) // dont render output if in admin panel
	  		{
		  		extract($args, EXTR_SKIP);
		  		
		  		$before = $before_widget;
		  		
				$title = empty($instance['title']) ? '' : apply_filters('widget_title', strip_tags($instance['title']));
				if (!empty($title)) $before .= $before_title . $title . $after_title;
		  
		  		$out = new Maja_Bookmarks_Output();
				$out->output($instance, $before, $after_widget);
		    }
	  }
 
 
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("MAJA_Bookmarks_Widget");') );
?>