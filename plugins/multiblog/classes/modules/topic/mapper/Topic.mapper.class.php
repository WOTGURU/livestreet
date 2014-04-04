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

class PluginMultiblog_ModuleTopic_MapperTopic extends PluginMultiblog_Inherit_ModuleTopic_MapperTopic
{
    protected function buildFilter($aFilter){
        if(isset($aFilter['blog_id'])){
            $aBlogids = $aFilter['blog_id'];
            unset($aFilter['blog_id']);
            if(isset($aFilter['blog_type']) && (false !== ($ikey = array_search('company',$aFilter['blog_type'])))){
               $aFilter['blog_type'][] = 'open';
            }
            $sWhere = parent::buildFilter($aFilter);
            $aFilter['blog_id'] = $aBlogids;
            if (isset($aFilter['blog_id'])) {
                if(!is_array($aFilter['blog_id'])) {
                    $aFilter['blog_id']=array($aFilter['blog_id']);
                }
                $sWhere.=" AND (
                    (t.blog_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog1_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog2_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog3_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog4_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog5_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog6_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog7_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog8_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog9_id IN ('".join("','",$aFilter['blog_id'])."')) OR
                    (t.blog10_id IN ('".join("','",$aFilter['blog_id'])."')))";
            }
        } else {
            $sWhere = parent::buildFilter($aFilter);
        };
        return $sWhere;
    }
}
?>