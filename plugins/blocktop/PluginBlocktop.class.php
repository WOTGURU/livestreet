<?php
/* -------------------------------------------------------
 *   Copyright � 2011 Kulesh Uladzimir
 *   Contact e-mail: v.a.kulesh@yandex.ru
  ---------------------------------------------------------
 */

if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginBlocktop extends Plugin {

	/**
	 * ��������� �������
	 */
    public function Activate() {
		return true;
    }
	
	/**
	 * ������������� �������
	 */
	public function Init() {
		$this->Viewer_AppendStyle(Plugin::GetTemplatePath('PluginBlocktop')."css/style.css"); // ���������� CSS
	}

}
?>