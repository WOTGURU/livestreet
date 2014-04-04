<script type="text/javascript">
    var oSocialCounter = new TSocialCounter();
    oSocialCounter.Init();
</script>
<div class="socialcounters">
    {if $aLang.plugin.socialcounters.share_with_friends}<div class="text">{$aLang.plugin.socialcounters.share_with_friends}</div>{/if}
    {foreach 'plugin.socialcounters.buttons'|cfg as $sName}
        {include file=$sTemplatePath|cat:$sName|cat:'.tpl'}
    {/foreach}
</div>