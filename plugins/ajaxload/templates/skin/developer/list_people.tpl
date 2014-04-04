{if $aUsers}
	{foreach from=$aUsers item=oUserList}
		{assign var="oSession" value=$oUserList->getSession()}
		<tr>
			<td class="cell-name">
				<a href="{$oUserList->getUserWebPath()}"><img src="{$oUserList->getProfileAvatarPath(24)}" alt="avatar" class="avatar" /></a>
				<p class="username word-wrap"><a href="{$oUserList->getUserWebPath()}">{$oUserList->getLogin()}</a></p>
			</td>
			<td class="cell-date">{if $oSession}{date_format date=$oSession->getDateLast() format="d.m.y, H:i"}{/if}</td>
			<td class="cell-date">{date_format date=$oUserList->getDateRegister() format="d.m.y, H:i"}</td>
			<td class="cell-skill">{$oUserList->getSkill()}</td>
			<td class="cell-rating"><strong>{$oUserList->getRating()}</strong></td>
		</tr>
	{/foreach}
{/if}