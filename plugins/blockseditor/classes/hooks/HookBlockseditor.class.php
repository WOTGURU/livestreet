<?php
/*
  Blockseditor plugin
  (P) PSNet, 2008 - 2013
  http://psnet.lookformp3.net/
  http://livestreet.ru/profile/PSNet/
  http://livestreetcms.com/profile/PSNet/
  http://livestreetguide.com/developer/PSNet/
*/

class PluginBlockseditor_HookBlockseditor extends Hook {

  public function RegisterHook () {
    $this -> AddHook ('engine_init_complete', 'EngineInitComplete');
    $this -> AddHook ('template_footer_end', 'FooterEnd');
  }
  
  // ---

  public function EngineInitComplete () {
    // we should manually controll actions coz Viewer_AddBlock just adds block without action/event checking
    if (!in_array (Router::GetAction (), (array) array_map ('trim', explode (',', Config::Get ('plugin.blockseditor.Actions'))))) return false;
    $this -> Viewer_AddBlock (
      'right',
      'blocks/block.blockseditor.tpl',
      array ('plugin' => 'blockseditor'),
      Config::Get ('plugin.blockseditor.Priority')
    );
  }

  // ---

  public function FooterEnd () {
    return $this -> Viewer_Fetch (Plugin::GetTemplatePath (__CLASS__) . 'footer_end.tpl');
  }

}

?>