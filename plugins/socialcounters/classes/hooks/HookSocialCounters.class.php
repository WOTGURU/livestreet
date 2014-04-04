<?php

class PluginSocialcounters_HookSocialcounters extends Hook
{

    /**
     * Регистрация хуков
     */
    public function RegisterHook()
    {
        $this->AddHook('template_social_counters', 'SocialCountersAdd');
    }

    public function SocialCountersAdd(){
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__).'buttons.tpl');
    }
}