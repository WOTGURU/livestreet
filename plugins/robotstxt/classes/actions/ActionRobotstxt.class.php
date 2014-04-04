<?php
/*
	Robotstxt plugin
	(P) PSNet, 2008 - 2013
	http://psnet.lookformp3.net/
	http://livestreet.ru/profile/PSNet/
	https://catalog.livestreetcms.com/profile/PSNet/
	http://livestreetguide.com/developer/PSNet/
*/

class PluginRobotstxt_ActionRobotstxt extends ActionPlugin {

	protected $oUserCurrent = null;

	// ---

	public function Init () {
		if (!$this -> oUserCurrent = $this -> User_GetUserCurrent () or !$this -> oUserCurrent -> isAdministrator ()) {
			return Router::Action ('error');
		}
		$this -> SetDefaultEvent ('index');
	}

	// ---

	protected function RegisterEvent () {
		$this -> AddEvent ('index', 'ShowOrEditEvent');
	}

	// ---

	public function ShowOrEditEvent () {
		if (isPost ('submit_edit_robots')) {
			$this -> Security_ValidateSendForm ();
			Config::Set ('plugin.robotstxt.Robots_Txt_Content', (string) getRequest ('robotstxt'));
			CE::SaveMyConfig ($this);
			$this -> Message_AddNoticeSingle ('Ok');
		}
	}
	
}

?>