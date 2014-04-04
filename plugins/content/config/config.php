<?php

if (!class_exists('Config')) die('Hacking attempt!');


Config::Set('router.page.content', 'PluginContent_ActionFeed');


/**Cron settings
 * 
 * Add this url to your Host CP or browser
 *
 * SITE_URL /plugins/content/include/cron/get-feed.php?blog_id=2&feed_n=1
 * where blog_id  - blog id(Watch it near blog name on /content/ page) 
 * and
 * feed_n - key(NOT NUMBER) in $config['feeds'] array.
 */

$config['feeds'] = array (
    '0' => 'http://habrahabr.ru/rss/hubs/',
    '1' => 'http://seu.su/rss',
    '3' => 'http://livestreet.ru/rss'
);
return $config;