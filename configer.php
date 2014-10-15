<?php

	
	/**
	* Class configer 
	* (c) 2014 Andrey Delfin 
	*
	*  - Available all settings  
	*  - Static array set
	*  - Export settings in define (wordpress, old scholl php code, CMS) 
	* 		@method defines()
	*  - Import from json
	*  		@method load(string $file)
	*
	*/

	
	class configer {

		

		static $set = array();

		/**
		* load json config
		*/

		static function load($file) {
			
			if (file_exists($file)) {
				static::$set = json_decode(file_get_contents($file));
				return True;
			}	

			return false;

		} 


		/**
		*  add item to array set 
		*/

		static function set($name, $value = null){

			
			if ($value == null)
				return static::$set[$name];
			else {	
				static::$set[$name] = $value;
				return;
			}
			
	
		}

		
		/**
		* export to define
		*/

		static function 2defines(){
			
			$settings = static::$set;

			foreach ($settings as $name=>$set){
				if (!is_array($set))
					define(strtoupper($name), $set);
			}
			
		}

	}	


	/*
	** quick function to add items config
	*/

	if (!function_exists('config')) {
		
		function set ($name, $value = null) {
			
			return configer::set($name, $value);
		}

	}

	