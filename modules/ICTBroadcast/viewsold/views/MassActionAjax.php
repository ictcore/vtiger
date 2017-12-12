<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class ICTBroadcast_MassActionAjax_View extends Vtiger_IndexAjax_View {
	function __construct() {
		parent::__construct();
		
		$this->exposeMethod('showBroadCasting');
		
	}

	function process(Vtiger_Request $request) {
		$mode = $request->get('mode');
		//echo "<pre>adeel";print_r($mode);
		if(!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
	}

	

	 /**
	 * Function shows form that will lets you send SMS
	 * @param Vtiger_Request $request
	 */
	function showBroadCasting(Vtiger_Request $request) {
	
	
		$sourceModule = $request->getModule();
		//echo $sourceModule;
		
		
		$moduleName = 'ICTBroadcast';
		$selectedIds = $this->getRecordsListFromRequest($request);
		$excludedIds = $request->get('excluded_ids');
               

		
		$cvId = $request->get('viewname');

		$user = Users_Record_Model::getCurrentUserModel();
		
                $moduleModel = Vtiger_Module_Model::getInstance('Leads');
              
                $phoneFields = $moduleModel->getFieldsByType('phone');
                
                
                  $nameFields = $moduleModel->getFieldsByType('string');
                    
		$viewer = $this->getViewer($request);
        foreach($phoneFields as $test)
        {
           $dsd[]  = $test->get('name');

        }
		$nameFields = $moduleModel->getFieldsByLabel();
		 foreach($nameFields as $test)
        {
           $fieldInfo[]  = $test->get('name');

        }
        
       
		/*foreach ($fieldList as $fieldName => $fieldModel) {
			$fieldInfo[$fieldName] = $fieldModel->getFieldInfo();
		}*/
		//echo "<pre>";print_r($fieldInfo);
		/*if(count($selectedIds) == 1){

			$recordId = $selectedIds[0];
			$selectedRecordModel = Vtiger_Record_Model::getInstanceById($recordId, $sourceModule);
			$viewer->assign('SINGLE_RECORD', $selectedRecordModel);
		}/*else{

			foreach($selectedIds as $recordId) {
			$recordModel = Vtiger_Record_Model::getInstanceById($recordId);
			$numberSelected = false;
			foreach($fieldInfo as $fieldname) {
				$fieldValue = $recordModel->get($fieldname);
				if(!empty($fieldValue)) {
					$fname[$fieldname.'_'.$recordId] = $fieldValue;
					$numberSelected = true;
				}
			}
			if($numberSelected) {
				$selectedIds[] = $recordId;
			}
		}
		}


		echo "<pre>hello";print_r($fname);*/

	
		$viewer->assign('VIEWNAME', $cvId);
		$viewer->assign('MODULE', $moduleName);
		$viewer->assign('SOURCE_MODULE', $sourceModule);
		$viewer->assign('SELECTED_IDS', $selectedIds);
		$viewer->assign('EXCLUDED_IDS', $excludedIds);
		$viewer->assign('USER_MODEL', $user);
		$viewer->assign('PHONE_FIELDS', $phoneFields);
		$viewer->assign('NAME_FIELDS', $nameFields);
		//$viewer->assign('Campaign_type', $data);
       
        $searchKey = $request->get('search_key');
        $searchValue = $request->get('search_value');
		$operator = $request->get('operator');
        if(!empty($operator)) {
			$viewer->assign('OPERATOR',$operator);
			$viewer->assign('ALPHABET_VALUE',$searchValue);
            $viewer->assign('SEARCH_KEY',$searchKey);
		}
         // echo $moduleName;
		echo $viewer->view('start_broadcasting.tpl', $moduleName, true);
	}



}
