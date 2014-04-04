<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*	Copyright © 2011 Mendelev Valentin
*	vmnotathome@gmail.com
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/

/**
 * Обрабатывает авторизацию через OpenId
 *
 */
class PluginAutoopenid_ActionLogin extends ActionPlugin {		
	/**
	 * Инициализация 
	 *
	 * @return null
	 */
	public function Init() {
		/**
		 * Не пускаем авторизованных
		 */
		if ($this->User_IsAuthorization()) {
			$this->Message_AddErrorSingle($this->Lang_Get('registration_is_authorization'),$this->Lang_Get('attention'));
			return Router::Action('error'); 
		}
		$this->Viewer_Assign('sTemplateWebPathPlugin',Plugin::GetTemplateWebPath(__CLASS__));
	}
	
	protected function RegisterEvent() {
		$this->AddEventPreg('/^login$/i','/^$/i','EventLogin');
		$this->AddEventPreg('/^login$/i','/^enter$/i','/^(finish)?$/i','EventOpenId');
		$this->AddEventPreg('/^login$/i','/^data$/i','/^$/i','EventData');
		$this->AddEventPreg('/^login$/i','/^vk$/i','/^$/i','EventVk');
		$this->AddEventPreg('/^login$/i','/^fb$/i','/^$/i','EventFacebook');
		$this->AddEventPreg('/^login$/i','/^twitter$/i','/^$/i','EventTwitter');
		$this->AddEventPreg('/^login$/i','/^confirm$/i','/^$/i','EventConfirmMail');
	}
		
	
	/**********************************************************************************
	 ************************ РЕАЛИЗАЦИЯ ЭКШЕНА ***************************************
	 **********************************************************************************
	 */
	
	/**
	 * Отображение формы ввода Openid
	 *
	 */
	protected function EventLogin() {
		/**
		 * Устанавливаем шаблон вывода
		 */
		$this->SetTemplateAction('index');
	}
	
	/**
	 * Подтверждение email для связи с OpenId
	 */
	protected function EventConfirmMail() {
		/**
		 * Проверяем валидность ключа подтверждения почты
		 */
		if (!($oKey=$this->PluginAutoopenid_Openid_GetTmpByConfirmMailKey(getRequest('confirm_key')))) {
			$this->Message_AddErrorSingle($this->Lang_Get('plugin.autoopenid.openid_confirm_mail_key_no_valid'));
			return Router::Action('error');
		}
		
		/**
		 * Если пользователь подтвердил связь с Openid
		 */
		if (getRequest('submit_confirm',null,'post')) {
			$this->Security_ValidateSendForm();
			/**
			 * А не занят ли уже Openid?
			 */
			if ($this->PluginAutoopenid_Openid_GetOpenId($oKey->getOpenid())) {
				$this->Message_AddErrorSingle($this->Lang_Get('plugin.autoopenid.openid_confirm_mail_busy'));
				return Router::Action('error');
			}
			/**
			 * Не занят ли адрес электронной почты
			 */
			if (!($oUser=$this->User_GetUserByMail($oKey->getConfirmMail()))) {
				$this->Message_AddErrorSingle($this->Lang_Get('password_reminder_bad_email'));
				return Router::Action('error');
			}
			/**
			 * Привязываем OpenId к аккаунту
			 */
			$oOpenId=Engine::GetEntity('PluginAutoopenid_Openid');
			$oOpenId->setUserId($oUser->getId());
			$oOpenId->setOpenid($oKey->getOpenid());
			$oOpenId->setDate(date("Y-m-d H:i:s"));
			$this->PluginAutoopenid_Openid_AddOpenId($oOpenId);
			/**
			 * Удаляем временные данные
			 */
			$this->PluginAutoopenid_Openid_DeleteTmp($oKey->getKey());
			setcookie('openidkey','',1,Config::Get('sys.cookie.path'),Config::Get('sys.cookie.host'));
			/**
			 * Авторизуем
			 */
			$this->User_Authorization($oUser);
			$this->_goBack();
//			Router::Location(Config::Get('path.root.web').'/');
			
		/**
		 * Если пользователь отказался подтверждать связь с Openid
		 */
		} elseif (getRequest('submit_cancel',null,'post')) {
			$this->Security_ValidateSendForm();
			/**
			 * Удаляем временные данные
			 */
			$this->PluginAutoopenid_Openid_DeleteTmp($oKey->getKey());
			Router::Location(Config::Get('path.root.web').'/');
		}
		/**
		 * Отображаем форму подтверждения
		 */
		$this->Viewer_Assign('oKey',$oKey);
		/**
		 * Загружаем в шаблон e-mail полученный от OpenID провайдера
		 */
		if ($aData=@unserialize($oKey->getData()) and is_array($aData)) {
			if (isset($aData['mail'])) {
				$this->Viewer_Assign('sMailOpenId',$aData['mail']);
			}
		}
		$this->SetTemplateAction('confirm_mail');
	}
	
