<?php /* Smarty version Smarty-3.1.7, created on 2017-12-12 08:17:20
         compiled from "/usr/ictcore/wwwroot/vtigercrm/includes/runtime/../../layouts/v7/modules/Settings/SMSNotifier/TextAnyWhereEditField.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3033280565a2f9090727ca3-04095621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0011d34632c48d88e7594dcbd2c379ef0037be1' => 
    array (
      0 => '/usr/ictcore/wwwroot/vtigercrm/includes/runtime/../../layouts/v7/modules/Settings/SMSNotifier/TextAnyWhereEditField.tpl',
      1 => 1511246258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3033280565a2f9090727ca3-04095621',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a2f9090787f2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2f9090787f2')) {function content_5a2f9090787f2($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ProviderEditFields.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="alert-info alert col-lg-12"><div>In the Originator field, enter one of the following:<br /><br />1. The 11 characters to be sent with each SMS<br />2. The mobile number to be sent with each SMS<br />3. The email address to which any SMS replies will be sent<br /></div><br><div><div><a href="http://www.textanywhere.net/static/Products/VTiger_Capabilities.aspx" target="_blank">Help</a></div><div><a href="https://www.textapp.net/web/textanywhere/" target="_blank">Account Login</a></div><div><a href="https://www.textapp.net/web/textanywhere/Register/Register.aspx" target="_blank">Create Account</a></div></div></div><?php }} ?>