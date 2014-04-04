<?php
/*-------------------------------------------------------
*
*	Plugin "Ajaxload"
*	Author: Vladimir Yuriev (extravert)
*	Site: lsmods.ru
*	Contact e-mail: support@lsmods.ru
*
---------------------------------------------------------
*/

class PluginAjaxload_ActionAjax extends PluginAjaxload_Inherit_ActionAjax {

    protected function RegisterEvent() {
		parent::RegisterEvent();
		$this->AddEvent('ajaxloadtopic','EventAjaxTopicList');
        $this->AddEvent('ajaxloadpeople','EventAjaxUserList');
        $this->AddEvent('ajaxloadcomment','EventAjaxComments');
        $this->AddEvent('ajaxloadblogs','EventAjaxBlogList');
	}
		
    public function EventAjaxComments(){

        if (!Config::Get('module.comment.use_nested') or !Config::Get('module.comment.nested_per_page')) {
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
            return;
        }

        require_once Config::Get('path.root.engine').'/lib/external/XXTEA/encrypt.php';

        if (!getRequest('ipage') || !is_numeric(getRequest('ipage')) || !getRequest('sFilter')) {
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
            return;
        }

        $aFilter=unserialize(xxtea_decrypt(base64_decode(rawurldecode(getRequest('sFilter'))), Config::Get('plugin.ajaxload.pass')));

        if(is_array($aFilter)){

            $iPage=(int)getRequest('ipage');
            $aReturn=$this->Comment_GetCommentsByTargetId($aFilter['id'],$aFilter['type'],$iPage,Config::Get('module.comment.nested_per_page'));

            if(count($aReturn['comments'])){
                $oViewerLocal=$this->Viewer_GetLocalViewer();
                $oViewerLocal->Assign('aComments',$aReturn['comments']);
                $oViewerLocal->Assign('oUserCurrent',$this->oUserCurrent);
                $this->Viewer_AssignAjax('sText',$oViewerLocal->Fetch(Plugin::GetTemplatePath(__CLASS__)."list_comments.tpl",'ajaxload'));
            }

            $this->Viewer_AssignAjax('iCount',count($aReturn['comments']));
        } else {
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
            return;
        }

    }


