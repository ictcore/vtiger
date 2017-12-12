<?php /* Smarty version Smarty-3.1.7, created on 2017-11-21 09:15:21
         compiled from "/usr/ictcore/wwwroot/vtigercrm/includes/runtime/../../layouts/v7/modules/Settings/ExtensionStore/InstallationLog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14661677035a13eea92c1fa4-52210279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eedb265b358e170108e923dfb5d0a51ef9ba621e' => 
    array (
      0 => '/usr/ictcore/wwwroot/vtigercrm/includes/runtime/../../layouts/v7/modules/Settings/ExtensionStore/InstallationLog.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14661677035a13eea92c1fa4-52210279',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ERROR' => 0,
    'QUALIFIED_MODULE' => 0,
    'ERROR_MESSAGE' => 0,
    'MODULE_ACTION' => 0,
    'TARGET_MODULE_INSTANCE' => 0,
    'MODULE_FILE_NAME' => 0,
    'MODULE_PACKAGE' => 0,
    'EXTENSION_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a13eea939c37',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a13eea939c37')) {function content_5a13eea939c37($_smarty_tpl) {?>
<div class="modal-dialog modal-lg installationLog"><div class='modal-content'><div class="modal-header" style="background: #596875;color:white;"><div class="row"><div class="col-lg-11 col-md-11"><?php if ($_smarty_tpl->tpl_vars['ERROR']->value){?><input type="hidden" name="installationStatus" value="error" /><h3 class="modal-title" style="color: red"><?php echo vtranslate('LBL_INSTALLATION_FAILED',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><?php }else{ ?><input type="hidden" name="installationStatus" value="success" /><h3 class="modal-title"><?php echo vtranslate('LBL_SUCCESSFULL_INSTALLATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3><?php }?></div><div class="col-lg-1 col-md-1"><button class="close" aria-hidden="true" data-dismiss="modal" type="button" title="<?php echo vtranslate('LBL_CLOSE');?>
">X</button></div></div></div><div class="modal-body" id="installationLog"><?php if ($_smarty_tpl->tpl_vars['ERROR']->value){?><p style="color:red;"><?php echo vtranslate($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</p><?php }else{ ?><div class="row"><span class="col-sm-12 col-xs-12 font-x-x-large"><?php echo vtranslate('LBL_INSTALLATION_LOG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</span></div><div id="extensionInstallationInfo" class="backgroundImageNone" style="background-color: white;padding: 2%;"><?php if ($_smarty_tpl->tpl_vars['MODULE_ACTION']->value=="Upgrade"){?><?php echo $_smarty_tpl->tpl_vars['MODULE_PACKAGE']->value->update($_smarty_tpl->tpl_vars['TARGET_MODULE_INSTANCE']->value,$_smarty_tpl->tpl_vars['MODULE_FILE_NAME']->value);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['MODULE_PACKAGE']->value->import($_smarty_tpl->tpl_vars['MODULE_FILE_NAME']->value,'false');?>
<?php ob_start();?><?php echo Settings_ExtensionStore_ODExtension_Model::updateTrackDetails($_smarty_tpl->tpl_vars['EXTENSION_NAME']->value);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['TRACKER_UPDATED'] = new Smarty_variable($_tmp1, null, 0);?><?php }?><?php ob_start();?><?php echo unlink($_smarty_tpl->tpl_vars['MODULE_FILE_NAME']->value);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['UNLINK_RESULT'] = new Smarty_variable($_tmp2, null, 0);?></div><?php }?></div><div class="modal-footer"><span class="pull-right"><button class="btn btn-success" id="importCompleted" onclick="location.reload()"><?php echo vtranslate('LBL_OK',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></span></div></div></div><?php }} ?>