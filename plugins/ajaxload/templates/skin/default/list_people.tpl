{if $aUsers}
	{foreach from=$aUsers item=oUserList}
		{assign var="oSession" value=$oUserList->getSession()}
		<tr>
			<td class="cell-name">
				<a href="{$oUserList->getUserWebPath()}"><img src="{$oUserList->getProfileAvatarPath(48)}" alt="avatar" class="avatar" /></a>
				<div class="name {if !$oUserList->getProfileName()}no-realname{/if}">
					<p class="username word-wrap"><a href="{$oUserList->getUserWebPath()}">{$oUserList->getLogin()}</a></p>
					{if $oUserList->getProfileName()}<p class="realname">{$oUserList->getProfileName()}</p>{/if}
				</div>
			</td>
			<td>
				{if $oUserCurrent}
					<a href="{router page='talk'}add/?talk_users={$oUserList->getLogin()}"><button type="submit"  class="button button-action button-action-send-message"><i class="icon-synio-send-message"></i><span>{$aLang.user_write_prvmsg}</span></button></a>
				{/if}
			</td>
			<td class="cell-skill">{$oUserList->getSkill()}</td>
			<td class="cell-rating {if $oUserList->getRating() < 0}negative{/if}"><strong>{$oUserList->getRating()}</strong></td>
		</tr>
	{/foreach}
{/if}