<?php

/* ---------------------------------------------------------------------------
 * @Plugin Name: reformal
 * @Description: Add widget from reformal.ru
 * @Author URI: http://pgsha.info
 * @LiveStreet Version: 0.5.1
 * @Plugin Version:	1.0.0
 * ----------------------------------------------------------------------------
 */
 
class PluginReformal_HookReformal extends Hook {
       
		public function RegisterHook() {
				$this->AddHook('template_body_end','Reformal',__CLASS__,-1000);
		}
		
		public function Reformal() {
				return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'reformal.tpl');
		}		
}
