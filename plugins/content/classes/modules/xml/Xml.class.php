<?php

class PluginContent_ModuleXml extends Module {
    
	public function Init()
		{
		}
      
    public function RsstoArray($tag, $array, $url) 
		{
			if($url=='') return false;
			$doc = new DOMdocument();
			$doc->load($url);
			$rss_array = array();
			$items = array();
			foreach($doc->getElementsByTagName($tag) AS $node) 
			{    
					foreach($array AS $key => $value) 
					{
						$items[$value] = $node->getElementsByTagName($value)->item(0)->nodeValue;
					}
					array_push($rss_array, $items);
			}
			return $rss_array;
		}
        
    public function Shutdown() 
		{
                
        }
}
?>