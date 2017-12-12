<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class ICTBroadcast_List_View extends Vtiger_Index_View {
	protected $listViewEntries = false;
	protected $listViewCount = false;
	protected $listViewLinks = false;
	protected $listViewHeaders = false;
	protected $noOfEntries = false;
	protected $pagingModel = false;
	protected $listViewModel = false;
	function __construct() {
		parent::__construct();
	}

	function preProcess(Vtiger_Request $request, $display=true) {
		parent::preProcess($request, false);

		$moduleName = $request->getModule();
		$customView = new CustomView();
		/*if($customView->isPermittedCustomView($request->get('viewname'), 'List', $moduleName) != 'yes') {
			$viewName = $customView->getViewIdByName('All', $moduleName);
			$request->set('viewname', $viewName);
			$_REQUEST['viewname'] = $viewName;
		}*/
		$viewer = $this->getViewer($request);
		$cvId = $this->viewName;

		if(!$cvId) {
			$customView = new CustomView();
			$cvId = $customView->getViewId($moduleName);
		}
		/*$listHeaders = $request->get('list_headers', array());
		$tag = $request->get('tag');*/

		$listViewSessionKey = $moduleName.'_'.$cvId;
		if(!empty($tag)) {
			$listViewSessionKey .='_'.$tag;
		}

		$orderParams = ICTBroadcast_ListView_Model::getSortParamsSession($listViewSessionKey);

		/*if(empty($listHeaders)) {
			$listHeaders = $orderParams['list_headers'];
		}*/

		$this->listViewModel = ICTBroadcast__ListView_Model::getInstance($moduleName, $cvId, $listHeaders);
		$linkParams = array('MODULE'=>$moduleName, 'ACTION'=>$request->get('view'));
		//$viewer->assign('CUSTOM_VIEWS', CustomView_Record_Model::getAllByGroup($moduleName));
		$this->viewName = $request->get('viewname');
		if(empty($this->viewName)){
			//If not view name exits then get it from custom view
			//This can return default view id or view id present in session
			$customView = new CustomView();
			$this->viewName = $customView->getViewId($moduleName);
		}

		$quickLinkModels = $this->listViewModel->getSideBarLinks($linkParams);
		$viewer->assign('QUICK_LINKS', $quickLinkModels);
		$this->initializeListViewContents($request, $viewer);
		$viewer->assign('VIEWID', $this->viewName);
		$moduleModel = ICTBroadcast_Module_Model::getInstance($moduleName);
		$viewer->assign('MODULE_MODEL', $moduleModel);

		if($display) {
			$this->preProcessDisplay($request);
		}
	}

	
	//Note : To get the right hook for immediate parent in PHP,
	// specially in case of deep hierarchy
	/*function preProcessParentTplName(Vtiger_Request $request) {
		return parent::preProcessTplName($request);
	}*/




	function process (Vtiger_Request $request) {
		$viewer = $this->getViewer ($request);
		$moduleName = $request->getModule();
		$moduleModel = ICTBroadcast_Module_Model::getInstance($moduleName);
		$viewName = $request->get('viewname');
		if(!empty($viewName)) {
			$this->viewName = $viewName;
		}

		$this->initializeListViewContents($request, $viewer);
		$this->assignCustomViews($request,$viewer);
		$viewer->assign('VIEW', $request->get('view'));
		$viewer->assign('MODULE_MODEL', $moduleModel);
		
	}
	
	/*
	 * Function to initialize the required data in smarty to display the List View Contents
	 */
	public function initializeListViewContents(Vtiger_Request $request, ICTBroadcast_Viewer $viewer) {
		$moduleName = $request->getModule();
		$cvId = $this->viewName;
		$pageNumber = $request->get('page');
		$orderBy = $request->get('orderby');
		$sortOrder = $request->get('sortorder');
		$searchKey = $request->get('search_key');
		$searchValue = $request->get('search_value');
		$operator = $request->get('operator');
		$searchParams = $request->get('search_params');
		$tagParams = $request->get('tag_params');
		$starFilterMode = $request->get('starFilterMode');
		$listHeaders = $request->get('list_headers', array());
		$tag = $request->get('tag');
		$requestViewName = $request->get('viewname');
		$tagSessionKey = $moduleName.'_TAG';

		if(!empty($requestViewName) && empty($tag)) {
			unset($_SESSION[$tagSessionKey]);
		}

		if(empty($tag)) {   
			$tagSessionVal = ICTBroadcast_ListView_Model::getSortParamsSession($tagSessionKey);
			if(!empty($tagSessionVal)) {
				$tag = $tagSessionVal;
			}
		}else{
			ICTBroadcast_ListView_Model::setSortParamsSession($tagSessionKey, $tag);
		}

		$listViewSessionKey = $moduleName.'_'.$cvId;
		if(!empty($tag)) {
			$listViewSessionKey .='_'.$tag;
		}

		if(empty($cvId)) {
			$customView = new CustomView();
			$cvId = $customView->getViewId($moduleName);
		}

		$orderParams = ICTBroadcast_ListView_Model::getSortParamsSession($listViewSessionKey);
		
		
		 
		if(empty($orderBy) && empty($searchValue) && empty($pageNumber)) {
			if($orderParams) {
				$pageNumber = $orderParams['page'];
				$orderBy = $orderParams['orderby'];
				$sortOrder = $orderParams['sortorder'];
				$searchKey = $orderParams['search_key'];
				$searchValue = $orderParams['search_value'];
				$operator = $orderParams['operator'];
				if(empty($searchParams)) {
					$searchParams = $orderParams['search_params']; 
				}

				if(empty($starFilterMode)) {
					$starFilterMode = $orderParams['star_filter_mode'];
				}
			}
		} else if($request->get('nolistcache') != 1) {
			$params = array('page' => $pageNumber, 'orderby' => $orderBy, 'sortorder' => $sortOrder, 'search_key' => $searchKey,
				'search_value' => $searchValue, 'operator' => $operator, 'tag_params' => $tagParams,'star_filter_mode'=> $starFilterMode,'search_params' =>$searchParams);

			if(!empty($listHeaders)) {
				$params['list_headers'] = $listHeaders;
			}
			ICTBroadcast_ListView_Model::setSortParamsSession($listViewSessionKey, $params);
		}
		if($sortOrder == "ASC"){
			$nextSortOrder = "DESC";
			$sortImage = "icon-chevron-down";
			$faSortImage = "fa-sort-desc";
		}else{
			$nextSortOrder = "ASC";
			$sortImage = "icon-chevron-up";
			$faSortImage = "fa-sort-asc";
		}

		if(empty ($pageNumber)){
			$pageNumber = '1';
		}

		if(!$this->listViewModel) {
			$listViewModel = ICTBroadcast_ListView_Model::getInstance($moduleName, $cvId, $listHeaders);
		} else {
			$listViewModel = $this->listViewModel;
		}
		$currentUser = Users_Record_Model::getCurrentUserModel();

		$linkParams = array('MODULE'=>$moduleName, 'ACTION'=>$request->get('view'), 'CVID'=>$cvId);
		$linkModels = $listViewModel->getListViewMassActions($linkParams);

		

		if(!empty($orderBy)) {
			$listViewModel->set('orderby', $orderBy);
			$listViewModel->set('sortorder',$sortOrder);
		}

		if(!empty($operator)) {
			$listViewModel->set('operator', $operator);
			$viewer->assign('OPERATOR',$operator);
			$viewer->assign('ALPHABET_VALUE',$searchValue);
		}
		if(!empty($searchKey) && !empty($searchValue)) {
			$listViewModel->set('search_key', $searchKey);
			$listViewModel->set('search_value', $searchValue);
		}

		if(empty($searchParams)) {
			$searchParams = array();
		}
		if(count($searchParams) == 2 && empty($searchParams[1])) {
			unset($searchParams[1]);
		}

		if(empty($tagParams)){
			$tagParams = array();
		}

		$searchAndTagParams = array_merge($searchParams, $tagParams);

		$transformedSearchParams = $this->transferListSearchParamsToFilterCondition($searchAndTagParams, $listViewModel->getModule());
		$listViewModel->set('search_params',$transformedSearchParams);


		//To make smarty to get the details easily accesible
		foreach($searchParams as $fieldListGroup){
			foreach($fieldListGroup as $fieldSearchInfo){
				$fieldSearchInfo['searchValue'] = $fieldSearchInfo[2];
				$fieldSearchInfo['fieldName'] = $fieldName = $fieldSearchInfo[0];
				$fieldSearchInfo['comparator'] = $fieldSearchInfo[1];
				$searchParams[$fieldName] = $fieldSearchInfo;
			}
		}

		foreach($tagParams as $fieldListGroup){
			foreach($fieldListGroup as $fieldSearchInfo){
				$fieldSearchInfo['searchValue'] = $fieldSearchInfo[2];
				$fieldSearchInfo['fieldName'] = $fieldName = $fieldSearchInfo[0];
				$fieldSearchInfo['comparator'] = $fieldSearchInfo[1];
				$tagParams[$fieldName] = $fieldSearchInfo;
			}
		}

		if(!$this->listViewHeaders){
			$this->listViewHeaders = $listViewModel->getListViewHeaders();
		}

		if(!$this->listViewEntries){
			$this->listViewEntries = $listViewModel->getListViewEntries($pagingModel);
		}
		//if list view entries restricted to show, paging should not fail
		if(!$this->noOfEntries) {
			$this->noOfEntries = $pagingModel->get('_listcount');
		}
		if(!$this->noOfEntries) {
			$noOfEntries = count($this->listViewEntries);
		} else {
			$noOfEntries = $this->noOfEntries;
		}
		$viewer->assign('MODULE', $moduleName);

		if(!$this->listViewLinks){
			$this->listViewLinks = $listViewModel->getListViewLinks($linkParams);
		}
		$viewer->assign('LISTVIEW_LINKS', $this->listViewLinks);

		$viewer->assign('LISTVIEW_MASSACTIONS', $linkModels['LISTVIEWMASSACTION']);

		$viewer->assign('PAGING_MODEL', $pagingModel);
		if(!$this->pagingModel){
			$this->pagingModel = $pagingModel;
		}
		$viewer->assign('PAGE_NUMBER',$pageNumber);

		if(!$this->moduleFieldStructure) {
			$recordStructure = ICTBroadcast_RecordStructure_Model::getInstanceForModule($listViewModel->getModule(), ICTBroadcast_RecordStructure_Model::RECORD_STRUCTURE_MODE_FILTER);
			$this->moduleFieldStructure = $recordStructure->getStructure();   
		}

		if(!$this->tags) {
			$this->tags = ICTBroadcast_Tag_Model::getAllAccessible($currentUser->id, $moduleName);
		}
		if(!$this->allUserTags) {
			$this->allUserTags = ICTBraodcast_Tag_Model::getAllUserTags($currentUser->getId());
		}

		$listViewController = $listViewModel->get('listview_controller');
		$selectedHeaderFields = $listViewController->getListViewHeaderFields();

		$viewer->assign('ORDER_BY',$orderBy);
		$viewer->assign('SORT_ORDER',$sortOrder);
		$viewer->assign('NEXT_SORT_ORDER',$nextSortOrder);
		$viewer->assign('SORT_IMAGE',$sortImage);
		$viewer->assign('FASORT_IMAGE',$faSortImage);
		$viewer->assign('COLUMN_NAME',$orderBy);
		$viewer->assign('VIEWNAME',$this->viewName);

		$viewer->assign('LISTVIEW_ENTRIES_COUNT',$noOfEntries);
		$viewer->assign('LISTVIEW_HEADERS', $this->listViewHeaders);
		$viewer->assign('LIST_HEADER_FIELDS', json_encode(array_keys($this->listViewHeaders)));
		$viewer->assign('LISTVIEW_ENTRIES', $this->listViewEntries);
		$viewer->assign('MODULE_FIELD_STRUCTURE', $this->moduleFieldStructure);
		$viewer->assign('SELECTED_HEADER_FIELDS', $selectedHeaderFields);
		$viewer->assign('TAGS', $this->tags);
		$viewer->assign('ALL_USER_TAGS', $this->allUserTags);
		$viewer->assign('ALL_CUSTOMVIEW_MODEL', CustomView_Record_Model::getAllFilterByModule($moduleName));
		$viewer->assign('CURRENT_TAG',$tag);
		$appName = $request->get('app');
		if(!empty($appName)){
			$viewer->assign('SELECTED_MENU_CATEGORY',$appName);
		}
		if (PerformancePrefs::getBoolean('LISTVIEW_COMPUTE_PAGE_COUNT', false)) {
			if(!$this->listViewCount){
				$this->listViewCount = $listViewModel->getListViewCount();
			}
			$totalCount = $this->listViewCount;
			$pageLimit = $pagingModel->getPageLimit();
			$pageCount = ceil((int) $totalCount / (int) $pageLimit);

			if($pageCount == 0){
				$pageCount = 1;
			}
			$viewer->assign('PAGE_COUNT', $pageCount);
			$viewer->assign('LISTVIEW_COUNT', $totalCount);
		}
		$viewer->assign('LIST_VIEW_MODEL', $listViewModel);
		$viewer->assign('GROUPS_IDS', Broadcast_Util_Helper::getGroupsIdsForUsers($currentUser->getId()));
		$viewer->assign('IS_CREATE_PERMITTED', $listViewModel->getModule()->isPermitted('CreateView'));
		$viewer->assign('IS_MODULE_EDITABLE', $listViewModel->getModule()->isPermitted('EditView'));
		$viewer->assign('IS_MODULE_DELETABLE', $listViewModel->getModule()->isPermitted('Delete'));
		$viewer->assign('SEARCH_DETAILS', $searchParams);
		$viewer->assign('TAG_DETAILS', $tagParams);
		$viewer->assign('NO_SEARCH_PARAMS_CACHE', $request->get('nolistcache'));
		$viewer->assign('STAR_FILTER_MODE',$starFilterMode);
		$viewer->assign('VIEWID', $cvId);
		//ICTBroadcast7
		$viewer->assign('REQUEST_INSTANCE',$request);

		//ICTBroadcast7
		$moduleModel = ICTBroadcast_Module_Model::getInstance($moduleName);
		if($moduleModel->isQuickPreviewEnabled()){
			$viewer->assign('QUICK_PREVIEW_ENABLED', 'true');
		}

		$picklistDependencyDatasource = ICTBroadcast_DependencyPicklist::getPicklistDependencyDatasource($moduleName);
		$viewer->assign('PICKIST_DEPENDENCY_DATASOURCE',Zend_Json::encode($picklistDependencyDatasource));
	}


}