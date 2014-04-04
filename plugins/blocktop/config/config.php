<?php
/* -------------------------------------------------------
 *   Copyright © 2011 Kulesh Uladzimir
 *   Contact e-mail: v.a.kulesh@yandex.ru
  ---------------------------------------------------------
 */
 
$config = array();

$config['topic_top'] = 7;  // За какой период выводить топ топиков? 1 - за 24 часа, 7 - за 7 дней, 30 - за 30 дней, 36000 - за все время.
$config['topic_count'] = 8;  // Сколько записей показывать в блоке (кратное 4 число)?

// Настройки вывода блока

Config::Set('block.rule_blocktop', array(
	'action' => array(
		'index'
	),
    'blocks' => array(
		'right' => array(
			'top' => array('params' => array('plugin' => 'blocktop'), 'priority' => 70),
		)
    ),
    'clear' => false,
));

return $config;
?>