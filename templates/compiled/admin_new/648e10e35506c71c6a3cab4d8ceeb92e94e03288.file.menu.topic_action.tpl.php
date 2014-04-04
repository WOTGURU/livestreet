<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:44
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/content/templates/skin/default/menu.topic_action.tpl" */ ?>
<?php /*%%SmartyHeaderCode:819153587533eb0bc4132c5-64972081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '648e10e35506c71c6a3cab4d8ceeb92e94e03288' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/content/templates/skin/default/menu.topic_action.tpl',
      1 => 1396282795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '819153587533eb0bc4132c5-64972081',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sMenuItemSelect' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bc41eb21_20290056',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bc41eb21_20290056')) {function content_533eb0bc41eb21_20290056($_smarty_tpl) {?><?php if (!is_callable('smarty_function_router')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.router.php';
?><li <?php if ($_smarty_tpl->tpl_vars['sMenuItemSelect']->value=='content'){?>class="active"<?php }?>><a href="<?php echo smarty_function_router(array('page'=>'content'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['content']['plugin_content_menu_title'];?>
</a></li><?php }} ?>