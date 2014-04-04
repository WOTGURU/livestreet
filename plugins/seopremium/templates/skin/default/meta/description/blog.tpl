{strip}
{* DESCRIPTION *}
    {if $oBlog}
        {if $oBlog->getBlogSeoDescription()}
            {$oBlog->getBlogSeoDescription()|strip_tags|escape:'html'}
        {else}
            {$oBlog->getTitle()|strip_tags|escape:'html'}:
            {* На странице блога: название блога. описание блога *}
            {$oBlog->getDescription()|strip_tags|escape:'html'}
        {/if}
    {elseif count($aTopics)>0}
        {* Список топиков: заголовки топиков *}
        {foreach from=$aTopics item=oTopic}
                {$oTopic->getTitle()|strip_tags|escape:'html'}
        {/foreach}
    {elseif $oTopic}
        {* На странице топика: название топика. стандартное описание топика *}
        {if $oTopic->getTopicSeoDescription()}
            {$oTopic->getTopicSeoDescription()|strip_tags|escape:'html'}
        {else}
            {$oTopic->getTitle()|strip_tags|escape:'html'}. {$sHtmlDescription}
        {/if}
    {else}
        {* На остальных страницах: Блоги. стандартное описание*}
        {$aLang.blogs}. {$sHtmlDescription}
    {/if}
{/strip}