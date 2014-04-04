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
 * Модуль Blog плагина L10n
 */
class PluginSeopremium_ModuleBlog extends PluginSeopremium_Inherit_ModuleBlog
{
    /**
     * Inherited Blog function
     *
     * @param int $aBlogId
     * @param array|null $aAllowData
     * @param array|null $aOrder
     * @return array
     */
    public function GetBlogsAdditionalData($aBlogId, $aAllowData = null, $aOrder = null)
    {
        $aBlogs = parent::GetBlogsAdditionalData($aBlogId, $aAllowData, $aOrder);

        return $this->GetBlogsSeoByArrayId($aBlogs);
    }

    /**
     * Get blog entity with seo data
     *
     * @param ModuleBlog_EntityBlog $oBlog
     * @return mixed
     */
    public function GetBlogSeoById(ModuleBlog_EntityBlog $oBlog)
    {
        $aBlogs = $this->GetBlogsSeoByArrayId(array($oBlog));
        return $aBlogs[0];
    }

    /**
     * Get blog seo data by blog array
     *
     * @param array $aBlogs
     * @return array
     */
    public function GetBlogsSeoByArrayId($aBlogs)
    {
        $emptyBlogs = array();
        foreach ($aBlogs as &$oBlog) {
            $sCacheKeys = "blog_seo_{$oBlog->getId()}_{$oBlog->getLang()}";
            if (false !== ($data = $this->Cache_Get($sCacheKeys))) {
                $oBlog->setBlogSeoKeyword($data['blog_seo_keyword']);
                $oBlog->setBlogSeoDescription($data['blog_seo_description']);
            }
            else {
                $emptyBlogs[] = $oBlog->getBlogId();
            }
        }

        if (count($emptyBlogs)) {
            $keys = array_keys($aBlogs);
            $seoData = $this->oMapperBlog->GetBlogsSeoByArrayId($emptyBlogs, $aBlogs[$keys[0]]->getLang());

            foreach ($aBlogs as &$oBlog) {
                foreach ($seoData as $seoElement) {
                    if ($oBlog->getId() == $seoElement['blog_id']) {
                        $oBlog->setBlogSeoKeyword($seoElement['blog_seo_keyword']);
                        $oBlog->setBlogSeoDescription($seoElement['blog_seo_description']);

                        $sCacheKeys = "blog_seo_{$oBlog->getId()}_{$oBlog->getLang()}";
                        $this->Cache_Set($seoElement, $sCacheKeys, array(), 60*60*24*4);
                    }
                }
            }
        }

        return $aBlogs;
    }

    /**
     *  Replace blog seo
     *
     * @param ModuleBlog_EntityBlog $oBlog
     * @return boolean
     */
    public function UpdateSeo(ModuleBlog_EntityBlog $oBlog)
    {
        if($this->oMapperBlog->UpdateSeo($oBlog)) {
            $cacheKey = "blog_seo_{$oBlog->getId()}_{$oBlog->getLang()}";
            $this->Cache_Delete($cacheKey);

            return true;
        }

        return false;
    }
}