	/**
	 * Обработка дополнительных данных
	 *
	 */
	
	
	
	
	
	protected function rus2translit($string) {
		$converter = array(
			'а' => 'a',   'б' => 'b',   'в' => 'v',
			'г' => 'g',   'д' => 'd',   'е' => 'e',
			'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
			'и' => 'i',   'й' => 'y',   'к' => 'k',
			'л' => 'l',   'м' => 'm',   'н' => 'n',
			'о' => 'o',   'п' => 'p',   'р' => 'r',
			'с' => 's',   'т' => 't',   'у' => 'u',
			'ф' => 'f',   'х' => 'h',   'ц' => 'c',
			'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
			'ь' => '',  'ы' => 'y',   'ъ' => '',
			'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
			
			'А' => 'A',   'Б' => 'B',   'В' => 'V',
			'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
			'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
			'И' => 'I',   'Й' => 'Y',   'К' => 'K',
			'Л' => 'L',   'М' => 'M',   'Н' => 'N',
			'О' => 'O',   'П' => 'P',   'Р' => 'R',
			'С' => 'S',   'Т' => 'T',   'У' => 'U',
			'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
			'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
			'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
			'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
		);
		return strtr($string, $converter);
	}
	
	public function mUploadAvatar($aFile,$oUser) {

		if(!is_array($aFile) || !isset($aFile['tmp_name'])) {
//echo "1";

			return false;
		}
		
		$sFileTmp=Config::Get('sys.cache.dir').func_generator();
		if (!copy($aFile['tmp_name'],$sFileTmp)) {
//echo "2";
			return false;
		}else{
			unlink($aFile['tmp_name']);
		}
		$sPath = $this->Image_GetIdDir($oUser->getId());
		$aParams=$this->Image_BuildParams('avatar');
//print_r($aParams);
//exit();
		/**
		 * Срезаем квадрат
		 */
		$oImage = new LiveImage($sFileTmp);

		/**
		 * Если объект изображения не создан, 
		 * возвращаем ошибку
		 */
		if($sError=$oImage->get_last_error()) {
			// Вывод сообщения об ошибки, произошедшей при создании объекта изображения
			// $this->Message_AddError($sError,$this->Lang_Get('error'));
			@unlink($sFileTmp);
			return false;
		}
		
		$oImage = $this->Image_CropSquare($oImage);		
		$oImage->set_jpg_quality($aParams['jpg_quality']);
		$oImage->output(null,$sFileTmp);
		
		if ($sFileAvatar=$this->Image_Resize($sFileTmp,$sPath,'avatar_100x100',Config::Get('view.img_max_width'),Config::Get('view.img_max_height'),100,100,false,$aParams)) {			
			$aSize=Config::Get('module.user.avatar_size');
			foreach ($aSize as $iSize) {
				if ($iSize==0) {
					$this->Image_Resize($sFileTmp,$sPath,'avatar',Config::Get('view.img_max_width'),Config::Get('view.img_max_height'),null,null,false,$aParams);
				} else {
					$this->Image_Resize($sFileTmp,$sPath,"avatar_{$iSize}x{$iSize}",Config::Get('view.img_max_width'),Config::Get('view.img_max_height'),$iSize,$iSize,false,$aParams);
				}
			}
			@unlink($sFileTmp);
			/**
			 * Если все нормально, возвращаем расширение загруженного аватара
			 */
			return $this->Image_GetWebPath($sFileAvatar);
		}
		@unlink($sFileTmp);
		/**
		 * В случае ошибки, возвращаем false
		 */
		return false;
	}	
	
	
	protected function EventData() {
		$this->SetTemplateAction('data');

		/**
		 * Проверяем наличие временного ключа в куках
		 */
		$bKeyValid=false;
		if (isset($_COOKIE['openidkey']) and $sKey=$_COOKIE['openidkey']) {
			if ($oKey=$this->PluginAutoopenid_Openid_GetTmp($sKey)) {
				if (strtotime($oKey->getDate())>=time()-Config::Get('plugin.autoopenid.time_key_limit')) {
					// ключ валиден
					$bKeyValid=true;					
				}
			}
		}
		
		/**
		 * Если ключ не валиден
		 */
		if (!$bKeyValid) {
			$this->Message_AddErrorSingle($this->Lang_Get('plugin.autoopenid.openid_key_no_valid'));
			return Router::Action('error');
		}		
		/**
		 * Если есть связь с OpenId, то авторизуем
		 */
		if ($oUser=$this->PluginAutoopenid_Openid_GetUserByOpenId($oKey->getOpenid())) {
			$this->User_Authorization($oUser);
			$this->_goBack();
//			Router::Location(Config::Get('path.root.web').'/');
			exit();
		}
		
		/**
		 * Устанавливаем дефолтное значение полей
		 */
		
		$aData=unserialize($oKey->getData());
		if (!getRequest('submit_data',null) and !getRequest('submit_mail',null)) {
			if (is_array($aData)) {
				if (isset($aData['login'])) {
					$_REQUEST['login']=$aData['login'];
				}
				if (isset($aData['mail'])) {
					$_REQUEST['mail']=$aData['mail'];
				}
			}
		}		 
		if ( $bKeyValid ) {
			
			$use_at = (@$aData['login']) ?Config::Get('plugin.autoopenid.auth_type'):0;
			$use_at = (getRequest('submit_mail',null))?0:$use_at;			
			$use_same_window = 1;

		}

		/**
		 * Отправили форму с даными для нового пользователя
		 */
		if ( (getRequest('submit_data',null)) || ($use_at) ){
			//$login_tmp = ($use_at)?$str:getRequest('login');
			$login_tmp = $_REQUEST['login'];

			$bError=false;
			/**
			 * Проверка логина
			 */
			if (!$this->User_CheckLogin($login_tmp)) {
				$this->Message_AddError($this->Lang_Get('registration_login_error'),$this->Lang_Get('error'));
				$bError=true;
			}
			/**
			 * Проверка занятости логина
			 */
			if (!$bError) {
				if ($this->User_GetUserByLogin($login_tmp)) {
					$this->Message_AddError($this->Lang_Get('registration_login_error_used'),$this->Lang_Get('error'));
					$bError=true;
				}
			}
			/**
			 * Проверка почты
			 */
			if (!$use_at){
				if ((Config::Get('plugin.autoopenid.mail_required') or (!Config::Get('plugin.autoopenid.mail_required') and getRequest('mail')) ) and !func_check(getRequest('mail'),'mail')) {
					$this->Message_AddError($this->Lang_Get('registration_mail_error'),$this->Lang_Get('error'));
					$bError=true;
				}
			}else{
				
				if (Config::Get('plugin.autoopenid.mail_required') and !func_check(getRequest('mail'),'mail')) {
					$this->Message_AddError($this->Lang_Get('registration_mail_error'),$this->Lang_Get('error'));
					$bError=true;
				}
				
				
			}
			/**
			 * Проверка занятости почты
			 */
			if (!$bError) {
				if (getRequest('mail') and $this->User_GetUserByMail(getRequest('mail'))) {
					$this->Message_AddError($this->Lang_Get('registration_mail_error_used'),$this->Lang_Get('error'));
					$bError=true;
				}
			}
			/**
			 * Если всё ок
			 */
			if (!$bError) {
				/**
				 * Создаем пользователя
				 */
				$oUser=Engine::GetEntity('User');
				$oUser->setLogin($login_tmp);
				$sPassword='';
				if (getRequest('mail')) {
					$oUser->setMail(getRequest('mail'));					
					$sPassword=func_generator(7);
					$oUser->setPassword(func_encrypt($sPassword));
					$oUser->setSettingsNoticeNewTopic( 1 );
					$oUser->setSettingsNoticeNewComment( 1 );
					$oUser->setSettingsNoticeNewTalk( 1 );
					$oUser->setSettingsNoticeNewFriend( 1 );
					$oUser->setSettingsNoticeReplyComment( 1 );		
				} else {
					$oUser->setMail(null);
					$sPassword=func_generator(7);
					$oUser->setPassword(func_encrypt($sPassword));
				}				
				$oUser->setDateRegister(date("Y-m-d H:i:s"));
				$oUser->setIpRegister(func_getIp());

				$oUser->setActivate( (int)Config::Get("plugin.autoopenid.mark_as_activated") );
				$oUser->setActivateKey(null);				

		

				
				/**
				 * Регистрируем
				 */

				if ($this->User_Add($oUser)) {
					/**
					 * Отправляем уведомление если есть пароль
					 */
//					if ($oUser->getPassword()) {
					if (($oUser->getPassword()) && ($oUser->getMail()) )  {

						$this->Notify_SendRegistration($oUser,$sPassword);
					}
					/**
					 * Создаём связь пользователя с OpenId
					 */
					$oOpenId=Engine::GetEntity('PluginAutoopenid_Openid');
					$oOpenId->setUserId($oUser->getId());
					$oOpenId->setOpenid($oKey->getOpenid());
					$oOpenId->setDate(date("Y-m-d H:i:s"));
					@$token = $aData["at"];
					if ( is_array($token) ) {
						$secret = $token["secret"];
						$token = $token["key"];
						$oOpenId->setDataValue("token_secret", $secret);	
					}
					
					
					@$oOpenId->setToken($token);
					@$oOpenId->setDataValue("token_expires", $aData["expires"]);					


					$this->PluginAutoopenid_Openid_AddOpenId($oOpenId);
					/**
					 * Удаляем временные данные
					 */
					$this->PluginAutoopenid_Openid_DeleteTmp($oKey->getKey());
					setcookie('openidkey','',1,Config::Get('sys.cookie.path'),Config::Get('sys.cookie.host'));
					/**
					 * Авторизуем
					 */
					$this->User_Authorization($oUser,true);
//exit();
					if (!$use_same_window) {
						ob_start();
						echo "<html><head></head><body><div id='progressbar' style='width: 100%; height: 100%; text-align: center; padding-top: 10%;'>Получение данных...</div>";
						ob_flush();
							
					}
					if (@$aData['gender']== "male")	{
						$oUser->setProfileSex("man");
					}else{
						if (@$aData['gender']== "female") {
							$oUser->setProfileSex("woman");
						}else{
							$oUser->setProfileSex("other");
						}
					}
					if ( @$aData['avatar'] ){
						if($sPath=$this->mUploadAvatar($aData['avatar'],$oUser)) {
							$oUser->setProfileAvatar($sPath);
						}
					}
						
					@$this->User_Update($oUser);
						
					if (!$use_same_window) {
						echo "<script>window.opener.location='".Config::Get('path.root.web').'/'."';window.opener.focus();window.close();</script></head></html>";
						ob_flush();
						ob_end_clean();
						exit();
					}
						
					$this->_goBack();
//					Router::Location(Config::Get('path.root.web').'/');
				}
			}
		/**
		 * Отправили форму для существующего пользователя
		 */
		} elseif (getRequest('submit_mail',null)) {
			/**
			 * Проверяем есть ли пользователь с таким email, если есть то отправляем ему код активации текущего OpenId
			 */
			$bError=false;
			if (!func_check(getRequest('mail'),'mail')) {
				$this->Message_AddError($this->Lang_Get('registration_mail_error'),$this->Lang_Get('error'));
				$bError=true;
			}
			if (!$bError) {
				if (!($oUser=$this->User_GetUserByMail(getRequest('mail')))) {
					$this->Message_AddError($this->Lang_Get('password_reminder_bad_email'),$this->Lang_Get('error'));
					$bError=true;
				}
			}
			
			if (!$bError) {
				/**
				 * Генерируем ключь подтверждения
				 */
				$oKey->setConfirmMail($oUser->getMail());
				$oKey->setConfirmMailKey(func_generator(32));				
				$this->PluginAutoopenid_Openid_UpdateTmp($oKey);
				/**
				 * Отправляем уведомление с активацией
				 */
				$this->Notify_Send(
					$oUser,
					'notify.confirm_mail.tpl',
					$this->Lang_Get('plugin.autoopenid.openid_confirm_mail_subject'),
					array(
						'oKey'=>$oKey
					),
					__CLASS__
				);
				/**
				 * Показываем сообщение о том, что письмо отправлено
				 */
				$this->Message_AddErrorSingle($this->Lang_Get('plugin.autoopenid.openid_confirm_mail_send'));
				return Router::Action('error');
			}
		}
	}
	
