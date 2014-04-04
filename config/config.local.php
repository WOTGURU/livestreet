<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
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
 * Настройки для локального сервера.
 * Для использования - переименовать файл в config.local.php
 */

/**
 * Настройка базы данных
 */
$config['db']['params']['host'] = 'localhost';
$config['db']['params']['port'] = '3306';
$config['db']['params']['user'] = 'wotgur_wotguru';
$config['db']['params']['pass'] = 'pLhrbgvfA1jsF1h5w5EcUT70';
$config['db']['params']['type']   = 'mysql';
$config['db']['params']['dbname'] = 'wotgur_wotguru';
$config['db']['table']['prefix'] = 'prefix_';

$config['path']['root']['web'] = 'http://wot.guru';
$config['path']['root']['server'] = '/home/w/wotgur/wot.guru/public_html';
$config['path']['offset_request_url'] = '0';
$config['db']['tables']['engine'] = 'InnoDB';
$config['view']['name'] = 'WoT GURU';
$config['view']['description'] = 'Всё для WoT';
$config['view']['keywords'] = 'шкурки, world of tanks, шкурки для world of tanks, новости wot, новости world of tanks, танки world of tanks, скачать world of tanks, мир танков';
$config['view']['skin'] = 'synio';
$config['sys']['mail']['from_email'] = 'wotguru.dev@gmail.com';
$config['sys']['mail']['from_name'] = 'Почтовик WoT GURU';
$config['general']['close'] = false;
$config['general']['reg']['activation'] = true;
$config['general']['reg']['invite'] = true;
$config['lang']['current'] = 'russian';
$config['lang']['default'] = 'russian';
return $config;
?>