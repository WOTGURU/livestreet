<?php

class PluginSkdatedit_HookSkdatedit extends Hook {
    public function RegisterHook() {
		$this->AddHook('template_form_add_topic_topic_end','form_insert');
        
        $this->AddHook('template_form_add_topic_question_end','form_insert');
        $this->AddHook('template_form_add_topic_photoset_end','form_insert');
        $this->AddHook('template_form_add_topic_link_end','form_insert');
        
        $this->AddHook('topic_edit_show','add_var');
        $this->AddHook('topic_edit_before','add_date');
        $this->AddHook('topic_add_before','add_date');
    }
   	public function form_insert() {
		return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__).'form_insert.tpl');
	}
   	public function add_var($aVars) {
   	    $oTopic = $aVars['oTopic'];
        $_REQUEST['topic_date_add']=$oTopic->getDateAdd();
        return $aVars;
	}
   	public function add_date($aVars) {
   	    $oTopic = $aVars['oTopic'];
        if ( $dateAdd = getRequest('sk_topic_date_add') and $timeAdd = getRequest('sk_topic_time_add') ){
            list($d,$m,$y)=explode('.',$dateAdd);
            $oTopic->setDateAdd(date("$y-$m-$d $timeAdd"));
        }
        return $aVars;
	}
}
?>
