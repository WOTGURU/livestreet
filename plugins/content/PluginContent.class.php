<?php

if (!class_exists('Plugin')) {
	die('Hacking attemp!');
}

class PluginContent extends Plugin {

        /**
         * Активация плагина
         * В принципе, здесь нам делать ничего не нужно
         */
        public function Activate() {
                return true;
        }
        
        /**
         * Инициализация плагина
         */
        public function Init() {
		
        }
        
        /**
         * Деактивация плагина
         * В принципе, тут тоже ничего не нужно делать
         */
        public function Deactivate() {
                return true;
        }
}