{if $aPaging and $aPaging.iCountPage>1}

	{if $sAjaxLoad && (($oConfig->GetValue('plugin.ajaxload.registered_only') && $oUserCurrent) || !$oConfig->GetValue('plugin.ajaxload.registered_only'))}

       <script type="text/javascript">
            ls.ajaxload.setNextPage({math equation="x + y" x=$aPaging.iCurrentPage y=1});
            ls.ajaxload.setPageHash('{$sAjaxLoadFilter}');
            ls.ajaxload.setPageParam('{$sAjaxLoadParam}');
			ls.ajaxload.setPageSpecial('{$sAjaxLoadSpecial}');
            ls.ajaxload.setAutoLoad('{if $oConfig->GetValue('plugin.ajaxload.autoajaxload')}true{else}false{/if}');
        </script>
        {if $oConfig->GetValue('plugin.ajaxload.autoajaxload')}
            {literal}
            <script type="text/javascript">
            $(document).ready(function(){
                $(window).scroll(function(){
                    if  ($(document).height() - $(window).height() <= $(window).scrollTop() + 200) {
                        ls.ajaxload.getMore('{/literal}{$sAjaxLoad}{literal}');
                    }
                });

                if  ($(document).height() - $(window).height() <= $(window).scrollTop() + 200) {
                    ls.ajaxload.getMore('{/literal}{$sAjaxLoad}{literal}');
                }
            });
            </script>
            {/literal}
        {/if}
        <div id="postcontent"></div>
        <div id="ajaxloading" class="stream_loading" style="display:none;height:50px;"></div>

        {if !$oConfig->GetValue('plugin.ajaxload.autoajaxload')}
                <a class="stream-get-more" id="ajaxload_more" href="javascript:ls.ajaxload.getMore('{$sAjaxLoad}')">{$aLang.ajaxload_more} &darr;</a>
        {/if}

    {else}


		<div class="pagination">
			<ul>
				{if $aPaging.iPrevPage}
					<li class="prev"><a href="{$aPaging.sBaseUrl}/page{$aPaging.iPrevPage}/{$aPaging.sGetParams}" class="js-paging-prev-page" title="{$aLang.paging_previos}">&larr; {$aLang.paging_previos}</a></li>
				{else}
					<li class="prev"><span>&larr; {$aLang.paging_previos}</span></li>
				{/if}


				{if $aPaging.iNextPage}
					<li class="next"><a href="{$aPaging.sBaseUrl}/page{$aPaging.iNextPage}/{$aPaging.sGetParams}" class="js-paging-next-page" title="{$aLang.paging_next}">{$aLang.paging_next} &rarr;</a></li>
				{else}
					<li class="next"><span>{$aLang.paging_next} &rarr;</span></li>
				{/if}
			</ul>
			<ul>
				{if $aPaging.iCurrentPage>1}<li><a href="{$aPaging.sBaseUrl}/{$aPaging.sGetParams}" title="{$aLang.paging_first}">{$aLang.paging_first}</a></li>{/if}

				{foreach from=$aPaging.aPagesLeft item=iPage}
					<li><a href="{$aPaging.sBaseUrl}/page{$iPage}/{$aPaging.sGetParams}">{$iPage}</a></li>
				{/foreach}

				<li class="active"><span>{$aPaging.iCurrentPage}</span></li>

				{foreach from=$aPaging.aPagesRight item=iPage}
					<li><a href="{$aPaging.sBaseUrl}/page{$iPage}/{$aPaging.sGetParams}">{$iPage}</a></li>
				{/foreach}


				{if $aPaging.iCurrentPage<$aPaging.iCountPage}<li><a href="{$aPaging.sBaseUrl}/page{$aPaging.iCountPage}/{$aPaging.sGetParams}" title="{$aLang.paging_last}">{$aLang.paging_last}</a></li>{/if}
			</ul>
		</div>
	{/if}
{/if}