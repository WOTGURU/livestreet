<?php
/*
 * 
 * Project Name : Robostat plugin
 * Copyright (C) 2011 Alexei Lukin. All rights reserved.
 * GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * $Rev: 35 $
 * $Date: 2011-01-18 11:55:49 +0300 (Tue, 18 Jan 2011) $
 * $LastChangedDate: 2011-01-18 11:55:49 +0300 (Tue, 18 Jan 2011) $
 * 
 */

if (!class_exists('Plugin')) {
	die('Hacking attemp!');
}

class PluginRobostat extends Plugin
{
	protected $sTemplatesUrl = "";

	public function Activate()
	{
		if (!$this->isTableExists('prefix_robostat_robots')) {
			$this->ExportSQL(dirname(__FILE__).'/install.sql');
		}

		return true;
	}


	public function Deactivate()
	{
		return true;
	}

	public function Init()
	{
		$sTemplatesUrl = Plugin::GetTemplatePath('PluginRobostat');
	}

}

?>
