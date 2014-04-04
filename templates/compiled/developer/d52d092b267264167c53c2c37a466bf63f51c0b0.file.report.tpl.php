<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:46
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/robostat/templates/skin/default/actions/ActionRobostat/report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1815191266533eb0beb595c8-93672019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd52d092b267264167c53c2c37a466bf63f51c0b0' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/robostat/templates/skin/default/actions/ActionRobostat/report.tpl',
      1 => 1355601848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1815191266533eb0beb595c8-93672019',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aLang' => 0,
    'aRobots' => 0,
    'oRobot' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0beb9b947_75606029',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0beb9b947_75606029')) {function content_533eb0beb9b947_75606029($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h3><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['robostat']['robostat_showstat'];?>
</h3>
<?php if ($_smarty_tpl->tpl_vars['aRobots']->value){?>
<br/>
	<table class="table">
		<thead>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['robostat']['robostat_robot_name'];?>
</td>	
				<td align="center" ><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['robostat']['robostat_robot_today'];?>
</td>												
				<td align="center" ><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['robostat']['robostat_robot_yesterday'];?>
</td>
				<td align="center" ><?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['robostat']['robostat_robot_total'];?>
</td>
			</tr>
		</thead>
		
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['oRobot'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oRobot']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aRobots']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oRobot']->key => $_smarty_tpl->tpl_vars['oRobot']->value){
$_smarty_tpl->tpl_vars['oRobot']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['oRobot']->value->getName();?>
</td>														
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['oRobot']->value->getToday();?>
</td>
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['oRobot']->value->getYesterday();?>
</td>
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['oRobot']->value->getTotal();?>
</td>
			</tr>
		<?php } ?>						
		</tbody>
	</table>
<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['aLang']->value['plugin']['robostat']['robostat_no_stat'];?>

<?php }?>

				

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>