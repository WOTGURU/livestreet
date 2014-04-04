<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:46
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/filearchive/templates/skin/default/inject_write_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3403260533eb0becf3ff9-00864457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2f5bac0687c1669614399986839d1a28879e58c' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/filearchive/templates/skin/default/inject_write_item.tpl',
      1 => 1389271046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3403260533eb0becf3ff9-00864457',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0becfdab9_49552528',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0becfdab9_49552528')) {function content_533eb0becfdab9_49552528($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.router.php';
?><li class="write-item-type-file">
  <a class="write-item-image" href="<?php echo smarty_function_router(array('page'=>'file'),$_smarty_tpl);?>
add/"></a>
  <a class="write-item-link" href="<?php echo smarty_function_router(array('page'=>'file'),$_smarty_tpl);?>
add/"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['filearchive']['topic_menu_add_file'];?>
</a>
</li><?php }} ?>