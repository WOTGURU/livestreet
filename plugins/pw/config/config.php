<?php

/* -------------------------------------------------------
 *
 *   LiveStreet (1.x)
 *   Plugin Preview (v.1.0)
 *   Copyright © 2013 Bishovec Nikolay
 *
 * --------------------------------------------------------
 *
 *   Plugin Page: http://netlanc.net
 *   Contact e-mail: netlanc@yandex.ru
 *
  ---------------------------------------------------------
 */

$config = array();

$config['size'] = array( // размеры превьюшки
    'small' => array(
        'w' => 100, // ширина
        'h' => null, // высота
        'crop' => false // обрезать или нет по заданным размерам
    ),
    'medium' => array(
        'w' => 200, // ширина
        'h' => null, // высота
        'crop' => false // обрезать или нет по заданным размерам
    ),
    'large' => array(
        'w' => 300, // ширина
        'h' => null, // высота
        'crop' => false // обрезать или нет по заданным размерам
    ),
);

$cfgAllowTagParams = Config::Get('jevix.default.cfgAllowTagParams');
$cfgAllowTagParams[] = array('a',  array('class' => '#text'));
Config::Set('jevix.default.cfgAllowTagParams', $cfgAllowTagParams);

return $config;
?>