	/**
	 * OpenId авторизация
	 *
	 */
	protected function EventOpenId() {		
		$bFinish=false;
		if ($this->GetParam(1)) {
			$bFinish=true;
		}
		/**
		 * Путь обратного редиректа с сервера OpenID
		 */
		$sPathReturn=Router::GetPath('login').'openid/enter/finish/';
		/**
		 * Если сработал редирект
		 */
		if ($bFinish) {
			/**
			 * Проверяем корректность авторизации
			 */
			if ($aReturn=$this->PluginAutoopenid_Openid_Verify($sPathReturn) and $aReturn['status']) {				
				$this->Message_AddNotice($aReturn['msg'],$this->Lang_Get('attention'));
				$sOpenId=$aReturn['id'];
				/**
				 * Небольшая страховка
				 */
				$sOpenId=preg_replace("@^vk_@i",'open_vk_',$sOpenId);
				/**
				 * Если такой open_id уже есть у пользователя то авторизуем его под ним
				 */
				if ($oUser=$this->PluginAutoopenid_Openid_GetUserByOpenId($sOpenId)) {
					$this->User_Authorization($oUser);
					$this->_goBack();					
//					Router::Location(Config::Get('path.root.web').'/');
				} else {
					/**
					 * Получаем дополнительные данные
					 */
					$aData=array();
					
					
					
					if (isset($aReturn['sreg']) and isset($aReturn['sreg']['nickname'])) {
						$aData['login']=$aReturn['sreg']['nickname'];
					}
					if (isset($aReturn['sreg']) and isset($aReturn['sreg']['email'])) {
						$aData['mail']=$aReturn['sreg']['email'];
					}
					if (isset($aReturn['ax']) and isset($aReturn['ax']['email'])) {
						$aData['mail']=$aReturn['ax']['email'];
					}
					
					if (strpos($aReturn["id"],"rambler.ru")){
						$aData['login'] = substr($aReturn["id"], strrpos($aReturn["id"],"/") +1);
						$aData['mail'] = $aData['login']."@rambler.ru";
					}
					if (strpos($aReturn["id"],"livejournal.com")){
						$aData['login'] = substr($aReturn["id"], 0, strpos($aReturn["id"],"."));
						$aData['login'] = substr($aData['login'],7);
					}

					if (strpos($aReturn["id"],"google.com")){
						$aData['login'] = substr($aData['mail'], 0, strpos($aData['mail'],"@"));
					}
					if (strpos($aReturn["id"],"id.mail.ru")){
						$aData['login'] = substr($aReturn["id"], 0, strpos($aReturn["id"],"."));
						$aData['login'] = substr($aData['login'],7);
					}
					

					/**
				 	* Заполняем временную таблицу, пишем в куки ключ и перенаправляем на страницу ввода дополнительных данных
				 	*/
					$oTmp=Engine::GetEntity('PluginAutoopenid_Openid_Tmp');
					$oTmp->setKey(func_generator(32));
					$oTmp->setOpenid($sOpenId);
					$oTmp->setData(serialize($aData));
					$oTmp->setDate(date("Y-m-d H:i:s"));
					$this->PluginAutoopenid_Openid_AddTmp($oTmp);
					
					setcookie('openidkey',$oTmp->getKey(),time()+Config::Get('plugin.autoopenid.time_key_limit'),Config::Get('sys.cookie.path'),Config::Get('sys.cookie.host'));
					Router::Location(Router::GetPath('login').'openid/data/');
				}
			} else {
				$this->Message_AddErrorSingle($aReturn['msg'],$this->Lang_Get('error'));
			}
		}
		/**
		 * Начало авторизации
		 */
		if (getRequest('submit_open_login')) {
			/**
			 * Здесь происходит редирект на сервер OpenID
			 */
			if (!$this->PluginAutoopenid_Openid_Login(getRequest('open_login'),$sPathReturn)) {
				$this->Message_AddErrorSingle($this->Lang_Get('plugin.autoopenid.openid_result_error'),$this->Lang_Get('error'));
			} 
		}
		/**
		 * Шаблон
		 */

		$this->SetTemplateAction('index');
	}
	
