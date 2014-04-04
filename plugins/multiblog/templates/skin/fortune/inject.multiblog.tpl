<p>
    <script type="text/javascript">
        ls.lang.load({lang_load name="plugin.multiblog.error_noblog"});
        var multiblogs = multiblogs || {};
        $(function($){
            $('.multiblogs').chosen({
                'max_selected_options':{$oConfig->getValue('plugin.multiblog.blog_count')}
            });
            $('#blog_id').parent().hide();
        });
    </script>
    <label for="multiblog_ids">{$aLang.plugin.multiblog.title}</label>
    <select data-placeholder="{$aLang.plugin.multiblog.title_placeholder}" class="multiblogs input-text input-width-full" multiple name="multiblogs[]">
        {foreach from=$aBlogTypes item=sBlogType}
            <optgroup label="{$aLang.plugin.multiblog[$sBlogType]|escape:'html'}">
            {foreach from=$aBlogsAllow item=oBlog}
               {if $oBlog->getType() == $sBlogType}
               <option value="{$oBlog->getId()}" {if $aMultiblogs and in_array($oBlog,$aMultiblogs)}selected{/if}>{$oBlog->getTitle()|escape:'html'}</option>
               {/if}
            {/foreach}
            </optgroup>
        {/foreach}
    </select>
    <small class="note">{$aLang.plugin.multiblog.title_notice} {$oConfig->getValue('plugin.multiblog.blog_count')}</small>
</p>