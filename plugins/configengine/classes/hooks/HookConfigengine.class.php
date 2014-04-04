<?php
/*
	Configengine plugin
	(P) PSNet, 2008 - 2013
	http://psnet.lookformp3.net/
	http://livestreet.ru/profile/PSNet/
	https://catalog.livestreetcms.com/profile/PSNet/
	http://livestreetguide.com/developer/PSNet/
*/

class PluginConfigengine_HookConfigengine extends Hook {

	public function RegisterHook () {
		$this -> AddHook ('lang_init_start', 'LangInitStart', __CLASS__, PHP_INT_MAX);							// highest priority as possible
		$this -> AddHook ('engine_init_complete', 'EngineInitComplete');
	}

	// ---

	public function LangInitStart () {
		// load configs
		$this -> PluginConfigengine_Config_AutoLoadConfigs ();
	}

	// ---

	public function EngineInitComplete () {
		// add CSS and JS
		$sTemplateWebPath = Plugin::GetTemplateWebPath (__CLASS__);
		$this -> Viewer_AppendStyle ($sTemplateWebPath . 'css/style.css');
		$this -> Viewer_AppendScript ($sTemplateWebPath . 'js/init.js');
	}

}

?>