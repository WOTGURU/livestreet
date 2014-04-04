<?php
error_reporting(E_ERROR);
/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
	die('Hacking attempt!');
}

class PluginContent_ActionFeed extends ActionPlugin {

		protected $aBlogs = array();
		protected $sBlogId='';
		protected $aRssFeed = array();
		protected $sFilePath ='';
		
        public function Init() { 

			$this->SetDefaultEvent('');
			$this->Viewer_AddHtmlTitle($this->Lang_Get('plugin.content.plugin_content_html_title'));
			/**/
			$this->oUserCurrent=$this->User_GetUserCurrent();
			if (!$this->oUserCurrent or !$this->oUserCurrent->isAdministrator()) {			
				return $this->EventNotFound();
			}			
        }
        /**
         * Регистрация евентов
         *
         */
        protected function RegisterEvent() {
                $this->AddEvent('','EventAdd');
        }

        
        /**********************************************************************************
         ************************ РЕАЛИЗАЦИЯ ЭКШЕНА ***************************************
         **********************************************************************************
         */
        
        /*
         * Реализация евента
         */
        protected function EventAdd() {
		if (isPost('go'))
			{
				$this->Security_ValidateSendForm();		
				if(func_check(getRequest('go',null,'post'),'text') && (func_check(getRequest('blog_id',null,'post'),'id')))
				{
					$this->sBlogId = getRequest('blog_id',null,'post');		
					if(!getRequest('rss',null,'post') && func_check($_FILES['import_file']['tmp_name'],'text')){
						$this->sFilePath = $_FILES['import_file']['tmp_name'];
					}
					elseif(func_check(getRequest('rss',null,'post'),'text') && !$_FILES['import_file']['tmp_name']){
						$this->sFilePath = getRequest('rss',null,'post');
					}
					else $this->Message_AddError($this->Lang_Get('plugin.content.select_the_source'));
					$this -> aRssFeed = $this->PluginContent_Xml_RsstoArray($tag = 'item',
																			$array = array('title','description','category'),
																			$url = $this->sFilePath);
					if(!$this->PluginContent_Topics_AddTopics($this->aRssFeed,$this->sBlogId))
						{
							$this->Message_AddError($this->Lang_Get('plugin.content.topics_have_not_been_published'));
						}else{
							$this->Message_AddNotice($this->Lang_Get('plugin.content.topics_successfully_published'));
						};				
				}
				
			}
			$this->SetTemplateAction('content');
		}
		
		
        /**
         * При завершении экшена загружаем переменные в шаблон
         *
         */		 
		 
        public function EventShutdown() {
			$this->aBlogs=$this->Blog_GetBlogs();
			$this->Viewer_Assign('aBlogs',$this->aBlogs);
        }
}