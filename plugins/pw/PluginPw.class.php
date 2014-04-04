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

if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginPw extends Plugin
{

    protected $aInherits = array(
        'module' => array(
            'ModuleImage',
        ),
    );



    public function Activate()
    {
        return true;
    }


    public function Init()
    {
    }
}

?>