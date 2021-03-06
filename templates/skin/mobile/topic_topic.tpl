{include file='topic_part_header.tpl'}
   
   
<div class="topic-content text">
	{hook run='topic_content_begin' topic=$oTopic bTopicList=$bTopicList}
	
	{if $bTopicList}
		{$oTopic->getTextShort()}
	{else}
		{$oTopic->getText()}
	{/if}
	
	{hook run='topic_content_end' topic=$oTopic bTopicList=$bTopicList}
</div> 


{if $bTopicList && $oTopic->getTextShort() != $oTopic->getText()}
	<div class="topic-more">
		<a href="{$oTopic->getUrl()}#cut" title="{$aLang.topic_read_more}" class="button button-primary">
			{if $oTopic->getCutText()}
				{$oTopic->getCutText()}
			{else}
				{$aLang.topic_read_more}
			{/if}
		</a>
	</div>
{/if}


{include file='topic_part_footer.tpl'}
