<?php
/* ---------------------------------------------------------------------------
 * @Plugin Name: SEOPremium
 * @Plugin URI:
 * @Description: Optimization site for search engines (advanced features)
 * @Author: web-studio stfalcon.com
 * @Author URI: http://stfalcon.com
 * @LiveStreet Version: 1.0.1
 * @License: GNU GPL v3, http://www.gnu.org/licenses/agpl.txt
 * ----------------------------------------------------------------------------
 */

/**
 * Hooks for topic module
 *
 * Class PluginSeopremium_HookTopic
 */
class PluginSeopremium_HookTopic extends Hook {

    /**
     * Register hooks
     *
     * @return void
     */
    public function RegisterHook()
    {
        $oCurrentUser = $this->User_GetUserCurrent();

        // Устанавливаем хуки только если пользователь администратор
        if ($oCurrentUser && $oCurrentUser->isAdministrator()) {
            $this->AddHook('template_form_add_topic_topic_end', 'FormAddTopicBegin', __CLASS__);
            $this->AddHook('topic_edit_show', 'TopicEditShow', __CLASS__);

            $this->AddHook('topic_edit_before', 'TopicAddSeoToTemplate', __CLASS__);
            $this->AddHook('topic_add_before', 'TopicAddSeoToTemplate', __CLASS__);

            $this->AddHook('topic_edit_after', 'TopicSaveSeoToBase', __CLASS__);
            $this->AddHook('topic_add_after', 'TopicSaveSeoToBase', __CLASS__);
        }
    }

    /**
     * Fill topic data from request
     *
     * @param void
     */
    public function TopicAddSeoToTemplate($aData)
    {
        $oTopic = $aData['oTopic'];
        $oTopic->setTopicSeoKeyword(getRequest('topic_seo_keyword'));
        $oTopic->setTopicSeoDescription(getRequest('topic_seo_description'));
    }

    /**
     * adding template to topic edit form
     *
     * @return string
     */
    public function FormAddTopicBegin()
    {
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'actions/ActionTopic/topic_seo.tpl');
    }

    /**
     * Insert values to template
     *
     * @param array $aVars
     */
    public function TopicEditShow($aVars)
    {
        $oTopic = $aVars['oTopic'];
        $this->Viewer_Assign('aSeoKeyword', $oTopic->getTopicSeoKeyword());
        $this->Viewer_Assign('aSeoDescription', $oTopic->getTopicSeoDescription());
    }

    /**
     * Save seo data to base
     *
     * @param array $aData
     * @return mixed
     */
    public function TopicSaveSeoToBase($aData)
    {
        $oTopic = $aData['oTopic'];
        $oTopic->setTopicSeoKeyword(getRequest('topic_seo_keyword'));
        $oTopic->setTopicSeoDescription(getRequest('topic_seo_description'));

        return $this->Topic_UpdateTopicContent($oTopic);
    }
}