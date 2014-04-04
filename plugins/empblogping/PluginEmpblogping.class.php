<?php

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attemp!!');
}

/*
 * Плагин
 * and open the template in the editor.
 */
class PluginEmpblogping extends Plugin {

    public function Activate() {
        return true;
    }

    public function Init() {
        
    }

}