	/**
	 * Авторизация ВКонтакте
	 *
	 */
	protected function EventVk() {		
		

		/**
		 * Генерируем запрос
		 */
		if ( @$_REQUEST["code"] ) {
			$url = "https://api.vkontakte.ru/oauth/access_token?client_id=" . Config::Get("plugin.autoopenid.vk.id") . "&redirect_uri=".Router::GetPath('login')."openid/vk/&client_secret=" . Config::Get("plugin.autoopenid.vk.secure_key")."&code=" . $_REQUEST["code"];

			$response = json_decode (  $this->mod_file_get_contents($url) , true );
	
			if ( !@$response["access_token"] ) {
				$this->Message_AddErrorSingle($this->Lang_Get('plugin.autoopenid.openid_result_error_vk'),$this->Lang_Get('error').$response);
				Router::Location(Router::GetPath('login'));		
				return false;
			}
		
		}else{
			$this->Message_AddErrorSingle($this->Lang_Get('plugin.autoopenid.openid_result_error_vk'),$this->Lang_Get('error'));
			Router::Location(Router::GetPath('login'));		
			return false;
		}
  
  //print_r($response);


		$profile = array();	
		$profile["provider_code"] = "vk";
		$profile["id"] = "vk_".$response["user_id"];
		$vk_id = $profile["id"];
  		$sOpenId=$profile["id"];
		
		/**
		 * Если уже есть связь с этим OpenID то авторизуем
		 */
		
		if ($oUser=$this->PluginAutoopenid_Openid_GetUserByOpenId($sOpenId)) {
			
			$this->_renewToken($sOpenId, $response["access_token"], ( $response["expires_in"]?$response["expires_in"]:1000000 ) );
			$this->User_Authorization($oUser);
			$this->_goBack();
//			Router::Location(Config::Get('path.root.web').'/');
		} else {					
		/**
		 * Связи нет
		 */
			$at=$response["access_token"];
			$query = "https://api.vkontakte.ru/method/getProfiles?uid=" . $response["user_id"] . "&fields=sex,bdate,photo_big&access_token=" . $response["access_token"];
			$resp = json_decode (  $this->mod_file_get_contents ( $query ) , true );	

/*				print_r($resp);
					exit();*/
			$aData=array();
			$vkGenders=array();

			$aData["at"] = $response["access_token"];
			$aData["expires"] =  $response["expires_in"]?$response["expires_in"]:1000000;			
			
		/**
		 * Заполняем данные (логин)
		 */
			$str = $this->rus2translit($resp['response'][0]['first_name'].$resp['response'][0]['last_name']);
			$str = str_replace( " ", "", $str );
			if ($this->User_GetUserByLogin($str)) $str = $vk_id;
			$vkGenders[0] = "other";
			$vkGenders[1] = "female";
			$vkGenders[2] = "male";
			$gender = ($resp['response'][0]['sex'])?$vkGenders[$resp['response'][0]['sex']]:$vkGenders[0];
			$aData['login']=$str;
			$aData['gender']=$gender;
			if (!strpos($resp["response"][0]['photo_big'],'question')){
				if ($avatarInf = $this->SaveImgs($resp["response"][0]['photo_big'],"vk_".$vk_id)){
					$aData['avatar'] = $avatarInf;
				}
			}

		/**
		* Заполняем временную таблицу, пишем в куки ключ и перенаправляем на страницу ввода дополнительных данных
		*/
			$oTmp=Engine::GetEntity('PluginAutoopenid_Openid_Tmp');
			$oTmp->setKey(func_generator(32));
			$oTmp->setOpenid($sOpenId);
			$oTmp->setData(serialize($aData));
			$oTmp->setDate(date("Y-m-d H:i:s"));
			$this->PluginAutoopenid_Openid_AddTmp($oTmp);
					
			setcookie('openidkey',$oTmp->getKey(),time()+Config::Get('plugin.autoopenid.time_key_limit'),Config::Get('sys.cookie.path'),Config::Get('sys.cookie.host'));
			Router::Location(Router::GetPath('login').'openid/data/');				
		}

		$this->SetTemplateAction('index');
	}
	
