<?php
/*
	Robotstxt plugin
	(P) PSNet, 2008 - 2013
	http://psnet.lookformp3.net/
	http://livestreet.ru/profile/PSNet/
	https://catalog.livestreetcms.com/profile/PSNet/
	http://livestreetguide.com/developer/PSNet/
*/

class PluginRobotstxt_HookRobotstxt extends Hook {

	public function RegisterHook () {
		$this -> AddHook ('init_action', 'InitAction');
		$this -> AddHook ('template_footer_end', 'FooterEnd');
	}

	// ---

	public function InitAction () {
		/*
		 * if 404 while trying to load action - check if that is request for robots.txt
		 */
		if (Router::GetAction () == 'error' and Router::GetActionEvent () == '404' and trim ($_SERVER ['REQUEST_URI'], '/') == 'robots.txt') {
			$this -> EchoRobotsTxt ();
			/*
			 * dont need to render empty page by viewer module - lets save server resources
			 */
			exit ();
		}
	}
	
	// ---
	
	public function EchoRobotsTxt () {
		$sRobotstxt = Config::Get ('plugin.robotstxt.Robots_Txt_Content');
		/*
		 * set needed headers
		 */
		header ($_SERVER ["SERVER_PROTOCOL"] . ' 200 OK');
		header ("Content-Type: application/force-download");
		header ("Content-Type: application/octet-stream");
		header ("Content-Type: application/download");
		header ('Last-Modified: ' . gmdate ('r', time ()));
		/*
		 * нужно считать длину всех символов, но не в мультибайтовой кодировке,
		 * т.к. тогда часть данных будет обрезана т.к. фактически длина данных больше чем указано при ипользовании ф-й mb_
		 */
		//header ('Content-Length: ' . mb_strlen ($sRobotstxt, 'utf-8'));
		header ('Content-Length: ' . strlen ($sRobotstxt));
		header ('Connection: close');
		header ('Content-Disposition: attachment; filename="robots.txt";');
		echo ($sRobotstxt);
	}
	
	// ---

	public function FooterEnd () {
		return $this -> Viewer_Fetch (Plugin::GetTemplatePath (__CLASS__) . 'footer_end.tpl');
	}

}

?>