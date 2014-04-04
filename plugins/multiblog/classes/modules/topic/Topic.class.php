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

class PluginMultiblog_ModuleTopic extends PluginMultiblog_Inherit_ModuleTopic
{
    protected $aMultiblogs = null;

    public function Init(){
        parent::Init();
        $this->aMultiblogs = array();
    }

    public function SetMultiblogs($aBlogs,$iBlogId){
        if($aBlogs){
            $this->aMultiblogs = $aBlogs;
        } else {
            $this->aMultiblogs = $iBlogId;
        }
    }

    /*public function UpdateTopic($oTopic){
        if(parent::UpdateTopic($oTopic)){
            if($this->aMultiblogs){
                $this->PluginMultiblog_Multiblog_SaveMultiblog($oTopic,$this->aMultiblogs);
                foreach($this->aMultiblogs as $iBlog){
                    $this->Blog_RecalculateCountTopicByBlogId($iBlog);
                }
            }
            return true;
        }
        return false;
    }*/
    
    public function UpdateTopic(ModuleTopic_EntityTopic $oTopic){
        if(parent::UpdateTopic($oTopic)){
            if($this->aMultiblogs){
                $this->PluginMultiblog_Multiblog_SaveMultiblog($oTopic,$this->aMultiblogs);
                foreach($this->aMultiblogs as $iBlog){
                    $this->Blog_RecalculateCountTopicByBlogId($iBlog);
                }
            }
            return true;
        }
        return false;
    }
}
?>