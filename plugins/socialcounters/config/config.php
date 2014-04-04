<?php

$config = array();

/**
 * Укажем какие кнопки использовать
 */
$config['buttons'] = array(
      'vk'
    , 'facebook'
    , 'twitter'
    , 'ya'
	, 'gp'
);

Config::Set('router.page.social_counters_ajax', 'PluginSocialcounters_ActionAjax');

return $config;
 