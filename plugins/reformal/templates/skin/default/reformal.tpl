{if $sAction=='index'}
<script type="text/javascript">
    var reformalOptions = {
        project_id: {$oConfig->getValue('plugin.reformal.project_id')},
        project_host: "{$oConfig->getValue('plugin.reformal.project_host')}",
        tab_orientation: "{$oConfig->getValue('plugin.reformal.tab_orientation')}",
        tab_indent: {$oConfig->getValue('plugin.reformal.tab_indent')},
        tab_bg_color: "{$oConfig->getValue('plugin.reformal.tab_bg_color')}",
        tab_border_color: "{$oConfig->getValue('plugin.reformal.tab_border_color')}",
        tab_image_url: "{$oConfig->getValue('plugin.reformal.tab_image_url')}",
        tab_border_width: {$oConfig->getValue('plugin.reformal.tab_border_width')}
    };
    
    (function() {
        var script = document.createElement('script');
        script.type = 'text/javascript'; script.async = true;
        script.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'media.reformal.ru/widgets/v2/reformal.js';
        document.getElementsByTagName('head')[0].appendChild(script);
    })();
</script>
{/if}