<?php

/*
 * Hook для реакции отправки информации поисковикам
 */

class PluginEmpblogping_HookEmpblogping extends Hook {

    public function RegisterHook() {
        /**
         * добавляем хук на добавление/редактирование топика
         */
        $this->AddHook("topic_add_after", "onTopicAdd", __CLASS__);
        $this->AddHook("topic_edit_after", "onTopicAdd", __CLASS__);
    }

    public function onTopicAdd($params) {
        $oTopic = $params['oTopic'];

        // @todo харкод
        $oBlog = $this->Blog_GetBlogById($oTopic->getBlogId());
        $oTopic->setBlog($oBlog);

        $this->PluginEmpblogping_ModuleEmpping_MakeYandexPing($oTopic);
        $this->PluginEmpblogping_ModuleEmpping_MakeGooglePing($oTopic);
    }

}