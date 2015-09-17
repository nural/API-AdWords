<?php

require_once 'AdText.php';
require_once 'Keyword.php';

	class AdGroup{
		public $info;
		public $textAds;
		public $keywords;
		public $user;

		function setAdText(){
			  $adGroupAdService = $this->user->GetService('AdGroupAdService', ADWORDS_VERSION);

			  $selector = new Selector();
			  $selector->fields = array('Headline', 'Id');
			  $selector->ordering[] = new OrderBy('Headline', 'ASCENDING');

			  $selector->predicates[] = new Predicate('AdGroupId', 'IN', array($this->info->id));
  			  $selector->predicates[] = new Predicate('AdType', 'IN', array('TEXT_AD'));
			  // By default disabled ads aren't returned by the selector. To return them
			  // include the DISABLED status in a predicate.
			  $selector->predicates[] =
			      new Predicate('Status', 'IN', array('ENABLED', 'PAUSED', 'DISABLED'));

			  $page = $adGroupAdService->get($selector);

			  if (isset($page->entries)) {
			  	  $this->textAds = array();
			      foreach ($page->entries as $adGroupAd) {
			      	$adText = new AdText();
			      	$adText->info = $adGroupAd->ad;
			      	array_push($this->textAds, $adText);
			      }
			  }
		}


		function setKeyWords() {

			  // Get the service, which loads the required classes.
			  $adGroupCriterionService = $this->user->GetService('AdGroupCriterionService', ADWORDS_VERSION);

			  // Create selector.
			  $selector = new Selector();
			  $selector->fields = array('Id', 'CriteriaType', 'KeywordMatchType',
			      'KeywordText');
			  $selector->ordering[] = new OrderBy('KeywordText', 'ASCENDING');

			  // Create predicates.
			  $selector->predicates[] = new Predicate('AdGroupId', 'IN', array($this->info->id));
			  $selector->predicates[] = new Predicate('CriteriaType', 'IN', array('KEYWORD'));
			  $page = $adGroupCriterionService->get($selector);
			    // Display results.
			  if (isset($page->entries)) {
			  	  $this->keywords = array();
			      foreach ($page->entries as $adGroupCriterion) {
			      	$keyword = new Keyword();
			      	$keyword->info = $adGroupCriterion->criterion;
			      	array_push($this->keywords, $keyword);

			      }
			  }
		}

	}
	
?>
