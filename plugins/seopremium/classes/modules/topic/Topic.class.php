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
 * Модуль для работы с топиками
 *
 */
class PluginSeopremium_ModuleTopic extends PluginSeopremium_Inherit_ModuleTopic
{
    /**
     * Update topic content
     *
     * @param ModuleTopic_EntityTopic $oTopic
     */
    public function UpdateTopicContent($oTopic) {
        $this->oMapperTopic->UpdateTopicContent($oTopic);
        $this->Cache_Clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG,array('topic_update',"topic_update_user_{$oTopic->getUserId()}"));
        $this->Cache_Delete("topic_{$oTopic->getId()}");
    }
}