<?php

/* -------------------------------------------------------
 *
 *   LiveStreet (v1.0)
 *   Plugin Multiblog for liveStreet 1.0.1
 *   Copyright © 2013 1099511627776@mail.ru
 *
 * --------------------------------------------------------
 *
 *   Contact e-mail: 1099511627776@mail.ru
 *
  ---------------------------------------------------------
*/

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginMultiblog extends Plugin {

    public $aDelegates = array(
        'template' => array(
            'topic_part_header.tpl' => '_topic_part_header.tpl',
        )
    );

    protected $aInherits=array(
        'entity' => array('ModuleTopic_EntityTopic'),
        'mapper' => array('ModuleTopic_MapperTopic','ModuleBlog_MapperBlog'),
        'module' => array('ModuleTopic','ModuleBlog'),
    );

    // Активация плагина
    public function Activate() {
        if (!$this->isFieldExists('prefix_topic','blog1_id')) {
            $this->ExportSQL(dirname(__FILE__).'/install.sql');
        }        
        return true;
    }

    // Деактивация плагина
    public function Deactivate(){
        if(Config::Get('plugin.multiblog.full_deinstall')) {
            $this->ExportSQL(dirname(__FILE__).'/deinstall.sql'); 
        }
        return true;
    }
    // Инициализация плагина
    public function Init() {
        $this->Viewer_AppendStyle(Plugin::GetTemplatePath(__CLASS__)."css/chosen.css");
        $this->Viewer_AppendScript(Plugin::GetTemplatePath(__CLASS__)."js/chosen.jquery.min.js");
        $this->Viewer_AppendScript(Plugin::GetTemplatePath(__CLASS__)."js/scripts.js");
    }
}
?>
