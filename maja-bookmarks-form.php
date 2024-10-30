<?php

/*

The Widget Form

*/



class Maja_Bookmarks_Form
{

	function output($parent, $instance)
	{
		$core = new MAJA_Core("maja-bookmarks");
		
		$core->setFieldsGenerator($parent, $instance);
		
		$core->get_textfield('title', 'Title');
		
		$core->get_textfield('limit', 'Number of links');
		
		$core->get_textfield('category', 'Category IDs <small>(comma separated)</small>');
		
		$terms = get_terms('link_category');
		$arr = array("All");
		for($i=0; $i<count($terms); $i++)
		{
			$tax = $terms[$i];
			array_push($arr, $tax->name);
		}
		$core->get_dropdown('category_name', $arr, 'Category Name');
 
 
		$core->get_checkbox('hide_invisible', 'Hide invisible');

		$core->get_checkbox('show_updated', 'Show updated');

		$core->get_textfield('include', 'Include IDs <small>(comma separated)</small>');
		$core->get_textfield('exclude', 'Exclude IDs <small>(comma separated)</small>');

		$core->get_dropdown('orderby', array('name', 'link_id', 'url', 'owner', 'rating', 'updated', 'visible', 'length', 'rand'), 'Order By');

		$core->get_dropdown('order', array('asc', 'desc'), 'Sort By');
 
		$core->get_textfield('use_class', 'UL CSS class');
		
		$arr = $core->getThemePlugins();
		
		if(count($arr)>0)
		{
			$core->get_textfield('use_container', 'Container tag');
			$core->get_dropdown('use_hook', $arr, 'Output Template');
		}
	 ?>	

	
<?php
	}
}
?>