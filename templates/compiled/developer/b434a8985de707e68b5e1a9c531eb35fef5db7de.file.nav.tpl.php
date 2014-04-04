<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:46
         compiled from "/home/w/wotgur/wot.guru/public_html/templates/skin/developer/nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:623485957533eb0bed6aca5-23906074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b434a8985de707e68b5e1a9c531eb35fef5db7de' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/templates/skin/developer/nav.tpl',
      1 => 1396420032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '623485957533eb0bed6aca5-23906074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sMenuHeadItemSelect' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bed95b53_86025840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bed95b53_86025840')) {function content_533eb0bed95b53_86025840($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cfg')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.cfg.php';
if (!is_callable('smarty_function_router')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_hook')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.hook.php';
?><nav id="nav">
	<ul class="nav nav-main">
		<li <?php if ($_smarty_tpl->tpl_vars['sMenuHeadItemSelect']->value=='blog'){?>class="active"<?php }?>><a href="<?php echo smarty_function_cfg(array('name'=>'path.root.web'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['topic_title'];?>
</a></li>
		<li <?php if ($_smarty_tpl->tpl_vars['sMenuHeadItemSelect']->value=='blogs'){?>class="active"<?php }?>><a href="<?php echo smarty_function_router(array('page'=>'blogs'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['blogs'];?>
</a></li>
		<li <?php if ($_smarty_tpl->tpl_vars['sMenuHeadItemSelect']->value=='people'){?>class="active"<?php }?>><a href="<?php echo smarty_function_router(array('page'=>'people'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['people'];?>
</a></li>
		<li <?php if ($_smarty_tpl->tpl_vars['sMenuHeadItemSelect']->value=='stream'){?>class="active"<?php }?>><a href="<?php echo smarty_function_router(array('page'=>'stream'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['stream_menu'];?>
</a></li>

		<?php echo smarty_function_hook(array('run'=>'main_menu_item'),$_smarty_tpl);?>

	</ul>
	<?php echo smarty_function_hook(array('run'=>'main_menu'),$_smarty_tpl);?>

</nav><?php }} ?>