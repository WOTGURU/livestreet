{if $aBlogs}
	{foreach from=$aBlogs item=oBlog}
		{assign var="oUserOwner" value=$oBlog->getOwner()}

		<tr>
			<td class="cell-info">
				<a href="#" onclick="return ls.infobox.showInfoBlog(this,{$oBlog->getId()});" class="blog-list-info"></a>
			</td>
			<td class="cell-name">
				<p>
					<a href="{$oBlog->getUrlFull()}" class="blog-name">{$oBlog->getTitle()|escape:'html'}</a>

					{if $oBlog->getType() == 'close'}
						<i title="{$aLang.blog_closed}" class="icon-synio-topic-private"></i>
					{/if}
				</p>

				<span class="user-avatar">
					<a href="{$oUserOwner->getUserWebPath()}"><img src="{$oUserOwner->getProfileAvatarPath(24)}" alt="avatar" /></a>
					<a href="{$oUserOwner->getUserWebPath()}">{$oUserOwner->getLogin()}</a>
				</span>
			</td>

			{if $oUserCurrent}
				<td class="cell-join">
					{if $oUserCurrent->getId() != $oBlog->getOwnerId() and $oBlog->getType() == 'open'}
						<button type="submit"  onclick="ls.blog.toggleJoin(this, {$oBlog->getId()}); return false;" class="button button-action button-action-join {if $oBlog->getUserIsJoin()}active{/if}">
							<i class="icon-synio-join"></i>
							<span>{if $oBlog->getUserIsJoin()}{$aLang.blog_leave}{else}{$aLang.blog_join}{/if}</span>
						</button>
					{else}
						&mdash;
					{/if}
				</td>
			{/if}

			<td class="cell-readers" id="blog_user_count_{$oBlog->getId()}">{$oBlog->getCountUser()}</td>
			<td class="cell-rating align-center {if $oBlog->getRating() < 0}negative{/if}">{$oBlog->getRating()}</td>
		</tr>
	{/foreach}
{/if}