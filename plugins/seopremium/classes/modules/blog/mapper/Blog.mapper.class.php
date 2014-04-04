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
 * Маппер Blog модуля Blog плагина Seo
 */
class PluginSeopremium_ModuleBlog_MapperBlog extends PluginSeo_Inherit_ModuleBlog_MapperBlog
{
    /**
     * Return seo data of blog
     *
     * @param array $aBlogsId
     * @param string $sLang
     * @return array
     */
    public function GetBlogsSeoByArrayId($aBlogsId, $sLang = null)
    {
        $sql = "SELECT *
                FROM
                " . Config::Get('db.table.blog_seo') . "
                WHERE
                    blog_id IN (?a)
                ";

        if ($sLang) {
            $sql .= " AND blog_language = ?";
        }

        if ( $data = $this->oDb->query($sql, $aBlogsId, $sLang)) {
            return $data;
        }

        return array();
    }

    /**
     * Adding seo values to base
     *
     * @param ModuleBlog_EntityBlog $oBlog
     *
     * @return bool
     */
    public function UpdateSeo($oBlog)
    {
        if (!$oBlog->getLang()) {
            $oBlog->setLanguage('');
        } else {
            $oBlog->setLanguage($oBlog->getLang());
        }

        $sql = "REPLACE
                    " . Config::Get('db.table.blog_seo') . "
                SET
                    blog_id = ?,
                    blog_language = ?,
                    blog_seo_keyword = ?,
                    blog_seo_description = ?
                ";

        if ($this->oDb->query($sql, $oBlog->getId(), $oBlog->getLanguage(), $oBlog->getBlogSeoKeyword(), $oBlog->getBlogSeoDescription())) {
            return true;
        }
        return false;
    }
}
