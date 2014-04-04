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

$config = array();

$config['registered_only'] = true;//При значении true - аякс подгрузка только для зарегистрированных пользователей^ при false - для всех
$config['pass']='wotgurukey'; //ключ аякс фильтра, рекомендуется заменить на свой
$config['autoajaxload'] = true; //автозагрузка по достижении конца страницы. При значении false будет отображаться отдельная кнопка "Дальше".

/*
 * Подгрузка комментариев.
 * Внимание!
 * Необходимо выставить в true $config['module']['comment']['use_nested'] в главном конфиге
 * А также выставить количество объектов на страницу в $config['module']['comment']['nested_per_page']
 */
$config['loadcomments'] = false; //по умолчанию настройка выключена

return $config;
?>