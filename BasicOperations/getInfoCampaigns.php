<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" /> 

</head>

<?php
/**
 *
 * @category   WebServices
 * @copyright  2015, Nural Smart All Rights Reserved.
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache License,
 *             Version 2.0
 * @author     Alvaro Blazquez
 */

// Include the initialization file
require_once '../library/init.php';
require_once 'datamodel/Client.php';


try {
  // Get AdWordsUser from credentials in "../auth.ini"
  // relative to the AdWordsUser.php file's directory.
  $user = new AdWordsUser();
  $client = new Client();
  $client->user = $user;
  $client->setCampaigns();
  // Run the example.
  //GetCampaignsExample($user);
} catch (Exception $e) {
  printf("An error has occurred: %s\n", $e->getMessage());
}


?>

<body>

	<p>Campaign</p>
	<?php
		$campaigns = $client->campaigns;
		for ($i=0; $i < count($campaigns); $i++) { 
			$campaign = $campaigns[$i];
	?>
			<p><?php echo $campaign->info->name;?></p>
			<ul>
	<?php
			$adGroups = $campaign->AdGroups;
			for ($z=0; $z < count($adGroups); $z++) { 
				$adGroup = $adGroups[$z];
	?>
				<li>
				<p><?php echo $adGroup->info->name;?></p>
				</li>
				<ul>
				<p>TEXTADS</p>

	<?php
				$textAds = $adGroup->textAds;
				for ($y=0; $y < count($textAds); $y++) { 
					$textAd = $textAds[$z];
	?>
					<li>
					<p><?php echo $textAd->info->headline;?></p>
					</li>

	<?php
				}
	?>
				</ul>
				<ul>
				<p>KEYWORDS</p>
	<?php
				$keywords = $adGroup->keywords;
				for ($k=0; $k < count($keywords); $k++) { 
					$keyword = $keywords[$k];
	?>
					<li>
					<p><?php echo $keyword->info->text;?></p>
					</li>

	<?php
				}
	?>
				</ul>
	<?php
			}
	?>
			</ul>
	<?php
		}

	?>

</body>
