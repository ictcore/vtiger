<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class Settings_ICTBroadcast_SaveAjax_Action extends Vtiger_SaveAjax_Action {

    // To save Mapping of user from mapping popup
    public function process(Vtiger_Request $request) {
    
    echo "<pre>";print_r($request);
        $id = $request->get('id');
        $qualifiedModuleName = 'ICTBroadcast';
        
        $recordModel = Settings_ICTBroadcast_Record_Model::getCleanInstance();
        $recordModel->set('gateway',$qualifiedModuleName);
        if($id) {
            $recordModel->set('id',$id);
        }
        
        $connector = new ICTBroadcast_ICTBroadcast_Connector;
        foreach ($connector->getSettingsParameters() as $field => $type) {
                $recordModel->set($field, $request->get($field));
        }
        
        $response = new Vtiger_Response();
        try {
                $recordModel->save();
                $response->setResult(true);
        } catch (Exception $e) {
                $response->setError($e->getMessage());
        }
        $response->emit();
    }
}
