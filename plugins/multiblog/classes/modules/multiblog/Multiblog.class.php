<?php
/* -------------------------------------------------------
 *
 *   LiveStreet (v1.0)
 *   Plugin Multiblog for liveStreet 1.0.1
 *   Copyright © 2013 1099511627776@mail.ru
 *
 * --------------------------------------------------------
 *
 *   Contact e-mail: 1099511627776@mail.ru
 *
  ---------------------------------------------------------
*/

class PluginMultiblog_ModuleMultiblog extends Module {

    protected $oMapper = null;

    public function Init(){
        $this->oMapper = Engine::GetMapper(__CLASS__, 'Multiblog');
    }

    public function SaveMultiblog($oTopic,$aBlogs){
        $this->oMapper->SaveMultiblog($oTopic,$aBlogs);
    }

    public function GetMultiblogs($oTopic){
        
        $aResult = array();
        $aIds = array();
        if($iid = $oTopic->getBlog1Id()){
            $aIds[] = $iid;
        }
        if($iid = $oTopic->getBlog2Id()){
            $aIds[] = $iid;
        }
        if($iid = $oTopic->getBlog3Id()){
            $aIds[] = $iid;
        }
        if($iid = $oTopic->getBlog4Id()){
            $aIds[] = $iid;
        }
        if($iid = $oTopic->getBlog5Id()){
            $aIds[] = $iid;
        }
        if($iid = $oTopic->getBlog6Id()){
            $aIds[] = $iid;
        }
        if($iid = $oTopic->getBlog7Id()){
            $aIds[] = $iid;
        }
        if($iid = $oTopic->getBlog8Id()){
            $aIds[] = $iid;
        }
        if($iid = $oTopic->getBlog9Id()){
            $aIds[] = $iid;
        }
        if($iid = $oTopic->getBlog10Id()){
            $aIds[] = $iid;
        }
        $aResult = $this->Blog_GetBlogsAdditionalData($aIds);
        if(count($aResult) == 0){
            $aResult[] = $this->Blog_GetBlogById($oTopic->getBlogId());
        }
        return $aResult;
    }
}
?>