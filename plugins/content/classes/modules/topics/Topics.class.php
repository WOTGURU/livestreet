<?php

class PluginContent_ModuleTopics extends Module {
    
	public function Init()
		{
		}
      
    public function AddTopics($aContent, $sBligId) 
		{
			if($aContent){
				foreach($aContent as $sNode)
					{
					if ($oTopicEquivalent=$this->Topic_GetTopicUnique(1,md5(trim($sNode['description'])))) continue;
					$oTopic=Engine::GetEntity('Topic');								
					$oTopic->setBlogId((int)$sBligId);
					$oTopic->setTitle(trim($sNode['title']));
					$oTopic->setTags(trim($sNode['category']));
					$oTopic->setUserId("1");
					$oTopic->setType('topic');
					$oTopic->setDateAdd(date("Y-m-d H:i:s"));
					$oTopic->setUserIp(func_getIp());
								
					list($sTextShort,$sTextNew,$sTextCut) = $this->Text_Cut(trim($sNode['description']));
								
					$oTopic->setCutText(trim($sTextCut));
					$oTopic->setText($this->Text_Parser($sTextNew));
					$oTopic->setTextShort($this->Text_Parser($sTextShort));
								
					$oTopic->setTextHash(md5(trim($sNode['description'])));
					$oTopic->setTextSource(trim($sNode['description']));
								
					$oTopic->setPublish(1);
					$oTopic->setPublishDraft(1);
					$oTopic->setPublishIndex(1);
					$oTopic->setForbidComment(0);
					
					$this->Topic_AddTopic($oTopic);				
					}
				return true;
			}
			else
			{
				return false;
			}
		}
		
    public function Shutdown() 
		{
                
        }
}
?>