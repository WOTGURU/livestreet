<?php

/* ---------------------------------------------------------------------------
 * @Plugin Name: reformal
 * @Description: Add widget from reformal.ru
 * @Author URI: http://pgsha.info
 * @LiveStreet Version: 1.0.1
 * @Plugin Version:	1.0.1
 * ----------------------------------------------------------------------------
 */

if (! class_exists ( "Plugin" )) {
	die ( "Hacking attemp!" );
}

class Pluginreformal extends Plugin {
		public function Activate() {
				return true;
		}
	
	public function Deactivate() {
			return true;
	}
	
	public function Init() {		
	}
}
