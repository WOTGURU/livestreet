{include file='header.tpl' menu='blog'}
	{if !$aBlogs}
		<p>{$aLang.plugin.content.no_blogs_for_mass_publication}</p>
	{else}
		<form enctype="multipart/form-data" name="test" method="post" action="{router page='content'}">
		<p>{$aLang.plugin.content.select_a_blog}</p>
		<p> 
			<select name="blog_id" size="1">
				{foreach from=$aBlogs item=oBlog}
							<option value="{$oBlog->getId()}">{$oBlog->getTitle()|escape:'html'}[{$oBlog->getId()|escape:'html'}]  </option>
				{/foreach}  
			</select>
		</p>
		<p>{$aLang.plugin.content.rss_with_materrials}<br /><input name="rss" type="text" size="40"></p><br />
		<p>{$aLang.plugin.content.file_with_materrials}<br /><input type="file" name="import_file" size="20"></p>
		<p><input type="hidden" name="security_ls_key" value="{$LIVESTREET_SECURITY_KEY}" /></p>
		<p><input type="submit" value="{$aLang.plugin.content.publish_materrials}" name="go"></p>	
		</form>
	 {/if}	
{include file='footer.tpl'}