<?php

/*
A Generic helper class
Version: 1.2
*/

class Maja_Core
{
	var $parent;
	var $instance;
	var $pathname;
	
	function Maja_Core($pathname)
	{
		$this->pathname = $pathname;
		//if( STYLESHEETPATH == TEMPLATEPATH ) // is not child
	}
	
	
	function getThemePlugins()
	{
		$res = array('');
		
		$path_int = WP_PLUGIN_DIR . "/" . $this->pathname ."/templates/";
		$internal = $this->get_templates($path_int);
		foreach ($internal as $value) {
			array_push($res, $value);
		}

		$path_ext = TEMPLATEPATH . "/" . $this->pathname ."/";
		$external = $this->get_templates($path_ext);
		foreach ($external as $value) {
			array_push($res, $value);
		}
		
		return $res;
	}
	
	
	
	function get_templates($path)
	{
		$res = array();
		if(is_dir($path) && file_exists($path) )
		{
			if ($handle = opendir($path)) {
			    while (false !== ($entry = readdir($handle)))
			    {
			        if ($entry != "." && $entry != "..")
			        {
			        	$tmp = explode(".", $entry);
			        	if( strtolower($tmp[1]) == "php")
			        	{
			        		array_push($res, $tmp[0]);
			        	}
			        }
			    }
			    closedir($handle);
			}
		}
		return $res;
	}
	
	
	function setFieldsGenerator($parent, $instance)
	{
		$this->parent = $parent;
		$this->instance = $instance;
	}
	
	
	
	function get_textfield($fieldname, $label=NULL)
	{
	?>
	<p>
		<label for="<?php echo $this->parent->get_field_id($fieldname); ?>">
			<?php echo ($label)?$label:$fieldname; ?>: 
			<input 
				class="widefat" 
				id="<?php echo $this->parent->get_field_id($fieldname); ?>" 
				name="<?php echo $this->parent->get_field_name($fieldname); ?>" 
				type="text" 
				value="<?php echo attribute_escape($this->instance[$fieldname]); ?>" />
		</label>
	</p>
	<?php
	}




	function get_checkbox($fieldname, $label=NULL)
	{
	?>
	<p>
	<label for="<?php echo $this->parent->get_field_id( $fieldname ); ?>"> 
		 
		<input
			id="<?php echo $this->parent->get_field_id( $fieldname ); ?>"
			name="<?php echo $this->parent->get_field_name( $fieldname ); ?>" 
			type="checkbox" 
			<?php 
			$prnt = ($this->instance[ $fieldname ]) ? 'checked="checked"' : '';
			echo $prnt;
			?>
		/> <?php echo ($label)?$label:$fieldname; ?>
	</label>
	</p>	
	<?php
	}
	



	function get_dropdown($fieldname, $arr, $label=NULL)
	{
	?>
	<p>
	<label for="<?php echo $this->parent->get_field_id($fieldname); ?>"> 
		<?php echo ($label)?$label:$fieldname; ?>: 
		<select class="widefat"
			id="<?php echo $this->parent->get_field_id( $fieldname ); ?>"
			name="<?php echo $this->parent->get_field_name( $fieldname ); ?>" >
			<?php 
			foreach ($arr as $value=>$key)
			{
			    echo '<option', ($key ? ' value="' . $key . '"' : ''), ($this->instance[$fieldname] == $key ? ' selected="selected"' : ''), '>', $key, '</option>';
			}
			?>
		</select>
	</label>
	</p>
	<?php
	}
	
	
	
}
?>