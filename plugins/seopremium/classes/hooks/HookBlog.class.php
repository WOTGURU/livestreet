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
 * Hooks for blog module
 *
 * Class PluginSeopremium_HookBlog
 */
class PluginSeopremium_HookBlog extends Hook
{
    /**
     * Register hooks
     *
     * @return void
     */
    public function RegisterHook()
    {
        $oCurrentUser = $this->User_GetUserCurrent();
        if ($oCurrentUser && $oCurrentUser->isAdministrator()) {

            $aActivePlugins = $this->Plugin_GetActivePlugins();

            /**
             * Устанавливаем соответствующие наборы хуков если модуль L10n включен и нет.
             */
            if (in_array('l10n', $aActivePlugins)) {
                $this->AddHook('template_form_add_blog_content', 'AddTemplateBlogContentL10n', __CLASS__);
                $this->AddHook('template_form_add_blog_content_aditional', 'AddTemplateBlogContentL10n', __CLASS__);

                $this->AddHook('blog_edit_after', 'BlogEditAfterL10n', __CLASS__, -1000);
                $this->AddHook('blog_add_after', 'BlogEditAfterL10n', __CLASS__, -1000);
            } else {
                $this->AddHook('template_form_add_blog_end', 'AddTemplateBlogContent', __CLASS__);
                $this->AddHook('blog_edit_show', 'BlogEditShow', __CLASS__);

                $this->AddHook('blog_edit_after', 'BlogEditAfter', __CLASS__, -1000);
                $this->AddHook('blog_add_after', 'BlogEditAfter', __CLASS__, -1000);
            }
        }
    }

    /**
     * Adding seo editing fields to content
     *
     * @param array $aData
     * @return string
     */
    public function AddTemplateBlogContent($aData)
    {
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'actions/ActionBlog/blog_seo.tpl');
    }

    public function BlogEditShow($aData)
    {
        $oBlog = $aData['oBlog'];
        $this->Viewer_Assign('aSeoKeyword', $oBlog->GetBlogSeoKeyword());
        $this->Viewer_Assign('aSeoDescription', $oBlog->GetBlogSeoDescription());
    }

    /**
     * Добавление полей SeoKeyword SeoDescription
     *
     * @param array $aData
     * @return mixed
     */
    public function AddTemplateBlogContentL10n($aData)
    {
        //находим текущий язык
        if (!isset($aData['sLangKey'])) {
            $sLang = Config::Get('lang.current');
        } else {
            $sLang = $aData['sLangKey'];
        }

        if ($blogId = getRequest('blog_id')) {
            $oBlog = $this->Blog_GetBlogById($blogId);
            $oBlog = $this->Blog_GetBlogL10n($oBlog, $sLang);
            $oBlog = $this->Blog_GetBlogSeoById($oBlog);

            $this->Viewer_Assign('aSeoKeyword', $oBlog->GetBlogSeoKeyword());
            $this->Viewer_Assign('aSeoDescription', $oBlog->GetBlogSeoDescription());
        }
        $this->Viewer_Assign('sLang', $sLang);

        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'actions/ActionBlog/blog_seo.tpl');
    }

    /**
     * Сохранение сео полей после редактирования блога
     *
     * @param array $aData
     * @return bool
     */
    public function BlogEditAfter($aData)
    {
        $oBlog = $aData['oBlog'];
        $this->SaveBlogSeo($oBlog);
    }

    /**
     * Хук на сохранение сео данных для блога
     *
     * @param array $aData
     */
    public function BlogEditAfterL10n($aData)
    {
        $aLangs = $this->PluginL10n_L10n_GetAllowedLangs();

        //устанавливаем текущий язык в конец списка языков, для предотвращения изменения теущего языка сайта
        $currentLang = Config::Get('lang.current');
        $aLangs = array_diff($aLangs, array($currentLang));
        $aLangs[] = $currentLang;

        $oOldBlog = $aData['oBlog'];
        foreach ($aLangs as $sLang) {
            if ($oBlog = $this->Blog_GetBlogL10n($oOldBlog, $sLang)) {
                $this->SaveBlogSeo($oBlog);
            }
        }
    }

    /**
     * Save blog seo to base
     *
     * @param ModuleBlog_EntityBlog $oBlog
     */
    public function SaveBlogSeo($oBlog)
    {
        $sLang = $oBlog->getLang() ? $oBlog->getLang() : '';

        $sSeoKeyword = getRequest('blog_seo_' . $sLang, null, 'post');
        $sSeoDescription = getRequest('blog_seo_description_' . $sLang, null, 'post');

        $oBlog->setBlogSeoKeyword($sSeoKeyword);
        $oBlog->setBlogSeoDescription($sSeoDescription);

        if (!$this->Blog_UpdateSeo($oBlog)) {
            $this->Message_AddError($this->Lang_Get('system_error'), $this->Lang_Get('error'));
        }

        return true;
    }
}