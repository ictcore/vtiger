ICTBroadcast Module Install in Vtiger
====================================

#### Install Module ICTBroadcast
--------------
* __Go to menu__
* __Click Settings__
* __then go to CRM Settings in this show summery part__
* __Click Modules and then click Import Module from zip button__
* __Select Zip file ICTBroadcast Module And click  Import button to install module __
* __When Module installed then changes two files one is Leads modules and second in vtiger core js file  __

#### Leads 
-------------------------------
 vtiger directory >>modules>>Leads>>models>>ListView.php
 
 * Find Function __"getListViewMassActions"__ and add code before __"return $massActionLinks;"__
 * __Code__
 
```json

     $ICTBroadcastModuleModel = Vtiger_Module_Model::getInstance('ICTBroadcast');
	if($ICTBroadcastModuleModel && $currentUserModel->hasModulePermission($ICTBroadcastModuleModel->getId())) {
		$massActionLink = array(
				'linktype' => 'Start Broadcasting',
				'linklabel' => 'Start Broadcasting',
				'linkurl' => 'javascript:Vtiger_List_Js.triggerBroad("index.php?module='.'ICTBroadcast'.'&view=MassActionAjax&mode=showBroadCasting","ICTBroadcast");',
				'linkicon' => ''
			);
			$massActionLinks['LISTVIEWMASSACTION'][] = Vtiger_Link_Model::getInstanceFromValues($massActionLink);
         }
```
#### Vtiger core file (List.js)  
----------------------------------
Check vtiger default layout in the config file
 vtiger directory >>config.inc.php
 and search "Set the default layout" and then go 
 
 vtiger directory >>layouts>>default layout(e.g v7)>>modules>>Vtiger>>resources>>List.js
 
 * Find Function __"triggerSendSms"__ and add function after __"triggerSendSms "__ Function
 * __Code__
```json

  triggerBroad : function(massActionUrl, module){
        var listInstance = app.controller();
        var validationResult = listInstance.checkListRecordSelected();
        if (validationResult != true) {
            app.helper.showProgress();
            app.helper.checkServerConfig(module).then(function (data) {
                app.helper.hideProgress();
                if (data == false) {
                    Vtiger_List_Js.triggerMassAction(massActionUrl);
                } else {
                    app.helper.showAlertBox({message: app.vtranslate('JS_SMS_SERVER_CONFIGURATION')})
                }
            });
        }
        else {
            listInstance.noRecordSelectedAlert();
        }
    },
```
Same file add other code search __"SMSNotifier"__ and add condition after finish __"SMSNotifier" condition__

```json

    if (jQuery(form).find('[name="module"]').val() == 'ICTBroadcast') {
      var statusDetails = data.statusdetails;
      var status = data.status;
      if (status == 'Failed') {
	  var errorMsg = 'Please Choose Correct File According to Campaign Type';
	  app.helper.showErrorNotification({'title': 'File Error', 'message': errorMsg});
      } else {
	  var msg = 'Campaign SuccessFully Created';
	  app.helper.showSuccessNotification({'title': "Campaign", 'message': msg});
      }
    }
```

__Now Module is ready for runnig in Leads Portion__

#### Leads  
-----------
* __Go to menu__
* __Click MARKETING then go to Leads__

[![Image Alt Text](https://www.ictbroadcast.com/sites/default/files/vtiger_ictbroadcast/vtiger-leads-step-1.jpg)](https://www.ictbroadcast.com/sites/default/files/vtiger_ictbroadcast/vtiger-leads-step-1.jpg)

* __Select Lead __
* __Click More Button Place at the top of the list__
* __Click Start Broadcasting __

[![Image Alt Text](https://www.ictbroadcast.com/sites/default/files/vtiger_ictbroadcast/vtiger-leads-step-2.jpg)](https://www.ictbroadcast.com/sites/default/files/vtiger_ictbroadcast/vtiger-leads-step-2.jpg)

* __Open Popup Window and first enter group name 2nd select campaign type 3rd choose file __

[![Image Alt Text](https://www.ictbroadcast.com/sites/default/files/vtiger_ictbroadcast/vtiger-leads-step-3.jpg)](https://www.ictbroadcast.com/sites/default/files/vtiger_ictbroadcast/vtiger-leads-step-3.jpg)

* __if Select message campaign or press 1 campaign choose wav file and if you select fax campaign choose pdf or tiff file  __
* __Last step click "New Campaign" button the campaign created and starting ICTBroadcast server and vtiger give success message __


