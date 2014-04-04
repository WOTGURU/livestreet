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
 * Объект сущности топика
 *
 */
class PluginSeopremium_ModuleTopic_EntityTopic extends PluginSeopremium_Inherit_ModuleTopic_EntityTopic
{
    /**
     * Save keyword to entity
     *
     * @param string $keywordData
     */
    public function setTopicSeoKeyword($keywordData)
    {
        if ($this->GetLang()) {
            $this->setExtraValue("topic_seo_keyword_{$this->GetLang()}", $keywordData);
        } else {
            $this->setExtraValue('topic_seo_keyword', $keywordData);
        }
    }

    /**
     * get Keyword data from entity
     *
     * @return string
     */
    public function getTopicSeoKeyword()
    {
        if ($this->GetLang()) {
            return $this->getExtraValue("topic_seo_keyword_{$this->GetLang()}");
        } else {
            return $this->getExtraValue('topic_seo_keyword');
        }
    }

    /**
     * Set seo description data to entity
     *
     * @param string
     */
    public function setTopicSeoDescription($descriptionData)
    {
        if ($this->GetLang()) {
            $this->setExtraValue("topic_seo_description_{$this->GetLang()}", $descriptionData);
        } else {
            $this->setExtraValue('topic_seo_description', $descriptionData);
        }
    }

    /**
     * get seo description data from entity
     *
     * @return string
     */
    public function getTopicSeoDescription()
    {
        if ($this->GetLang()) {
            return $this->getExtraValue("topic_seo_description_{$this->GetLang()}");
        } else {
            return $this->getExtraValue('topic_seo_description');
        }
    }
}