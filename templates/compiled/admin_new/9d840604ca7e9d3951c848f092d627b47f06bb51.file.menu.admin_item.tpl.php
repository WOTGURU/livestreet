<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:44
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/admintopic/templates/skin/default/menu.admin_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:973553841533eb0bc4024e8-25690037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d840604ca7e9d3951c848f092d627b47f06bb51' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/admintopic/templates/skin/default/menu.admin_item.tpl',
      1 => 1372413838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '973553841533eb0bc4024e8-25690037',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sMenuSubItemSelect' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bc40e322_78014215',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bc40e322_78014215')) {function content_533eb0bc40e322_78014215($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.router.php';
?><li <?php if ($_smarty_tpl->tpl_vars['sMenuSubItemSelect']->value=='plugins_admin_admintopic'){?>class="active"<?php }?>>
<a href="<?php echo smarty_function_router(array('page'=>'admin'),$_smarty_tpl);?>
plugins/admintopic"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admintopic']['menu_item'];?>
</a>
</li><?php }} ?>