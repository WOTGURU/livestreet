<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:44
         compiled from "/home/w/wotgur/wot.guru/public_html/templates/skin/developer/toolbar_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204857913533eb0bc42e0c8-70275428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '609d3701149c7444a5526a588f9aaf626a29bccb' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/templates/skin/developer/toolbar_admin.tpl',
      1 => 1396272458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204857913533eb0bc42e0c8-70275428',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bc43a327_00278015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bc43a327_00278015')) {function content_533eb0bc43a327_00278015($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.router.php';
?><?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value&&$_smarty_tpl->tpl_vars['oUserCurrent']->value->isAdministrator()){?>
<section class="toolbar-admin">
	<a href="<?php echo smarty_function_router(array('page'=>'admin'),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['aLang']->value['admin_title'];?>
">
		<i class="icon-cog"></i>
	</a>
</section>
<?php }?><?php }} ?>