<?php
/* -------------------------------------------------------
 *
 *   LiveStreet (v1.0)
 *   Plugin Multiblog for liveStreet 1.0.1
 *   Copyright © 2013 1099511627776@mail.ru
 *
 * --------------------------------------------------------
 *
 *   Contact e-mail: 1099511627776@mail.ru
 *
  ---------------------------------------------------------
*/

class PluginMultiblog_ModuleTopic_EntityTopic extends PluginMultiblog_Inherit_ModuleTopic_EntityTopic {

    public function getMultiblogs(){
       return $this->PluginMultiblog_Multiblog_GetMultiblogs($this);
    }

}