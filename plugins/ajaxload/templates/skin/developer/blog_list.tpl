{if $aBlogs}
	{foreach from=$aBlogs item=oBlog}
		{assign var="oUserOwner" value=$oBlog->getOwner()}

		<tr>
			<td class="cell-name">
				<a href="{$oBlog->getUrlFull()}">
					<img src="{$oBlog->getAvatarPath(48)}" width="48" height="48" alt="avatar" class="avatar" />
				</a>

				<p>
					<a href="#" onclick="return ls.infobox.showInfoBlog(this,{$oBlog->getId()});" class="icon-question-sign"></a>

					{if $oBlog->getType() == 'close'}
						<i title="{$aLang.blog_closed}" class="icon-lock"></i>
					{/if}

					<a href="{$oBlog->getUrlFull()}">{$oBlog->getTitle()|escape:'html'}</a>
				</p>
			</td>

			{if $oUserCurrent}
				<td class="cell-join">
					{if $oUserCurrent->getId() != $oBlog->getOwnerId() and $oBlog->getType() == 'open'}
						<a href="#" onclick="ls.blog.toggleJoin(this, {$oBlog->getId()}); return false;" class="link-dotted">
							{if $oBlog->getUserIsJoin()}
								{$aLang.blog_leave}
							{else}
								{$aLang.blog_join}
							{/if}
						</a>
					{else}
						&mdash;
					{/if}
				</td>
			{/if}

			<td class="cell-readers" id="blog_user_count_{$oBlog->getId()}">{$oBlog->getCountUser()}</td>
			<td class="cell-rating align-center">{$oBlog->getRating()}</td>
		</tr>
	{/foreach}
{/if}