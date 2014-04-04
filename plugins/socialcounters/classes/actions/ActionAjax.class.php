<?php

class PluginSocialcounters_ActionAjax extends ActionPlugin {

	public function Init()
	{

	}
	/**
	 * Регистрируем евенты
	 *
	 */
	protected function RegisterEvent() {
		$this->AddEvent('google_plus_count','GooglePlusCount');
	}


	/**********************************************************************************
	 ************************ РЕАЛИЗАЦИЯ ЭКШЕНА ***************************************
	 **********************************************************************************
	 */

	/**
	 * Подсчитываем количество голосов гугл плюс
	 */
	protected function GooglePlusCount() {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://plusone.google.com/_/+1/fastbutton?url=".$_POST['sUrl']);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_results = curl_exec ($curl);
		curl_close ($curl);
		preg_match_all('/id="aggregateCount"[^>]+>([\d]+)/', $curl_results, $aM, PREG_SET_ORDER);
		$iCount = 0;
		$this->Viewer_SetResponseAjax('json');
		if (isset($aM[0][1])){
			$iCount = intval($aM[0][1]);
		}
		$this->Viewer_AssignAjax('iCount', $iCount);
	}
}