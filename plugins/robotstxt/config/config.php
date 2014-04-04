<?php
/*
	Robotstxt plugin
	(P) PSNet, 2008 - 2013
	http://psnet.lookformp3.net/
	http://livestreet.ru/profile/PSNet/
	https://catalog.livestreetcms.com/profile/PSNet/
	http://livestreetguide.com/developer/PSNet/
*/

$config = array ();

// --- редактировать здесь ничего не нужно - все через веб-интерфейс ---

$config ['Robots_Txt_Content'] = 'User-agent: *
Disallow: /login/
Disallow: /registration/
';

// ---

$config ['url'] = 'robotstxt';
$config ['$root$']['router']['page'][$config ['url']] = 'PluginRobotstxt_ActionRobotstxt';

return $config;

?>