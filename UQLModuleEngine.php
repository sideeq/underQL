<?php

class UQLModuleEngine extends UQLBase{


public static function underql_module_run_input(&$values,$is_insert = true)
	{
	   /* run modules */
	    if(isset($GLOBALS['uql_global_loaded_modules']) &&
	     @count($GLOBALS['uql_global_loaded_modules']) != 0)
	     {
	       foreach($GLOBALS['uql_global_loaded_modules'] as $key => $module_name)
	       {
	         if(isset($GLOBALS[sprintf(UQL_MODULE_OBJECT_SYNTAX,$module_name)]))
	          $GLOBALS[sprintf(UQL_MODULE_OBJECT_SYNTAX,$module_name)]->in($values,$is_insert);
	         //$this->um_values_map->underql_set_map($current_vals);
	       }
	     }   
	}

public static function underql_module_run_output(&$path)
	{
	   /* run modules */
	    if(isset($GLOBALS['uql_global_loaded_modules']) &&
	     @count($GLOBALS['uql_global_loaded_modules']) != 0)
	     {
	       foreach($GLOBALS['uql_global_loaded_modules'] as $key => $module_name)
	       {
	         if(isset($GLOBALS[sprintf(UQL_MODULE_OBJECT_SYNTAX,$module_name)]))
	          $GLOBALS[sprintf(UQL_MODULE_OBJECT_SYNTAX,$module_name)]->out($path);
	       }
	     }   
	}	
}

?>