{if $aPagingCmt and $aPagingCmt.iCountPage>1}
    {if $sAjaxLoad && (($oConfig->GetValue('plugin.ajaxload.registered_only') && $oUserCurrent) || !$oConfig->GetValue('plugin.ajaxload.registered_only'))}

    <script type="text/javascript">
        ls.ajaxload.setNextPage({math equation="x + y" x=$aPagingCmt.iCurrentPage y=1});
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


        {if $aPagingCmt.sGetParams}
            {assign var="sGetSep" value='&'}
            {else}
            {assign var="sGetSep" value='?'}
        {/if}

    <div class="pagination pagination-comments">
        <ul>
            <li>{$aLang.paging}:</li>

            {if $oConfig->GetValue('module.comment.nested_page_reverse')}

                {if $aPagingCmt.iCurrentPage>1}
                    <li><a href="{$aPagingCmt.sGetParams}{$sGetSep}cmtpage=1">&larr;</a></li>
                {/if}
                {foreach from=$aPagingCmt.aPagesLeft item=iPage}
                    <li><a href="{$aPagingCmt.sGetParams}{$sGetSep}cmtpage={$iPage}">{$iPage}</a></li>
                {/foreach}
                <li class="active">{$aPagingCmt.iCurrentPage}</li>
                {foreach from=$aPagingCmt.aPagesRight item=iPage}
                    <li><a href="{$aPagingCmt.sGetParams}{$sGetSep}cmtpage={$iPage}">{$iPage}</a></li>
                {/foreach}
                {if $aPagingCmt.iCurrentPage<$aPagingCmt.iCountPage}
                    <li><a href="{$aPagingCmt.sGetParams}{$sGetSep}cmtpage={$aPagingCmt.iCountPage}">{$aLang.paging_last}</a></li>
                {/if}

                {else}

                {if $aPagingCmt.iCurrentPage<$aPagingCmt.iCountPage}
                    <li><a href="{$aPagingCmt.sGetParams}{$sGetSep}cmtpage={$aPagingCmt.iCountPage}">{$aLang.paging_last}</a></li>
                {/if}

                {foreach from=$aPagingCmt.aPagesRight item=iPage}
                    <li><a href="{$aPagingCmt.sGetParams}{$sGetSep}cmtpage={$iPage}">{$iPage}</a></li>
                {/foreach}
                <li class="active">{$aPagingCmt.iCurrentPage}</li>
                {foreach from=$aPagingCmt.aPagesLeft item=iPage}
                    <li><a href="{$aPagingCmt.sGetParams}{$sGetSep}cmtpage={$iPage}">{$iPage}</a></li>
                {/foreach}

                {if $aPagingCmt.iCurrentPage>1}
                    <li><a href="{$aPagingCmt.sGetParams}{$sGetSep}cmtpage=1">&rarr;</a></li>
                {/if}

            {/if}
        </ul>
    </div>
    {/if}
{/if}