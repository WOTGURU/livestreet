{assign var="aBlogs" value=$oTopic->getMultiblogs()}
{assign var="oUser" value=$oTopic->getUser()}
{assign var="oVote" value=$oTopic->getVote()}
{assign var="oFavourite" value=$oTopic->getFavourite()}
<article class="topic topic-type-{$oTopic->getType()} js-topic">
    <header class="topic-header">    
        <h1 class="topic-title word-wrap">
            {if $bTopicList}
                <a href="{$oTopic->getUrl()}" {if $oTopic->getType() == 'link'}title="{$aLang.topic_link}"{/if}>{$oTopic->getTitle()|escape:'html'}</a>
            {else}
                {$oTopic->getTitle()|escape:'html'}
            {/if}
        </h1>  
        {if $oTopic->getIsAllowAction()}
            <ul class="topic-main-info">                                 
                {if $oTopic->getIsAllowEdit()}
                    <li class="edit"><a href="{$oTopic->getUrlEdit()}" title="{$aLang.topic_edit}" class="actions-edit">{$aLang.topic_edit}</a></li>
                {/if}                
                {if $oTopic->getIsAllowDelete()}
                    <li class="delete"><a href="{router page='topic'}delete/{$oTopic->getId()}/?security_ls_key={$LIVESTREET_SECURITY_KEY}" title="{$aLang.topic_delete}" onclick="return confirm('{$aLang.topic_delete_confirm}');" class="actions-delete">{$aLang.topic_delete}</a></li>
                {/if}
            </ul>
        {/if}
    </header>