	protected function _renewToken( $bid, $token, $expires){
	
		if ( !Config::Get("plugin.autoopenid.renew_tokens") ) return false;
	
		$oBind = $this->PluginAutoopenid_Openid_GetOpenId($bid);
		
		if ( is_array($token) ) {
			$secret = $token["secret"];
			$token = $token["key"];
			$oBind->setDataValue("token_secret", $secret);	
		}		
		
		
		
		$oBind->setToken($token);
		
		$oBind->setDataValue("token_expires", $expires);	
		return $this->PluginAutoopenid_Openid_UpdateOpenId($oBind);
	}
	
	protected function _goBack(){

/*		print_r($_COOKIE);
		exit();*/
		$url = Config::Get('path.root.web').'/';
		if ( @$_COOKIE["openid_referrer"] ){
			$url_distr = $_COOKIE["openid_referrer"];
			
			$url_mod = substr($url_distr, strlen($url));
			$action = preg_replace("/\/.*/s","",$url_mod);

			if ( !in_array( $action, Config::Get('plugin.autoopenid.stop_referrer') ) ){
				$url = $url_distr;
			}
			setcookie('openid_referrer',"",1, "/");
		}

		Router::Location($url);
	}
	
	/*
	Сохранение изображений
	*/
	protected function SaveImgs($url, $name) {		
		$fname = Config::Get("path.root.server").Config::Get("path.uploads.images")."/".$name;
		@mkdir(Config::Get("path.root.server").Config::Get("path.uploads.images"));

		@file_put_contents($fname, $this->mod_file_get_contents($url));

		if ( @filesize($fname) < 1000)  return 0;
		
		if (file_exists($fname) ) {
//			$ext = substr( $http_response_header[4], strrpos ($http_response_header[4],"."));
			$ext=".tmp";
			rename($fname,$fname.$ext);
			$res["name"] = $name.$ext;
			$res["tmp_name"] = $fname.$ext;
			return $res;
		}
		return 0;
	}
	
	
	/**
	 * Авторизация через Facebook
	 *
	 */
	protected function EventFacebook() {		
		/**
		 * Читаем куку и проверяем подпись
		 */
//		$sCookieName='fbs_'.Config::Get('plugin.autoopenid.fb.id');
		
		require_once(Plugin::GetPath(__CLASS__).'classes/lib/external/facebook.php');

		$facebook = new Facebook(array(
		  'appId'  => Config::Get('plugin.autoopenid.fb.id'),
		  'secret' => Config::Get('plugin.autoopenid.fb.secret'),
		  'cookie' => true,
		));
		
		$sUrl = 'https://graph.facebook.com/oauth/access_token?client_id='.Config::Get('plugin.autoopenid.fb.id').'&redirect_uri='.Router::GetPath('login').'openid/fb/'.'&client_secret='.Config::Get('plugin.autoopenid.fb.secret').'&code='.getRequest("code");
		$sResponse =   $this->mod_file_get_contents($sUrl);
		$me = null;
		if ( !strpos($sResponse,"error") ){ 
			preg_match_all("/(?<==)[^&]+/",  $sResponse,   $out, PREG_PATTERN_ORDER);
			$at = isset($out[0][0])?$out[0][0]:$out[0];
			$tExpires = isset($out[0][1])?$out[0][1]:1000000;
			$facebook->setAccessToken($at);
		// Session based API call.
			$uid = $facebook->getUser();
			$me = $facebook->api('/me');

		}else{
			$this->Message_AddError("Problems with fb auth have occured",$this->Lang_Get('error'));
		}
		
		if ($me){
//			print_r($me);
			$sOpenId='fb_'.$uid;
			if ($oUser=$this->PluginAutoopenid_Openid_GetUserByOpenId($sOpenId)) {
				$this->_renewToken($sOpenId, $at, $tExpires );
				$this->User_Authorization($oUser);
				$this->_goBack();
//				Router::Location(Config::Get('path.root.web').'/');
				exit();
			} else {					
				/**
			 	* Заполняем временную таблицу, пишем в куки ключ и перенаправляем на страницу ввода дополнительных данных
			 	*/
				$str = $this->rus2translit($me['name']);
				$str = str_replace( " ", "", $str );
				if ($this->User_GetUserByLogin($str)) $str = "fb_".$uid;
				$aData['login']=$str;
				$aData['gender']=$me['gender'];
				if ($avatarInf = $this->SaveImgs("https://graph.facebook.com/".$uid."/picture?type=large", "fb_".$uid."_large")){
					$aData['avatar'] = $avatarInf;
				}
						
				$aData["at"] = $at;
				$aData["expires"] = $tExpires;
				$aData["mail"] = @$me["email"];
				
				$oTmp=Engine::GetEntity('PluginAutoopenid_Openid_Tmp');
				$oTmp->setKey(func_generator(32));
				$oTmp->setOpenid($sOpenId);
				$oTmp->setData(serialize($aData));
				$oTmp->setDate(date("Y-m-d H:i:s"));
				$this->PluginAutoopenid_Openid_AddTmp($oTmp);
				
				setcookie('openidkey',$oTmp->getKey(),time()+Config::Get('plugin.autoopenid.time_key_limit'),Config::Get('sys.cookie.path'),Config::Get('sys.cookie.host'));
				Router::Location(Router::GetPath('login').'openid/data/');				

			}
		}else{
			$this->Message_AddError("Problems with fb auth have occured",$this->Lang_Get('error'));
//			echo "something is wrong (";
			//echo "<script>window.opener.location='".Config::Get('path.root.web').'/'."';window.opener.focus();window.close();</script>";
			
		}
		
		
		

		$this->SetTemplateAction('index');
/*			echo "we are done";
			exit();*/

	
	}
	
