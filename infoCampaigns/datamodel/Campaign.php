<?php


require_once 'AdGroup.php';

	class Campaign{
		public $info;
		public $AdGroups;
		public $user;

		function setAdGroups(){
			$adGroupService = $this->user->GetService('AdGroupService', ADWORDS_VERSION);

			$selector = new Selector();
			$selector->fields = array('Id', 'Name');
			$selector->ordering[] = new OrderBy('Name', 'ASCENDING');

			$selector->predicates[] = new Predicate('CampaignId', 'IN', array($this->info->id));
			$page = $adGroupService->get($selector);

			if (isset($page->entries)) {
				$this->AdGroups = array();
			   	foreach ($page->entries as $adGroupAux) {
			   		$adGroup = new AdGroup();
			   		$adGroup->info = $adGroupAux;
			   		$adGroup->user = $this->user;
			   		$adGroup->setAdText();
			   		$adGroup->setKeyWords();
			   		array_push($this->AdGroups, $adGroup);
			    }
			}
		}


	}
	
?>
