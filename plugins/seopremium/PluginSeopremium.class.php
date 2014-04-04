<?php

/* ---------------------------------------------------------------------------
 * @Plugin Name: SEO
 * @Plugin URI:
 * @Description: Optimization site for search engines
 * @Author: web-studio stfalcon.com
 * @Author URI: http://stfalcon.com
 * @LiveStreet Version: 1.0.1
 * @License: GNU GPL v3, http://www.gnu.org/licenses/agpl.txt
 * ----------------------------------------------------------------------------
 */

/**
 * Deny direct access to this file
 */
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginSeopremium extends Plugin
{
    public $aInherits = array(
        'entity' => array(
            'ModuleTopic_EntityTopic' => '_ModuleTopic_EntityTopic',
        ),
        'mapper' => array(
            'ModuleBlog_MapperBlog' => '_ModuleBlog_MapperBlog',
        ),
        'module' => array(
            'ModuleBlog' => '_ModuleBlog',
            'ModuleTopic' => '_ModuleTopic',
        ),
    );

    /**
     * Plugin Activation
     *
     * @return boolean
     */
    public function Activate()
    {
        if (!$this->isTableExists('prefix_blog_seo')) {
            $result = $this->ExportSQL(dirname(__FILE__) . '/activate.sql');
            return $result['result'];
        }

        return true;
    }

    /**
     * Plugin Initialization
     *
     * @return void
     */
    public function Init() {

        $templates = array(
            'meta/description/blog.tpl',
            'meta/keywords/blog.tpl',
        );

        foreach ($templates as $template) {
            $this->Plugin_Delegate('template',
                Plugin::GetTemplatePath('seo') . $template,
                Plugin::GetTemplatePath(__CLASS__) . $template,
                __CLASS__
            );
        }
    }
}