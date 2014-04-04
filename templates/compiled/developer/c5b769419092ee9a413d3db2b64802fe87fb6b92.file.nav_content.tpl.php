<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:46
         compiled from "/home/w/wotgur/wot.guru/public_html/templates/skin/developer/nav_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1843535246533eb0bed995a0-81382571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5b769419092ee9a413d3db2b64802fe87fb6b92' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/templates/skin/developer/nav_content.tpl',
      1 => 1396420037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1843535246533eb0bed995a0-81382571',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'aMenuContainers' => 0,
    'aMenuFetch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bedaa838_79562357',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bedaa838_79562357')) {function content_533eb0bedaa838_79562357($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['menu']->value){?>
	<?php if (in_array($_smarty_tpl->tpl_vars['menu']->value,$_smarty_tpl->tpl_vars['aMenuContainers']->value)){?><?php echo $_smarty_tpl->tpl_vars['aMenuFetch']->value[$_smarty_tpl->tpl_vars['menu']->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->getSubTemplate ("menu.".($_smarty_tpl->tpl_vars['menu']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
<?php }?><?php }} ?>