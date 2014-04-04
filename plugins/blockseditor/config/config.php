<?php
/*
  Blockseditor plugin
  (P) PSNet, 2008 - 2013
  http://psnet.lookformp3.net/
  http://livestreet.ru/profile/PSNet/
  http://livestreetcms.com/profile/PSNet/
  http://livestreetguide.com/developer/PSNet/
*/

$config = array ();

// --- редактировать здесь ничего не нужно - все через веб-интерфейс ---

$config ['Block_Content'] = 'Описание сайта. Разработка для LiveStreet CMS <a href="http://livestreetguide.com/">LiveStreet CMS Guide</a>';

// приоритет блока
$config ['Priority'] = 800;

// Список экшенов, где показывать блок
$config ['Actions'] = 'index, newall, blog, new';

// ---

$config ['url'] = 'blockseditor';
$config ['$root$']['router']['page'][$config ['url']] = 'PluginBlockseditor_ActionBlockseditor';

return $config;

?>