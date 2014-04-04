<?php
/*
	Configengine plugin
	(P) PSNet, 2008 - 2013
	http://psnet.lookformp3.net/
	http://livestreet.ru/profile/PSNet/
	https://catalog.livestreetcms.com/profile/PSNet/
	http://livestreetguide.com/developer/PSNet/
*/

class PluginConfigengine_ModuleConfig_MapperConfig extends Mapper {

	public function GetConfig ($sFilter = null, $iCurrentPage = 1, $iPerPage = PHP_INT_MAX) {
		$sql = "SELECT *
			FROM
				`" . Config::Get ('plugin.configengine.table.config') . "`
			" . (isset ($sFilter) ? "WHERE " . $sFilter : "") . "
			ORDER BY
				`id` ASC
			LIMIT ?d, ?d
		";
		$iTotalCount = 0;
		
		if ($aResult = $this -> oDb -> selectPage (
					$iTotalCount,
					$sql,
					($iCurrentPage - 1) * $iPerPage,
					$iPerPage
				)
			) {
			return array (
				'result' => $aResult,
				'count' => $iTotalCount
			);
		}
		return array (
			'result' => array (),
			'count' => 0
		);
	}
	
	// ---
	
	public function SaveConfig ($sPluginName, $sSerializedConfig, $iAutoLoad) {
		$sql = "INSERT INTO
			`" . Config::Get ('plugin.configengine.table.config') . "`
			(
				`pluginname`,
				`serialized`,
				`autoload`
			)
			VALUES
			(
				?,
				?,
				?d
			)
			ON DUPLICATE KEY UPDATE
				`serialized` = ?,
				`autoload` = ?d
		";
		
		return $this -> oDb -> Query ($sql,
			$sPluginName,
			$sSerializedConfig,
			$iAutoLoad,
			
			$sSerializedConfig,
			$iAutoLoad
		);
	}
	
	// ---
	
	public function DeleteConfig ($sFilter, $iLimit = 1) {
		$sql = "DELETE
			FROM
				`" . Config::Get ('plugin.configengine.table.config') . "`
			WHERE
				" . $sFilter . "
			LIMIT ?d
		";
		
		$aResult = $this -> oDb -> Query ($sql,
			$iLimit
		);
		return true;
	}
	
}

?>