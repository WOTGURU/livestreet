{assign var="bNoSidebar" value=true}
{assign var="noSidebar" value=true}
{include file='header.tpl'}

  <div class="BlockseditorEditor">
    <h2 class="page-header">{$aLang.plugin.blockseditor.Title}</h2>
    
    <form action="{router page='blockseditor'}" method="post" enctype="application/x-www-form-urlencoded">
      <input type="hidden" name="security_ls_key" value="{$LIVESTREET_SECURITY_KEY}" />
      <textarea name="blockseditor" rows="20" class="input-text input-width-full">{$oConfig->GetValue("plugin.blockseditor.Block_Content")|escape:'html'}</textarea>
      <br /><br />
      {$aLang.plugin.blockseditor.Priority}:
      <input type="text" name="priority" value="{$oConfig->GetValue("plugin.blockseditor.Priority")}" class="input-text input-width-250" />
      <br /><br />
      {$aLang.plugin.blockseditor.ActionsToShow}:
      <input type="text" name="actions" value="{$oConfig->GetValue("plugin.blockseditor.Actions")}" class="input-text input-width-250" />
      <br /><br />
      <input type="submit" name="submit_edit_block_content" value="{$aLang.plugin.blockseditor.Submit}" class="button button-primary" />
    </form>

  </div>

{include file='footer.tpl'}