<?php
/*-------------------------------------------------------
 * Plugin Social Counters by Prokopov Nikolai
 * version 1.0.0 for livestreet 1.0.3
 * site http://www.prokopov-nikolai.ru
 *---------------------------------------------------------
 */

class PluginSocialcounters extends Plugin
{

    /**
     * Активация плагина
     * В принципе, здесь нам делать ничего не нужно
     */
    public function Activate()
    {
        return true;
    }

    /**
     * Инициализация плагина
     */
    public function Init()
    {
        $this->Viewer_Assign('sTemplatePath', Plugin::GetTemplatePath(__CLASS__));
        $this->Viewer_AppendScript(Plugin::GetTemplateWebPath(__CLASS__).'js/socialcounters.js');
        $this->Viewer_AppendStyle(Plugin::GetTemplateWebPath(__CLASS__).'css/socialcounters.css');
    }

    /**
     * Деактивация плагина
     * В принципе, тут тоже ничего не нужно делать
     */
    public function Deactivate()
    {
        return true;
    }

}