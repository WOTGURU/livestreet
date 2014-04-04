{assign var="bNoSidebar" value=true}
{assign var="noSidebar" value=true}
{include file='header.tpl'}

	<div class="RobotstxtEditor">
		<h2 class="page-header">{$aLang.plugin.robotstxt.Title}</h2>
		
		<form action="{router page='robotstxt'}" method="post" enctype="application/x-www-form-urlencoded">
			<input type="hidden" name="security_ls_key" value="{$LIVESTREET_SECURITY_KEY}" />
			<textarea name="robotstxt" rows="20" class="input-text input-width-full">{$oConfig->GetValue("plugin.robotstxt.Robots_Txt_Content")}</textarea>
			<br /><br />
			<input type="submit" name="submit_edit_robots" value="{$aLang.plugin.robotstxt.Submit}" class="button button-primary" />
		</form>

	</div>

{include file='footer.tpl'}