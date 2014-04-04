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

class PluginMultiblog_ModuleMultiblog_MapperMultiblog extends Mapper{

    public function SaveMultiblog($oTopic,$aBlogs){
        $sql = "UPDATE ".Config::Get('db.table.topic')." SET 
                    topic_date_edit = ?
                    {, blog1_id = ?d }
                    {, blog2_id = ?d }
                    {, blog3_id = ?d }
                    {, blog4_id = ?d }
                    {, blog5_id = ?d }
                    {, blog6_id = ?d }
                    {, blog7_id = ?d }
                    {, blog8_id = ?d }
                    {, blog9_id = ?d }
                    {, blog10_id = ?d }
                WHERE topic_id = ?d";
        if($this->oDb->query($sql,
            date('Y-m-d H:i:S'),
            isset($aBlogs[0]) ? $aBlogs[0] : 0,
            isset($aBlogs[1]) ? $aBlogs[1] : 0,
            isset($aBlogs[2]) ? $aBlogs[2] : 0,
            isset($aBlogs[3]) ? $aBlogs[3] : 0,
            isset($aBlogs[4]) ? $aBlogs[4] : 0,
            isset($aBlogs[5]) ? $aBlogs[5] : 0,
            isset($aBlogs[6]) ? $aBlogs[6] : 0,
            isset($aBlogs[7]) ? $aBlogs[7] : 0,
            isset($aBlogs[8]) ? $aBlogs[8] : 0,
            isset($aBlogs[9]) ? $aBlogs[9] : 0,
            $oTopic->getId()
            )
        ){
            return true;
        }
        return false;
    }
}