<?php
/*-------------------------------------------------------
*
*	Plugin Ajaxload
*	Author: Vladimir Yuriev ( extravert )
*	Contact e-mail: support@lsmods.ru
*	Site: http://lsmods.ru
*
*/
class PluginAjaxload_ModuleComment extends PluginAjaxload_Inherit_ModuleComment {

    public function GetCommentsTreeByTargetId($sId,$sTargetType,$iPage=1,$iPerPage=0) {
        if (!Config::Get('module.comment.nested_page_reverse') and $iPerPage and $iCountPage=ceil($this->GetCountCommentsRootByTargetId($sId,$sTargetType)/$iPerPage)) {
            $iPage=$iCountPage-$iPage+1;
        }
        $iPage=$iPage<1 ? 1 : $iPage;
        if (false === ($aReturn = $this->Cache_Get("comment_tree_target_{$sId}_{$sTargetType}_{$iPage}_{$iPerPage}"))) {

            /**
             * Нужно или нет использовать постраничное разбиение комментариев
             */
            if ($iPerPage) {
                $aComments=$this->oMapper->GetCommentsTreePageByTargetId($sId,$sTargetType,$iCount,$iPage,$iPerPage);

                //**ajaxload
                $aFilter=array();
                $aFilter['type']=$sTargetType;
                $aFilter['id']=$sId;
                $s=serialize($aFilter);
                require_once Config::Get('path.root.engine').'/lib/external/XXTEA/encrypt.php';
                $sAjaxLoadFilter=rawurlencode(base64_encode(xxtea_encrypt($s, Config::Get('plugin.ajaxload.pass'))));
                $this->Viewer_Assign('sAjaxLoadFilter',  $sAjaxLoadFilter);
                $this->Viewer_Assign('sAjaxLoad','comment');
                //**ajaxload


            } else {
                $aComments=$this->oMapper->GetCommentsTreeByTargetId($sId,$sTargetType);
                $iCount=count($aComments);
            }
            $iMaxIdComment=count($aComments) ? max($aComments) : 0;
            $aReturn=array('comments'=>$aComments,'iMaxIdComment'=>$iMaxIdComment,'count'=>$iCount);
            $this->Cache_Set($aReturn, "comment_tree_target_{$sId}_{$sTargetType}_{$iPage}_{$iPerPage}", array("comment_new_{$sTargetType}_{$sId}"), 60*60*24*2);
        }
        $aReturn['comments']=$this->GetCommentsAdditionalData($aReturn['comments']);
        return $aReturn;
    }

}
?>