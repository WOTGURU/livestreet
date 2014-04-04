<?php
class PluginMultiblog_ModuleBlog_MapperBlog extends PluginMultiblog_Inherit_ModuleBlog_MapperBlog {

    public function RecalculateCountTopic($iBlogId = null) {
        $sql = "
                UPDATE " . Config::Get('db.table.blog') . " b
                SET b.blog_count_topic = (
                    SELECT count(*)
                    FROM " . Config::Get('db.table.topic') . " t
                    WHERE
                        (
                            (t.blog_id = b.blog_id) OR
                            (t.blog1_id = b.blog_id) OR
                            (t.blog2_id = b.blog_id) OR
                            (t.blog3_id = b.blog_id) OR
                            (t.blog4_id = b.blog_id) OR
                            (t.blog5_id = b.blog_id) OR
                            (t.blog6_id = b.blog_id) OR
                            (t.blog7_id = b.blog_id) OR
                            (t.blog8_id = b.blog_id) OR
                            (t.blog9_id = b.blog_id) OR
                            (t.blog10_id = b.blog_id)
                        )
                    AND
                        t.topic_publish = 1
                )
                WHERE 1=1
                    { AND b.blog_id = ?d }
            ";
        $bResult = $this->oDb->query($sql, is_null($iBlogId) ? DBSIMPLE_SKIP : $iBlogId);
        return $bResult !== false;
    }

}