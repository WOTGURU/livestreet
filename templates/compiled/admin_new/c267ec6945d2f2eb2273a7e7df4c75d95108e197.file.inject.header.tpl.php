<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:44
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/native/templates/skin/default/inject.header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1033859416533eb0bc301067-74494112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c267ec6945d2f2eb2273a7e7df4c75d95108e197' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/native/templates/skin/default/inject.header.tpl',
      1 => 1347613978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1033859416533eb0bc301067-74494112',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'oConfig' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bc313eb1_39237643',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bc313eb1_39237643')) {function content_533eb0bc313eb1_39237643($_smarty_tpl) {?><?php if (!is_callable('smarty_function_json')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.json.php';
if (!is_callable('smarty_function_lang_load')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.lang_load.php';
?><script type="text/javascript">
	<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
    	ls.registry.set('user_is_authorization',<?php echo smarty_function_json(array('var'=>true),$_smarty_tpl);?>
);
	<?php }else{ ?>
    	ls.registry.set('user_is_authorization',<?php echo smarty_function_json(array('var'=>false),$_smarty_tpl);?>
);
	<?php }?>

    ls.lang.load(<?php echo smarty_function_lang_load(array('name'=>"comment_answer"),$_smarty_tpl);?>
);
    ls.registry.set('plugin.native.add_comment_show_popup',<?php echo smarty_function_json(array('var'=>$_smarty_tpl->tpl_vars['oConfig']->value->Get('plugin.native.add_comment_show_popup')),$_smarty_tpl);?>
);
</script>
<?php }} ?>