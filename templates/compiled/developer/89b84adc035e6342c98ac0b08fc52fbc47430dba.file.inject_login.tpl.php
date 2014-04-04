<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:59:15
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/autoopenid/templates/skin/default/inject_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:414434164533ebab37d96a9-28853469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89b84adc035e6342c98ac0b08fc52fbc47430dba' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/autoopenid/templates/skin/default/inject_login.tpl',
      1 => 1395063968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '414434164533ebab37d96a9-28853469',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'sTemplateWebPathPlugin' => 0,
    '_aRequest' => 0,
    'aRouter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533ebab3827992_40128383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533ebab3827992_40128383')) {function content_533ebab3827992_40128383($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cfg')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.cfg.php';
if (!is_callable('smarty_function_router')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.router.php';
?>﻿<div id="openid_block" style="margin-bottom: 25px; border-bottom: #999 2px solid; padding-bottom: 15px;">

<style>.hidden {display: none;}</style>


<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['autoopenid']['openid_enter_title_alter2'];?>

<table style="width: 100%;"> 
<tr>
<td>
<a style="display:inline-block;width:24px;height:24px;margin:0 7px 0 0;background:url(<?php echo $_smarty_tpl->tpl_vars['sTemplateWebPathPlugin']->value;?>
img/auth_icons.png) -96px 0" href="#" onclick="fb_open()" rel="open_facebook"title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['autoopenid']['openid_enter_title'];?>
 Facebook"></a>
<a style="display:inline-block;width:24px;height:24px;margin:0 7px 0 0;background:url(<?php echo $_smarty_tpl->tpl_vars['sTemplateWebPathPlugin']->value;?>
img/auth_icons.png) -24px 0"  href="#" onclick="javascript: openid_vk()" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['autoopenid']['openid_enter_title'];?>
 ВКонтакте"></a>
<a style="display:inline-block;width:24px;height:24px;margin:0 7px 0 0;background:url(<?php echo $_smarty_tpl->tpl_vars['sTemplateWebPathPlugin']->value;?>
img/auth_icons.png) -72px 0" href="#" onclick="javascript: openid_twitter()" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['autoopenid']['openid_enter_title'];?>
 Twitter"></a>
<a style="display:inline-block;width:24px;height:24px;margin:0 7px 0 0;background:url(<?php echo $_smarty_tpl->tpl_vars['sTemplateWebPathPlugin']->value;?>
img/auth_icons.png) -0px 0" href="#" onclick="javascript: openid_google()" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['autoopenid']['openid_enter_title'];?>
 Google"></a>
<a style="display:inline-block;width:24px;height:24px;margin:0 7px 0 0;background:url(<?php echo $_smarty_tpl->tpl_vars['sTemplateWebPathPlugin']->value;?>
img/auth_icons.png) -168px 0" href="#" onclick="javascript: openid_yandex()" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['autoopenid']['openid_enter_title'];?>
 Yandex"></a>
</td>
<td style="text-align: right;">
<a style="font-size: 11px;" href="#" onclick="jQuery('.js-openid-manual').toggle();"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['autoopenid']['openid_enter_title_openid'];?>
</a>
</td>
</tr>
</table>
<div class="hidden js-openid-manual">
<div class="lite-note" style="margin-top: 5px;" ><label for="login-input"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['autoopenid']['openid'];?>
</label>
<br>
<input type="text" class="input-text" maxlength="255" name="open_login" id="open_login" style="width: 300px;"/>
<input type="hidden" name="submit_open_login" id="submit_open_login_hidden" value="go"/>
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_aRequest']->value['return'];?>
" name="return" id="rreturn" />
					<button onclick="authRedir();return false;"  type="button" name="openid_button" class="button"><span><em><?php echo $_smarty_tpl->tpl_vars['aLang']->value['user_login_submit'];?>
</em></span></button>
</div>
</div>
<div id="vk_api_transport"></div>


<script type="text/javascript">
var sVkTransportPath='<?php echo smarty_function_cfg(array('name'=>'plugin.autoopenid.vk.transport_path'),$_smarty_tpl);?>
';
var iVkAppId='<?php echo smarty_function_cfg(array('name'=>'plugin.autoopenid.vk.id'),$_smarty_tpl);?>
';
var sVkLoginPath='<?php echo $_smarty_tpl->tpl_vars['aRouter']->value['login'];?>
'+'openid/vk/';
var vkScope='<?php echo smarty_function_cfg(array('name'=>'plugin.autoopenid.vk.scope'),$_smarty_tpl);?>
';
var fbAppId='<?php echo smarty_function_cfg(array('name'=>'plugin.autoopenid.fb.id'),$_smarty_tpl);?>
';
var fbLoginPath='<?php echo $_smarty_tpl->tpl_vars['aRouter']->value['login'];?>
'+'openid/fb/';
var fbScope='<?php echo smarty_function_cfg(array('name'=>'plugin.autoopenid.fb.scope'),$_smarty_tpl);?>
';
var sTwitterLoginPath='<?php echo $_smarty_tpl->tpl_vars['aRouter']->value['login'];?>
'+'openid/twitter/?authorize=1';
var base_redir_url = "<?php echo smarty_function_router(array('page'=>'login'),$_smarty_tpl);?>
openid/enter/";


	function getEl(id) {
		return document.getElementById(id);
	}

	function openid_yandex() {
		getEl('open_login').value='openid.yandex.ru';		
		authRedir();

	}
	
	function openid_rambler() {
		getEl('open_login').value='rambler.ru';		
		authRedir();
	}
	
	function openid_google() {
		getEl('open_login').value='https://www.google.com/accounts/o8/id';		
		authRedir();
	}
	function authRedir(){
		
		if (getEl('open_login').value) {
			str = base_redir_url+"?submit_open_login=go&open_login="+getEl('open_login').value+"&return="+getEl('rreturn').value;
			openid_setCookie("openid_referrer", window.location.href, 1);
			window.location = str;
		} else	{
			
			alert('Не указан OpenId');

		}

	}


	function openid_vk() {		
		openid_setCookie("openid_referrer", window.location.href, 1);
		window.location ='http://api.vkontakte.ru/oauth/authorize?client_id='+iVkAppId+'&redirect_uri='+sVkLoginPath+'&scope='+encodeURI(vkScope);  
	}	
	
   var w;
   function fb_open() {
		openid_setCookie("openid_referrer", window.location.href, 1);		
		window.location = 'https://www.facebook.com/dialog/oauth?client_id='+fbAppId+'&redirect_uri='+fbLoginPath+'&scope='+encodeURI(fbScope);
	  }
	function openid_twitter() {
		openid_setCookie("openid_referrer", window.location.href, 1);			
		window.location = sTwitterLoginPath;
	}	


	function openid_setCookie(c_name,value,exdays)
	{
		var exdate=new Date();
		exdate.setDate(exdate.getDate() + exdays);
		var c_value=escape(value) + ((exdays==null) ? "" : ";expires="+exdate.toUTCString())+";path=/";
		document.cookie=c_name + "=" + c_value;
	}	
	
</script>



</div>
<?php }} ?>