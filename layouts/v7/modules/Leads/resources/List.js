/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/


Vtiger_List_Js("Leads_List_Js", {
	triggerBroad : function(massActionUrl, module){
	  
	  var listInstance = app.controller();
		var validationResult = listInstance.checkListRecordSelected();
		if (validationResult != true) {

		  alert('hello');
			/*app.helper.showProgress();
			app.helper.checkServerConfig(module).then(function (data) {
				app.helper.hideProgress();
				alert(module);
				if (data == false) {
				  //alert(786);
				 // alert(massActionUrl);
					Vtiger_List_Js.triggerMassAction(massActionUrl);
				} else {
					app.helper.showAlertBox({message: app.vtranslate('JS_SMS_SERVER_CONFIGURATION')})
				}*/
                Vtiger_List_Js.triggerMassAction(massActionUrl);



			//});
		}
		else {
			listInstance.noRecordSelectedAlert();
		}
	}
}, 
{

});