<?php

/* ---------------------------------------------------------------------------
 * @Plugin Name: reformal
 * @Description: Add widget from reformal.ru
 * @Author URI: http://pgsha.info
 * @LiveStreet Version: 1.0.1
 * @Plugin Version:	1.0.1
 * ----------------------------------------------------------------------------
 */

$config = array();

$config['project_id'] = 519910;  // ID проекта на reformal.ru
$config['project_host'] = 'wotguru.reformal.ru'; // поддомен проекта на reformal.ru или собственном домене
$config['tab_orientation'] = 'left'; // расположение виджета: left, right, top-left, top-right, bottom-left, bottom-right
$config['tab_indent'] = 350; // отступ в пикселях
$config['tab_bg_color'] = '#149f0d'; // цвет фона
$config['tab_border_color'] = '#FFFFFF'; // цвет текста
$config['tab_image_url'] = 'http://pgsha.info/tab.png'; // изображение для виджета
$config['tab_border_width'] = 0; //толщина рамки [0-2]

return $config;