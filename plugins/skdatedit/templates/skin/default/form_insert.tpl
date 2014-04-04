{if $oUserCurrent and $oUserCurrent->isAdministrator()}
<p><label for="sk_topic_date_add">{$aLang.plugin.skdatedit.label}:</label>
	<input name="sk_topic_date_add" type="text" value="{$_aRequest.topic_date_add|date_format:"%d.%m.%Y"}" class="date-picker" readonly="readonly" /> 
    <input name="sk_topic_time_add" type="text" value="{$_aRequest.topic_date_add|date_format:"%H:%M:%S"}" readonly="readonly" />
 </p>
 {/if}