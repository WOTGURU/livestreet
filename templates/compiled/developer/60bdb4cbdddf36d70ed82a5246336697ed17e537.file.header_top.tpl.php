<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:46
         compiled from "/home/w/wotgur/wot.guru/public_html/templates/skin/developer/header_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:476901717533eb0bed0ef97-86920962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60bdb4cbdddf36d70ed82a5246336697ed17e537' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/templates/skin/developer/header_top.tpl',
      1 => 1396456154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '476901717533eb0bed0ef97-86920962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUserCurrent' => 0,
    'aLang' => 0,
    'iUserCurrentCountTalkNew' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bed65c44_45738772',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bed65c44_45738772')) {function content_533eb0bed65c44_45738772($_smarty_tpl) {?><?php if (!is_callable('smarty_function_hook')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_router')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_cfg')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.cfg.php';
?><nav id="userbar" class="clearfix">
	<?php echo smarty_function_hook(array('run'=>'userbar_nav'),$_smarty_tpl);?>

	
	<ul class="nav nav-userbar">
		<?php if ($_smarty_tpl->tpl_vars['oUserCurrent']->value){?>
			<li class="nav-userbar-username">
				<a href="<?php echo $_smarty_tpl->tpl_vars['oUserCurrent']->value->getUserWebPath();?>
" class="username">
					<img src="<?php echo $_smarty_tpl->tpl_vars['oUserCurrent']->value->getProfileAvatarPath(24);?>
" alt="avatar" class="avatar" />
					<?php echo $_smarty_tpl->tpl_vars['oUserCurrent']->value->getLogin();?>

				</a>
			</li>
			<li><a href="<?php echo smarty_function_router(array('page'=>'topic'),$_smarty_tpl);?>
add/" class="write" id="modal_write_show"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['block_create'];?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['oUserCurrent']->value->getUserWebPath();?>
favourites/topics/"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['user_menu_profile_favourites'];?>
</a></li>
			<li><a href="<?php echo smarty_function_router(array('page'=>'talk'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['iUserCurrentCountTalkNew']->value){?>class="new-messages"<?php }?> id="new_messages" title="<?php if ($_smarty_tpl->tpl_vars['iUserCurrentCountTalkNew']->value){?><?php echo $_smarty_tpl->tpl_vars['aLang']->value['user_privat_messages_new'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['user_privat_messages'];?>
<?php if ($_smarty_tpl->tpl_vars['iUserCurrentCountTalkNew']->value){?> (<?php echo $_smarty_tpl->tpl_vars['iUserCurrentCountTalkNew']->value;?>
)<?php }?></a></li>
			<li><a href="<?php echo smarty_function_router(array('page'=>'settings'),$_smarty_tpl);?>
profile/"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['user_settings'];?>
</a></li>
			<?php echo smarty_function_hook(array('run'=>'userbar_item'),$_smarty_tpl);?>

			<li><a href="<?php echo smarty_function_router(array('page'=>'login'),$_smarty_tpl);?>
exit/?security_ls_key=<?php echo $_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['exit'];?>
</a></li>
		<?php }else{ ?>
			<?php echo smarty_function_hook(array('run'=>'userbar_item'),$_smarty_tpl);?>

			<li><a href="<?php echo smarty_function_router(array('page'=>'login'),$_smarty_tpl);?>
" class="js-login-form-show"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['user_login_submit'];?>
</a></li>
			<li><a href="<?php echo smarty_function_router(array('page'=>'registration'),$_smarty_tpl);?>
" class="js-registration-form-show"><?php echo $_smarty_tpl->tpl_vars['aLang']->value['registration_submit'];?>
</a></li>
		<?php }?>
	</ul>
</nav>


<header id="header" role="banner">
	<?php echo smarty_function_hook(array('run'=>'header_banner_begin'),$_smarty_tpl);?>

	<hgroup class="site-info">
		<h1 class="site-name"><a href="<?php echo smarty_function_cfg(array('name'=>'path.root.web'),$_smarty_tpl);?>
"><?php echo smarty_function_cfg(array('name'=>'view.name'),$_smarty_tpl);?>
</a></h1>
		<h2 class="site-description"><?php echo smarty_function_cfg(array('name'=>'view.description'),$_smarty_tpl);?>
</h2>
	</hgroup>
	<?php echo smarty_function_hook(array('run'=>'header_banner_end'),$_smarty_tpl);?>

</header><?php }} ?>