	/**
	 * Авторизация через Twitter
	 *
	 */
	protected function EventTwitter() {
		
		if (getRequest('callback')) {
			if ($this->PluginAutoopenid_Oauth_VerifyTwitter() and $data=$this->PluginAutoopenid_Oauth_GetTwitter('account/verify_credentials')) {
											
				$token=$this->PluginAutoopenid_Oauth_GetTokens();
				$sOpenId='twitter_'.$data->screen_name;
				
				/**
				 * Если уже есть связь с этим OpenID то авторизуем
				 */
				if ($oUser=$this->PluginAutoopenid_Openid_GetUserByOpenId($sOpenId)) {
					$this->User_Authorization($oUser);
					$this->_renewToken($sOpenId, $token, time()+10000000 );						
					$this->_goBack();
//					Router::Location(Config::Get('path.root.web').'/');
				} else {					
					/**
					 * Связи нет
					 */
					$aData=array();
					$aData["at"] = $token;
					$aData["expires"] = '';						
					
					/**
					 * Заполняем данные (логин)
					 */
					
					$str = $this->rus2translit($data->screen_name);
					$str = str_replace( " ", "", $str );
					if ($this->User_GetUserByLogin($str)) $str = "twitter_".$data->id_str;
					$aData['login']=$str;
					$aData['gender']="other";
					if (!strpos($data->profile_image_url,'default_profile_')){
					$profile_image_url = str_replace("_normal.", "_bigger.", $data->profile_image_url);
						if ($avatarInf = $this->SaveImgs($profile_image_url,"tw_".$data->id_str)){
							$aData['avatar'] = $avatarInf;
						}
					}
/*					
					print_r($data);
					echo "<br><br>";
					print_r($aData);
					
					exit();
*/					
					/**
				 	* Заполняем временную таблицу, пишем в куки ключ и перенаправляем на страницу ввода дополнительных данных
				 	*/
					$oTmp=Engine::GetEntity('PluginAutoopenid_Openid_Tmp');
					$oTmp->setKey(func_generator(32));
					$oTmp->setOpenid($sOpenId);
					$oTmp->setData(serialize($aData));
					$oTmp->setDate(date("Y-m-d H:i:s"));
					$this->PluginAutoopenid_Openid_AddTmp($oTmp);
					
					setcookie('openidkey',$oTmp->getKey(),time()+Config::Get('plugin.autoopenid.time_key_limit'),Config::Get('sys.cookie.path'),Config::Get('sys.cookie.host'));
					Router::Location(Router::GetPath('login').'openid/data/');				
				}
				
				
			} else {
				$this->Message_AddErrorSingle($this->Lang_Get('plugin.autoopenid.openid_result_error_twitter'),$this->Lang_Get('error'));
			}
		}		
		
		if (getRequest('authorize')) {
			if (!$this->PluginAutoopenid_Oauth_LoginTwitter(Router::GetPath('login').'openid/twitter/?callback=1')) {
				$this->Message_AddErrorSingle($this->Lang_Get('plugin.autoopenid.openid_result_error_twitter'),$this->Lang_Get('error'));
			} 
		}
		
		$this->SetTemplateAction('index');
	}
	
	protected function mod_file_get_contents( $url ){
	
		if ( Config::Get("plugin.autoopenid.use_curl") ){
			$ch = curl_init($url);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
			
			$res = @curl_exec($ch);

			curl_close($ch);
		
		}else{
			$res =  file_get_contents($url);
		}	
	
		return $res;
	}
	
}
?>