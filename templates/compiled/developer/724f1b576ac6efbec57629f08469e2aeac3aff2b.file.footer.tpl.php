<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:46
         compiled from "/home/w/wotgur/wot.guru/public_html/templates/skin/developer/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1426518185533eb0beddb960-08279136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '724f1b576ac6efbec57629f08469e2aeac3aff2b' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/templates/skin/developer/footer.tpl',
      1 => 1396272451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1426518185533eb0beddb960-08279136',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'noSidebar' => 0,
    'sidebarPosition' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bedf0b03_86069007',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bedf0b03_86069007')) {function content_533eb0bedf0b03_86069007($_smarty_tpl) {?><?php if (!is_callable('smarty_function_hook')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.hook.php';
?>			<?php echo smarty_function_hook(array('run'=>'content_end'),$_smarty_tpl);?>

		</div> <!-- /content -->

		
		<?php if (!$_smarty_tpl->tpl_vars['noSidebar']->value&&$_smarty_tpl->tpl_vars['sidebarPosition']->value!='left'){?>
			<?php echo $_smarty_tpl->getSubTemplate ('sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php }?>
	</div> <!-- /wrapper -->

	
	<footer id="footer">
		<div class="copyright">
			<?php echo smarty_function_hook(array('run'=>'copyright'),$_smarty_tpl);?>

		</div>
		
		Автор шаблона &mdash; <a href="http://deniart.ru">deniart</a>
		
		<?php echo smarty_function_hook(array('run'=>'footer_end'),$_smarty_tpl);?>

	</footer>

</div> <!-- /container -->

<?php echo $_smarty_tpl->getSubTemplate ('toolbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo smarty_function_hook(array('run'=>'body_end'),$_smarty_tpl);?>


</body>
</html><?php }} ?>