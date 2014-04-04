<?php
class PluginMultiblog_HookMultiblog extends Hook {

    public function RegisterHook() {
        $this->AddHook('template_form_add_topic_topic_begin','injectMultiblog');
        $this->AddHook('template_form_add_topic_question_begin','injectMultiblog');
        $this->AddHook('template_form_add_topic_link_begin','injectMultiblog');
        $this->AddHook('template_form_add_topic_photoset_begin','injectMultiblog');

        $this->AddHook('topic_add_before','saveMultiblog');
        $this->AddHook('topic_add_after','saveMultiblog2');
        $this->AddHook('topic_edit_before','saveMultiblog');
        $this->AddHook('topic_edit_show','fillMultiblogs');
    }

    public function saveMultiblog($params){
        $aBlogs = getRequest('multiblogs');
        $iBlogId = getRequest('blog_id');
        $this->Topic_SetMultiblogs($aBlogs,$iBlogId);
    }

    public function saveMultiblog2($params){
        if($oTopic = $params['oTopic']){
            $this->Topic_UpdateTopic($oTopic);
        }
    }

    public function fillMultiblogs($params){
        $oTopic = $params['oTopic'];
        $this->Viewer_Assign('aMultiblogs',$this->PluginMultiblog_Multiblog_GetMultiblogs($oTopic));
    }

    public function injectMultiblog(){
        $oUserCurrent = $this->User_GetUserCurrent();
        $aAllowBlogs = $this->Blog_GetBlogsAllowByUser($oUserCurrent);
        $aBlogTypes = array();
        foreach($aAllowBlogs as $oBlog){
            if(!in_array($oBlog->getType(),$aBlogTypes)){
                array_push($aBlogTypes,$oBlog->getType());
            }
        }
        $this->Viewer_Assign('aBlogTypes',$aBlogTypes);
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__).'inject.multiblog.tpl');
    }

}
?>