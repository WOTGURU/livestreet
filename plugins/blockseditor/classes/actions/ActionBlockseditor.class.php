<?php
/*
  Blockseditor plugin
  (P) PSNet, 2008 - 2013
  http://psnet.lookformp3.net/
  http://livestreet.ru/profile/PSNet/
  http://livestreetcms.com/profile/PSNet/
  http://livestreetguide.com/developer/PSNet/
*/

class PluginBlockseditor_ActionBlockseditor extends ActionPlugin {

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
    $this -> AddEvent ('index', 'EventShowOrEdit');
  }

  // ---

  public function EventShowOrEdit () {
    if (isPost ('submit_edit_block_content')) {
      $this -> Security_ValidateSendForm ();
      Config::Set ('plugin.blockseditor.Block_Content', (string) getRequest ('blockseditor'));
      Config::Set ('plugin.blockseditor.Priority', (int) getRequest ('priority'));
      Config::Set ('plugin.blockseditor.Actions', (string) getRequest ('actions'));
      CE::SaveMyConfig ($this);
      $this -> Message_AddNoticeSingle ('Ok');
    }
  }
	
}

?>