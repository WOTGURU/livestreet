{strip}
{* KEYWORDS *}
    {if $oBlog }
        {* На странице блога: название блога, стандартные ключевые слова *}
        {if $oBlog && $oBlog->getBlogSeoKeyword()}
            {* Список топиков: теги топиков *}
            {$oBlog->getBlogSeoKeyword()|strip_tags|escape:'html'}
        {else}
            {$oBlog->getTitle()|strip_tags|escape:'html'}, {$sHtmlKeywords}
        {/if}
    {elseif count($aTopics)>0}
        {foreach from=$aTopics item=oTopic}
            {if $oTopic->getTopicSeoKeyword()}
                {$oTopic->getTopicSeoKeyword()|strip_tags|escape:'html'}
            {else}
                {$oTopic->getTitle()|strip_tags|escape:'html'},
            {/if}
        {/foreach}
    {elseif $oTopic}
        {* На странице топика: название топика, теги *}
        {if $oTopic->getTopicSeoKeyword()}
            {$oTopic->getTopicSeoKeyword()|strip_tags|escape:'html'}
        {else}
            {$oTopic->getTitle()|strip_tags|escape:'html'}, {$oTopic->getTags()|escape:'html'}
        {/if}
    {else}
        {* На остальных страницах: стандартные ключевые слова *}
        {$sHtmlKeywords}
    {/if}
{/strip}