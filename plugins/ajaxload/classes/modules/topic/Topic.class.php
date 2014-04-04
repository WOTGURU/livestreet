<?php
/*-------------------------------------------------------
*
*	Plugin Ajaxload
*	Author: Vladimir Yuriev ( extravert )
*	Contact e-mail: support@lsmods.ru
*	Site: http://lsmods.ru
*
*/
class PluginAjaxload_ModuleTopic extends PluginAjaxload_Inherit_ModuleTopic {

    public function GetTopicsByFilter($aFilter,$iPage=0,$iPerPage=0,$aAllowData=array('user'=>array(),'blog'=>array('owner'=>array(),'relation_user'),'vote','favourite','comment_new')) {
        
        
        if(isset($aFilter['blog_type']['close'])){
            unset($aFilter['blog_type']['close']);
        }
        
        $s=serialize($aFilter);
        
        require_once Config::Get('path.root.engine').'/lib/external/XXTEA/encrypt.php';
        
        $sAjaxLoadFilter=rawurlencode(base64_encode(xxtea_encrypt($s, Config::Get('plugin.ajaxload.pass'))));
        $this->Viewer_Assign('sAjaxLoadFilter',  $sAjaxLoadFilter);
        $this->Viewer_Assign('sAjaxLoad','topic');
        
        //var_dump();
        if($this->oUserCurrent && isset($aFilter['blog_type'])) {
			$aOpenBlogs = $this->Blog_GetAccessibleBlogsByUser($this->oUserCurrent);
			if(count($aOpenBlogs)) $aFilter['blog_type']['close'] = $aOpenBlogs;
		}
        //var_dump($aFilter);
		if (false === ($data = $this->Cache_Get("topic_filter_{$s}_{$iPage}_{$iPerPage}"))) {			
			$data = ($iPage*$iPerPage!=0) 
				? array(
						'collection'=>$this->oMapperTopic->GetTopics($aFilter,$iCount,$iPage,$iPerPage),
						'count'=>$iCount
					)
				: array(
						'collection'=>$this->oMapperTopic->GetAllTopics($aFilter),
						'count'=>$this->GetCountTopicsByFilter($aFilter)
					);
			$this->Cache_Set($data, "topic_filter_{$s}_{$iPage}_{$iPerPage}", array('topic_update','topic_new'), 60*60*24*3);
		}
		$data['collection']=$this->GetTopicsAdditionalData($data['collection'],$aAllowData);
		return $data;
        
        
    }

}
?>