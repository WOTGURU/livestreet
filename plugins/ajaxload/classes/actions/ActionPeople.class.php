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

class PluginAjaxload_ActionPeople extends PluginAjaxload_Inherit_ActionPeople {

    protected function EventCountry() {	
        parent::EventCountry();
        $this->Viewer_Assign('sAjaxLoadFilter','country');
        $this->Viewer_Assign('sAjaxLoadParam',urldecode($this->getParam(0)));
    }
    
    protected function EventCity() {	
        parent::EventCity();
        $this->Viewer_Assign('sAjaxLoadFilter','city');
        $this->Viewer_Assign('sAjaxLoadParam',urldecode($this->getParam(0)));
    }
    
    protected function EventIndex() {
        parent::EventIndex();

		/**
		 * По какому полю сортировать
		 */
		$sOrder='user_rating';
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
		$aFilter['activate']=1;
		$aFilter['order']=$sOrder;
		$aFilter['way']=$sOrderWay;
		require_once Config::Get('path.root.engine').'/lib/external/XXTEA/encrypt.php';
		$s=  serialize($aFilter);
        $sAjaxLoadFilter=rawurlencode(base64_encode(xxtea_encrypt($s, Config::Get('plugin.ajaxload.pass'))));

        $this->Viewer_Assign('sAjaxLoadFilter','index');
        $this->Viewer_Assign('sAjaxLoadParam',$sAjaxLoadFilter);
    }
    
    protected function EventAjaxSearch() {
        parent::EventAjaxSearch();
        //$this->Viewer_Assign('sAjaxLoadFilter','rating');
        //$this->Viewer_Assign('sAjaxLoadParam','bad');
    }
    
    public function EventShutdown() {
        parent::EventShutdown();
        $this->Viewer_Assign('sAjaxLoad','people');
    }
}
?>