<?php /* Smarty version Smarty-3.1.8, created on 2014-04-04 17:16:44
         compiled from "/home/w/wotgur/wot.guru/public_html/plugins/pw/templates/skin/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1765179978533eb0bc2eb429-63116572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6fccf6f17c4c96618c0f0fe8e6d23d507cad80b' => 
    array (
      0 => '/home/w/wotgur/wot.guru/public_html/plugins/pw/templates/skin/default/header.tpl',
      1 => 1387042980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1765179978533eb0bc2eb429-63116572',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_533eb0bc2f3dc0_18226435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533eb0bc2f3dc0_18226435')) {function content_533eb0bc2f3dc0_18226435($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cfg')) include '/home/w/wotgur/wot.guru/public_html/engine/modules/viewer/plugs/function.cfg.php';
?><script type="text/javascript" src="<?php echo smarty_function_cfg(array('name'=>"path.root.web"),$_smarty_tpl);?>
/engine/lib/external/prettyPhoto/js/prettyPhoto.js"></script>
<link rel='stylesheet' type='text/css' href="<?php echo smarty_function_cfg(array('name'=>"path.root.web"),$_smarty_tpl);?>
/engine/lib/external/prettyPhoto/css/prettyPhoto.css" />


    <script>
        jQuery(document).ready(function($){
            $('.photoset-image').prettyPhoto({
                social_tools:'',
                show_title: false,
                slideshow:false,
                deeplinking: false
            });
        });
    </script>

<?php }} ?>