    public function EventAjaxTopicList(){
        
        require_once Config::Get('path.root.engine').'/lib/external/XXTEA/encrypt.php';
        
        if (!getRequest('ipage') || !is_numeric(getRequest('ipage')) || !getRequest('sFilter')) {			
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
            return;
		}
        
        $aFilter=unserialize(xxtea_decrypt(base64_decode(rawurldecode(getRequest('sFilter'))), Config::Get('plugin.ajaxload.pass')));
        
        if(is_array($aFilter)){
            $aTopics=$this->Topic_GetTopicsByFilter($aFilter,getRequest('ipage'),Config::Get('module.topic.per_page'));
            if(count($aTopics['collection'])){
                $oViewerLocal=$this->Viewer_GetLocalViewer();
				$oViewerLocal->Assign('aTopics',$aTopics['collection']);
                $oViewerLocal->Assign('oUserCurrent',$this->oUserCurrent);
                $this->Viewer_AssignAjax('sText',$oViewerLocal->Fetch("topic_list.tpl"));
            } 
            
            $this->Viewer_AssignAjax('iCount',count($aTopics['collection']));
        } else {
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
            return;
        }
        
    }
	public function EventAjaxUserList(){
        
        if (!getRequest('ipage') || !is_numeric(getRequest('ipage')) || !getRequest('sFilter') || !in_array(getRequest('sFilter'), array('index','city','country','prof'))) {
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
            return;
		}
		
		//Список по городу
        if(getRequest('sFilter')=='city') {
            if (!($oCity=$this->Geo_GetCityById(getRequest('param')))) {
                $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
                return;
            }
            $aResult=$this->Geo_GetTargets(array('city_id'=>$oCity->getId(),'target_type'=>'user'),getRequest('ipage'),Config::Get('module.user.per_page'));
        }
        
        //Список по стране
        if(getRequest('sFilter')=='country') {
            if (!($oCountry=$this->Geo_GetCountryById(getRequest('param')))) {
                $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
                return;
            }
            $aResult=$this->Geo_GetTargets(array('country_id'=>$oCountry->getId(),'target_type'=>'user'),getRequest('ipage'),Config::Get('module.user.per_page'));
        }


		//Список юзеров по рейтингу
        if(getRequest('sFilter')=='index') {
			if(!getRequest('param')){
				$this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
                return;
			}
			require_once Config::Get('path.root.engine').'/lib/external/XXTEA/encrypt.php';

			$aFilter=unserialize(xxtea_decrypt(base64_decode(rawurldecode(getRequest('param'))), Config::Get('plugin.ajaxload.pass')));
			
			/**
			* По какому полю сортировать
			*/
			$sOrder='user_rating';
			if ($aFilter['order']) {
				$sOrder=$aFilter['order'];
				unset($aFilter['order']);
			}
			/**
			* В каком направлении сортировать
			*/
			$sOrderWay='desc';
			if ($aFilter['way']) {
				$sOrderWay=$aFilter['way'];
				unset($aFilter['way']);
			}

			$aResult=$this->User_GetUsersByFilter($aFilter,array($sOrder=>$sOrderWay),getRequest('ipage'),Config::Get('module.user.per_page'));
			//var_dump($aResult);
        }

        //список юзеров по профессиям
        if(getRequest('sFilter')=='prof') {
            if(!getRequest('param')){
                $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
                return;
            }
            if (!($oProf=$this->PluginProf_Prof_GetProfByName(urldecode(getRequest('param'))))) {
                $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
                return;
            }
            /**
             * Получаем список юзеров
             */
            $aResult=$this->PluginProf_Prof_GetUsersByProf($oProf->getProfName(),getRequest('ipage'),Config::Get('module.user.per_page'));
        }


        //обрабатываем и выводим полученные данные

		if(count($aResult['collection'])){
			$aUsersId=array();
			foreach($aResult['collection'] as $oTarget) {
				if(getRequest('sFilter')!='index' && getRequest('sFilter')!='prof'){
					$aUsersId[]=$oTarget->getTargetId();
				}else{
					$aUsersId[]=$oTarget->getUserId();
				}
			}
			$aUsers=$this->User_GetUsersAdditionalData($aUsersId);

            $oViewerLocal=$this->Viewer_GetLocalViewer();
            $oViewerLocal->Assign('aUsers',$aUsers);
            $oViewerLocal->Assign('oUserCurrent',$this->oUserCurrent);
            $this->Viewer_AssignAjax('sText',$oViewerLocal->Fetch(Plugin::GetTemplatePath(__CLASS__)."list_people.tpl",'ajaxload'));
        }
		
        $this->Viewer_AssignAjax('iCount',count($aResult['collection']));
        
    }
    
    public function EventAjaxBlogList() {
        
        if (!getRequest('ipage') || !is_numeric(getRequest('ipage')) || !getRequest('sFilter')) {			
            $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
            return;
		}
		
		if(!getRequest('param')){
			$this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
			return;
		}

		require_once Config::Get('path.root.engine').'/lib/external/XXTEA/encrypt.php';

		$aFilter=unserialize(xxtea_decrypt(base64_decode(rawurldecode(getRequest('param'))), Config::Get('plugin.ajaxload.pass')));

		/**
		* По какому полю сортировать
		*/
		$sOrder='user_rating';
		if ($aFilter['order']) {
			$sOrder=$aFilter['order'];
			unset($aFilter['order']);
		}
		/**
		* В каком направлении сортировать
		*/
		$sOrderWay='desc';
		if ($aFilter['way']) {
			$sOrderWay=$aFilter['way'];
			unset($aFilter['way']);
		}
		
		$aResult=$this->Blog_GetBlogsByFilter($aFilter,array($sOrder=>$sOrderWay),getRequest('ipage'),Config::Get('module.blog.per_page'));
		
        if(count($aResult['collection'])){
            $oViewerLocal=$this->Viewer_GetLocalViewer();
            $oViewerLocal->Assign('aBlogs',$aResult['collection']);
            $oViewerLocal->Assign('oUserCurrent',$this->oUserCurrent);
            
            $this->Viewer_AssignAjax('sText',$oViewerLocal->Fetch(Plugin::GetTemplatePath(__CLASS__)."blog_list.tpl",'ajaxload'));
        }
        
        $this->Viewer_AssignAjax('iCount',count($aResult['collection']));
    }
}
?>