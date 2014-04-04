<?php
/*-------------------------------------------------------
*
*	Plugin "Ajaxload"
*	Author: Vladimir Yuriev (extravert)
*	Site: lsmods.ru
*	Contact e-mail: support@lsmods.ru
*
---------------------------------------------------------
*/


class PluginAjaxload_ActionBlogs extends PluginAjaxload_Inherit_ActionBlogs {	
	
	protected function EventShowBlogs() {		
        parent::EventShowBlogs();
		/**
		 * По какому полю сортировать
		 */
		$sOrder='blog_rating';
		if (getRequest('order')) {
			$sOrder=getRequest('order');
		}
		/**
		 * В каком направлении сортировать
		 */
		$sOrderWay='desc';
		if (getRequest('order_way')) {
			$sOrderWay=getRequest('order_way');
		}
		
		$aFilter=array();
		$aFilter['exclude_type']='personal';
		$aFilter['order']=$sOrder;
		$aFilter['way']=$sOrderWay;
		require_once Config::Get('path.root.engine').'/lib/external/XXTEA/encrypt.php';
		$s=  serialize($aFilter);
        $sAjaxLoadFilter=rawurlencode(base64_encode(xxtea_encrypt($s, Config::Get('plugin.ajaxload.pass'))));

        $this->Viewer_Assign('sAjaxLoadFilter','blogs');
        $this->Viewer_Assign('sAjaxLoadParam',$sAjaxLoadFilter);
		$this->Viewer_Assign('sAjaxLoad','blogs');
	}
    
}
?>