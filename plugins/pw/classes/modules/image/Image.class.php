<?php

/* -------------------------------------------------------
 *
 *   LiveStreet (1.x)
 *   Plugin Preview (v.1.0)
 *   Copyright © 2013 Bishovec Nikolay
 *
 * --------------------------------------------------------
 *
 *   Plugin Page: http://netlanc.net
 *   Contact e-mail: netlanc@yandex.ru
 *
  ---------------------------------------------------------
 */

class PluginPw_ModuleImage extends PluginPw_Inherit_ModuleImage
{
    public function CreatePreview($sPath, $sSize = 'medium') {

        if (!in_array($sSize, array('small','medium','large'))){
            $sSize = 'medium';
        }

        $sFile = $this->Image_GetServerPath($sPath);
        $aPath = pathinfo($sFile);
        $sPath = str_replace(Config::Get('path.root.server'), '', $aPath['dirname']);

        $sFileName = $aPath['filename'];

        $aParams = $this->Image_BuildParams('photoset');

        $oImage = $this->Image_CreateImageObject($sFile);

        if ($sError = $oImage->get_last_error()) {
            $this->Message_AddError($sError, $this->Lang_Get('error'));
            return false;
        }

        $sFileNamePreview = $aPath['filename'];
        $aSize = Config::Get('plugin.pw.size.' . $sSize);

        if ($oImage->get_image_params('width')>$aSize['w']) {

            $sFileNamePreview = $sFileName . '_preview';
            $oImage = $this->Image_CreateImageObject($sFile);
            if ($aSize['crop']) {
                $this->Image_CropProportion($oImage, $aSize['w'], $aSize['h'], true);
                $sFileNamePreview .= '_crop';
            }
            $this->Image_Resize(
                $sFile, $sPath, $sFileNamePreview, Config::Get('view.img_max_width'), Config::Get('view.img_max_height'),
                $aSize['w'], $aSize['h'], true, $aParams, $oImage
            );

        }

        return $this->Image_GetWebPath($aPath['dirname'] . '/' . $sFileNamePreview . '.' . $aPath['extension']);

    }

    public function BuildHTML($sPath,$aParams) {

        if (empty($aParams['preview'])){
            return parent::BuildHTML($sPath,$aParams);
        }

        $sWebPathPreview = $this->CreatePreview($sPath, !empty($aParams['preview_size']) ? $aParams['preview_size']:'medium');

        $sText='<a href="'.$sPath.'"';
        if (isset($aParams['title']) and $aParams['title']!='') {
            $sText.=' title="'.htmlspecialchars($aParams['title']).'" ';
        }
        $sText.=' class="photoset-image ';
        if (isset($aParams['align']) and in_array($aParams['align'],array('left','right','center'))) {
            $sText.='image-'.$aParams['align'];
        }
        $sText.='"';
        $sText.='><img src="'.$sWebPathPreview.'" ';
        if (isset($aParams['title']) and $aParams['title']!='') {
            $sText.=' title="'.htmlspecialchars($aParams['title']).'" ';
            if(!isset($aParams['alt'])) $aParams['alt']=$aParams['title'];
        }
        if (isset($aParams['align']) and in_array($aParams['align'],array('left','right','center'))) {
            if ($aParams['align'] == 'center') {
                $sText.=' class="image-center"';
            } else {
                $sText.=' align="'.htmlspecialchars($aParams['align']).'" ';
            }
        }
        $sAlt = isset($aParams['alt'])
            ? ' alt="'.htmlspecialchars($aParams['alt']).'"'
            : ' alt=""';
        $sText.=$sAlt.' /></a>';

        return $sText;
    }
}

?>