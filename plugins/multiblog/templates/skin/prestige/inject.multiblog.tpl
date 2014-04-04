{if $sEvent == 'add'}
    {assign var=aMultiblogs value=$_aRequest.multiblogs}
{/if}
<p>
    <script type="text/javascript">
        ls.lang.load({lang_load name="plugin.multiblog.error_noblog"});
        var multiblogs = multiblogs || {};
        $(function($){
            $('.multiblogs').chosen({
                'max_selected_options':{$oConfig->getValue('plugin.multiblog.blog_count')}
            }).change(function(){
                var $first = $('span',$(this).next().find('li.search-choice')[0]).text();
                var $val = $('option:contains("'+$first+'")',this).val();
                $('#blog_id option:selected').removeAttr('selected')
                $('#blog_id option[value='+$val+']').attr('selected','selected');
            });
            
            $('#blog_id').parent().hide();

        });
    </script>
    <label for="multiblog_ids">{$aLang.plugin.multiblog.title}</label>
    <select data-placeholder="{$aLang.plugin.multiblog.title_placeholder}" class="multiblogs input-text input-width-full" multiple name="multiblogs[]" id="multiblog_ids">
        {foreach from=$aBlogTypes item=sBlogType}
            <optgroup label="{$aLang.plugin.multiblog[$sBlogType]|escape:'html'}">
            {foreach from=$aBlogsAllow item=oBlog}
               {if $oBlog->getType() == $sBlogType}
               <option value="{$oBlog->getId()}"
                {if $sEvent == 'add'}
                    {if $aMultiblogs and in_array($oBlog->getId(),$aMultiblogs)}selected{/if}
                {else}
                    {if $aMultiblogs and in_array($oBlog,$aMultiblogs)}selected{/if}
                {/if}>
                {$oBlog->getTitle()|escape:'html'}</option>
               {/if}
            {/foreach}
            </optgroup>
        {/foreach}
    </select>
    <small class="note">{$aLang.plugin.multiblog.title_notice} {$oConfig->getValue('plugin.multiblog.blog_count')}</small>
</p>