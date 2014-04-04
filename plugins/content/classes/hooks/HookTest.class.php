<?php
/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
	die('Hacking attempt!');
}

class PluginContent_HookTest extends Hook {

    public function RegisterHook() {
        $this->AddHook('template_admin_action_item', 'Add');
        }

    // Новый тип при создании топика
    public function Add() {
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__).'menu.topic_action.tpl');
    }
}