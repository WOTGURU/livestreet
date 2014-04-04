<?php

/* -------------------------------------------------------
 *
 *   LiveStreet (1.x)
 *   Plugin Preview (v.1.0)
 *   Copyright © 2013 Bishovec Nikolay
 *
 * --------------------------------------------------------
 *
 *   Plugin Page: http://netlanc.net
 *   Contact e-mail: netlanc@yandex.ru
 *
  ---------------------------------------------------------
 */

class PluginPw_HookPw extends Hook
{
    public function RegisterHook()
    {
        $this->AddHook('template_html_head_end', 'HtmlHeadEnd', __CLASS__, 151);
        $this->AddHook('template_uploadimg_additional', 'WindowLoadImg', __CLASS__, 151);
        $this->AddHook('template_uploadimg_link_additional', 'WindowLoadImg', __CLASS__, 151);

        $this->AddHook('template_copyright', 'Copyright', __CLASS__);
    }

    public function HtmlHeadEnd()
    {
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'header.tpl');
    }

    public function WindowLoadImg()
    {
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'window.load_img.tpl');
    }

    public function Copyright()
    {
        return '<a href="http://catalog.netlanc.net" target="_blank">Спонсор плагина Preview - catalog.netlanc.net</a><br />';
    }

}

?>
