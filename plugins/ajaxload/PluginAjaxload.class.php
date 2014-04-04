<?php
/*-------------------------------------------------------
*
*	Plugin "Ajaxload"
*	Author: Vladimir Yuriev (extravert)
*	Site: lsmods.ru
*	Contact e-mail: support@lsmods.ru
*
---------------------------------------------------------
*/

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
	die('Hacking attemp!');
}

class PluginAjaxload extends Plugin {

	
	protected $aInherits=array(
	   'action'=>array('ActionAjax','ActionPeople','ActionBlogs'),
       'module'=>array('ModuleTopic','ModuleComment'),
    );

    protected $aDelegates=array(
        'template'=>array(
            'paging.tpl'=>'_paging.tpl',
            'comment_paging.tpl'=>'_comment_paging.tpl',
            'actions/ActionStream/all.tpl'=>'_actions/ActionStream/all.tpl',
            'actions/ActionStream/user.tpl'=>'_actions/ActionStream/user.tpl',
        ),
    );
	
	public function Activate() {
        
		return true;
	}
	/**
	 * Init plugin
	 */
	public function Init() {
        $this->Viewer_AppendScript(Plugin::GetTemplateWebPath(__CLASS__).'js/ajaxload.js');
        //$this->Viewer_AppendScript(Plugin::GetTemplateWebPath(__CLASS__).'js/paginator.js');
        //$this->Viewer_AppendStyle(Plugin::GetTemplateWebPath(__CLASS__).'css/paginator_vk.css');
	}
}
?>