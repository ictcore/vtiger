<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class HelloWorld_MassSaveAjax_Action extends Vtiger_Mass_Action {

	function checkPermission(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);

		$currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if(!$currentUserPriviligesModel->hasModuleActionPermission($moduleModel->getId(), 'Save')) {
			throw new AppException(vtranslate($moduleName).' '.vtranslate('LBL_NOT_ACCESSIBLE'));
		}
	}

	/**
	 * Function that saves SMS records
	 * @param Vtiger_Request $request
	 */
	public function process(Vtiger_Request $request) {
		$moduleName = $request->getModule();

		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$moduleModel = Vtiger_Module_Model::getInstance('Leads');
		$recordIds = $this->getRecordsListFromRequest($request);
		$group = $request->get('group');
		$campaing_type = $request->get('campaing_type');


		?>
		<?php
     $json_data = array();
     $arguments = array('contact_group'=> array('name' => $group));
     $result  = $this->broadcast_api('Contact_Group_Create', $arguments);
     if($result[0] == true) {
       $contact_group_id = $result[1];
      // print_r($contact_id);
       $json_data['group_id'] = $contact_group_id;
       $json_data['campaign_type'] = $campaing_type;

     } else {
       $errmsg = $result[1];
       //print_r($errmsg);
       return $errmsg;
     }

		$nameFields = $moduleModel->getFieldsByLabel();
		 foreach($nameFields as $key=>$test)
        {
          

           $fieldInfo[$key]  = $test->get('name');

        }
   //unset($fieldInfo[2],$fieldInfo[5],$fieldInfo[7],$fieldInfo[8],$fieldInfo[9],$fieldInfo[11],$fieldInfo[12],$fieldInfo[13],$fieldInfo[14],$fieldInfo[15],$fieldInfo[16],$fieldInfo[17],$fieldInfo[18],$fieldInfo[19],$fieldInfo[20],$fieldInfo[21],$fieldInfo[22],$fieldInfo[23],$fieldInfo[24],$fieldInfo[25],$fieldInfo[26],$fieldInfo[27],$fieldInfo[28],$fieldInfo[29]);
          
   unset($fieldInfo['Lead No'],$fieldInfo['Company'],$fieldInfo['Designation'],$fieldInfo['Lead Source'],$fieldInfo['Industry'],$fieldInfo['Website'],$fieldInfo['Annual Revenue'],$fieldInfo['Lead Status'],$fieldInfo['No Of Employees'],$fieldInfo['Rating'],$fieldInfo['Secondary Email'],$fieldInfo['Assigned To'],$fieldInfo['Modified Time'],$fieldInfo['Created Time'],$fieldInfo['Last Modified By'],$fieldInfo['Email Opt Out'],$fieldInfo['Street'],$fieldInfo['Po Box'],$fieldInfo['Postal Code'],$fieldInfo['City'],$fieldInfo['Country'],$fieldInfo['State'],$fieldInfo['Description']);

       // echo "<pre>hhhh";print_r($fieldInfo);
        // exit;
		foreach($recordIds as $recordId) {
			$recordModel = Vtiger_Record_Model::getInstanceById($recordId);
			$numberSelected = false;
			foreach($fieldInfo as $key=>$fieldname) {
				$fieldValue = $recordModel->get($fieldname);
				if(!empty($fieldValue)) {
					$toNumbers[$recordId][$key] = $fieldValue;

					//echo $toNumbers['First Name'.'_'.$recordId];
					$numberSelected = true;
				}
			}
			if($numberSelected) {
				$recordIds[] = $recordId;
			}
		}

		foreach($toNumbers as  $c_data){
//echo "<pre>hhhhoo";print_r($c_data['First Name']);

           $contact = array(
                'phone' => $c_data['Phone'], 
                'first_name'=>$c_data['First Name'], 
                'last_name'=>$c_data['Last Name'], 
                'email'=> $c_data['Email']
     );
     $arguments = array('contact'=>$contact, 'contact_group_id'=> $json_data['group_id']);
     $result  = $this->broadcast_api('Contact_Create', $arguments);
     if($result[0] == true) {
       $contact_id = $result[1];
      // print_r($contact_id);
     } else {
       $errmsg = $result[1];
       return $errmsg;
     }





		}
//echo "<pre>hhhh";print_r($json_data);

 // echo "<script> window.open(".$external_link.", '_blank') </script>";
     //    exit;
//exit;
		$response = new Vtiger_Response();

		if(!empty($toNumbers)) {
		
			$response->setResult($json_data);
		} else {
			$response->setResult($json_data);
		}
		return $response;
	}



function broadcast_api($method, $arguments = array()) {
      // update following with proper access info
      $api_username = 'zuha';    // <=== Username at ICTBroadcast
      $api_password = 'godisone';  // <=== Password at ICTBroadcast
      $service_url  = 'http://202.142.186.26/rest'; // <=== URL for ICTBroadcast REST APIs

      $post_data    = array(
        'api_username' => $api_username,
        'api_password' => $api_password
      );
      $api_url = "$service_url/$method";
      $curl = curl_init($api_url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, true);

      foreach($arguments as $key => $value) {
        if(is_array($value)){
          $post_data[$key] = json_encode($value);
        } else {
          $post_data[$key] = $value;
        }
      }
      curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
      // enable following line in case, having trouble with certificate validation
      // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      $curl_response = curl_exec($curl);
      curl_close($curl);
      return json_decode($curl_response);  

    }




}
