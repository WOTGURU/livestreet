<?php
/*
  Tagslikefull plugin
  (P) PSNet, 2008 - 2012
  http://psnet.lookformp3.net/
  http://livestreet.ru/profile/PSNet/
  http://livestreetcms.com/profile/PSNet/
*/

if (!class_exists ('Plugin')) {
  die ('Kokobubble!');
}

class PluginTagslikefull extends Plugin {

  public function Activate () {
    return true;
  }
  
  // ---
	
  public function Init () {}
  
  // ---
	
  protected $aInherits = array (
    'module' => array ('ModuleTopic_MapperTopic')
  );
	
}

?>