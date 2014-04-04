<?php
$sDirRoot = dirname(realpath((dirname(__FILE__)) . "/../../../"));
set_include_path(get_include_path() . PATH_SEPARATOR . $sDirRoot);
chdir($sDirRoot);

require_once($sDirRoot . "/config/loader.php");
require_once($sDirRoot . "/engine/classes/Cron.class.php");

class GetRssFeed extends Cron
{
	protected $aRssFeed = '';
	protected $sBlogId = '';
	protected $sFilePath = '';
	protected $sRssFeedN = '';
	protected $sProcessName = 'GetRssFeed';
	
	public function Client() {
		$this -> sBlogId = intval(getRequest('blog_id',null,'get'));
		$this -> sRssFeedN = intval(getRequest('feed_n',null,'get'));
		$this->sFilePath = Config::Get('plugin.content.feeds.'.$this -> sRssFeedN);
		if($this->sFilePath AND $this -> sBlogId ){	
			$this -> aRssFeed = $this->PluginContent_Xml_RsstoArray($sTag = 'item',
																	$aNods = array('title','description','category'),
																	$sUrl = $this->sFilePath);			
			$sResult = $this->PluginContent_Topics_AddTopics($this->aRssFeed,$this->sBlogId)?TRUE:FALSE;
			if($sResult){
					$this->Log("Feed was not published");
				}else{
					$this->Log("Feed ".$this->sFilePath." was published at ".date('H:m:s Y-m-d'));
				};
		}else{
			$this->Log("Parameters are passed is not correct or does not exist");
		}
	}
}

$sLockFilePath = Config::Get('sys.cache.dir') . 'getfeed.lock';
/**
 * Создаем объект крон-процесса,
 * передавая параметром путь к лок-файлу
 */
$app = new GetRssFeed($sLockFilePath);
print $app->Exec();
?>