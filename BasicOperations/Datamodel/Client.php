<?php


require_once 'Campaign.php';

	class Client{
		public $campaigns;
		public $user;

		function setCampaigns(){
			$campaignService = $this->user->GetService('CampaignService', ADWORDS_VERSION);

			  $selector = new Selector();
			  $selector->fields = array('Id', 'Name');
			  $selector->ordering[] = new OrderBy('Name', 'ASCENDING');
			  $page = $campaignService->get($selector);

			  if (isset($page->entries)) {
			  	$this->campaigns = array();
			    foreach ($page->entries as $campaignAux) {
					  $campaign = new Campaign();
					  $campaign->info = $campaignAux;
					  $campaign->user = $this->user;
					  $campaign->setAdGroups();
					  array_push($this->campaigns, $campaign);
			    }
			  }
		}

	}
	
?>
