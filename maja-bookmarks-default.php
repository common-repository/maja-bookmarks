<?php

/*

The default values

*/


class MAJA_Bookmarks_Default
{
	function get_default()
	{
		$def = array(
						'title'			 => '',
						
						'orderby'        => 'name', 
						'order'          => 'ASC',
						'limit' 		 => 5,
						'category'       => '',
						'category_name'  => '', 
						'hide_invisible' => 1,
						'show_updated'   => 0, 
						'include'        => '',
						'exclude'        => '',
						'search'         => '',                    

                        'use_class'		 =>'',
						'use_container'  => 'ul',
                        'use_hook'		 =>''
                );	
                
          return $def;
     }
}


?>