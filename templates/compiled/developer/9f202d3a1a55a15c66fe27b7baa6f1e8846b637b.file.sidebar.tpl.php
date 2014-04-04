<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:46
         compiled from "/home/w/wotgur/wot.guru/public_html/templates/skin/developer/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1383365863533eb0bedf3251-25443117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f202d3a1a55a15c66fe27b7baa6f1e8846b637b' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/templates/skin/developer/sidebar.tpl',
      1 => 1396272456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1383365863533eb0bedf3251-25443117',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sidebarPosition' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bedfb6a2_49466416',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bedfb6a2_49466416')) {function content_533eb0bedfb6a2_49466416($_smarty_tpl) {?><aside id="sidebar" <?php if ($_smarty_tpl->tpl_vars['sidebarPosition']->value=='left'){?>class="sidebar-left"<?php }?>>
	<?php echo $_smarty_tpl->getSubTemplate ('blocks.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('group'=>'right'), 0);?>

</aside><?php }} ?>