<?php
/**
 *
 * @category   WebServices
 * @copyright  2015, Nural Smart All Rights Reserved.
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache License,
 *             Version 2.0
 * @author     Alvaro Blazquez
 */
// Set error reporting levels to highest
error_reporting(E_STRICT | E_ALL);

define('SRC_PATH', dirname(__FILE__) .'/lib/');
define('LIB_PATH', 'Google/Api/Ads/AdWords/Lib');
define('UTIL_PATH', 'Google/Api/Ads/Common/Util');
define('ADWORDS_UTIL_PATH', 'Google/Api/Ads/AdWords/Util');

define('ADWORDS_VERSION', 'v201506');

// Configure include path
ini_set('include_path', implode(array(
    ini_get('include_path'), PATH_SEPARATOR, SRC_PATH
)));

// Include the AdWordsUser
require_once LIB_PATH . '/AdWordsUser.php';
