<?php 
echo phpversion() .  ' ';


define('FACEBOOK_SDK_V4_SRC_DIR', 'Facebook/');
require 'autoload.php';



// Make sure to load the Facebook SDK for PHP via composer or manually

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

// add other classes you plan to use, e.g.:
 use Facebook\FacebookRequest;
 use Facebook\GraphUser;
 use Facebook\FacebookRequestException;
 use Facebook\FacebookJavaScriptLoginHelper;


 if(session_id() == '' || !isset($_SESSION)) {
 	// session isn't started
 	session_start();
 }
 
 echo session_id();
 //$_SESSION['James'] = 'j';
 echo $_SESSION['James'];
FacebookSession::setDefaultApplication('152445061621781', 'fc28eed3decbef85b97f8a9f0bfc2e3c');


$helper = new FacebookRedirectLoginHelper('http://localhost:8080/fb');
//echo '<a href="' . $helper->getLoginUrl() . '">Login with Facebook</a>';



try {
	$session = $helper->getSessionFromRedirect();

	if ($session) {
		// Logged in
		echo  __LINE__ . "error";
	
		// Add `use Facebook\FacebookRequest;` to top of file
		$request = new FacebookRequest($session, 'GET', '/me');
		$response = $request->execute();
		$graphObject = $response->getGraphObject();
	
		$me = (new FacebookRequest(
				$session, 'GET', '/me'
		))->execute()->getGraphObject(GraphUser::className());
	
		var_dump($me);
	
	
	}else{
		//echo '<a href="' . $helper->getLoginUrl() . '">Login with Facebook</a>';
	}
	
	//$session = new FacebookSession ($_SESSION['FBRLH_state']);
	//var_dump($session);
} catch(FacebookRequestException $ex) {
	// When Facebook returns an error
	echo  __LINE__ . "error";
} catch(\Exception $ex) {
	// When validation fails or other local issues
	echo  __LINE__ . "error";
}









?>