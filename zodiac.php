<?php 
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
 
 //$_SESSION['token'] = NULL;
 
 
 echo "<a href='http://localhost:8080/fb/zodiac.php?logout'>logout</a>";
 if(isset($_GET['logout'])){
	echo "Logged Out";
	$_SESSION['token'] = NULL;
 }
 
 //echo session_id();
 //$_SESSION['James'] = 'j';
 //echo $_SESSION['James'];
 $app_secret = 'fc28eed3decbef85b97f8a9f0bfc2e3c';
FacebookSession::setDefaultApplication('152445061621781', 'fc28eed3decbef85b97f8a9f0bfc2e3c');
$helper = new FacebookRedirectLoginHelper('http://localhost:8080/fb/zodiac.php');

//echo '<a href="' . $helper->getLoginUrl() . '">Login with Facebook</a>';

echo "<pre>";
var_dump($_SESSION);

try {

echo  " :".__LINE__ . ": ";

	if (isset($_SESSION['token'])){
		$session = new FacebookSession($_SESSION['token']);
		//var_dump($session);
	}else{
		$session = $helper->getSessionFromRedirect();
		if ($session){
			$_SESSION['token'] = $access_token = $session->getToken;
			$_SESSION['appsecret_proof '] = hash_hmac('sha256', $access_token, $app_secret); 
			//$_SESSION['logoutUrl'] = $helper->getLogoutUrl($session,'http://localhost:8080/fb/zodiac.php?logout');
		}
		//var_dump($session);
	
echo  " :".__LINE__ . ": ";
	if ($session){
		$_SESSION['token'] = $session->getToken();
	}
	
		$Nsession = new FacebookSession($session->getToken);		
		//var_dump($Nsession);
	}
	
	echo  " :".__LINE__ . ": ";
	
	if ($session) {
		// Logged in
		echo  " :".__LINE__ . ": ";
		
		
	echo "<pre>";
	
		// Add `use Facebook\FacebookRequest;` to top of file
		$request = new FacebookRequest($session, 'GET', 'me/friends?debug=all');

		$response = $request->execute();

		$graphObject = $response->getGraphObject();
		
		var_dump($graphObject);
		echo '----------------------------------------------';
		
		$me = (new FacebookRequest(
				$session, 'GET', 'me/friends?fields=id,name&debug=all'
		))->execute()->getGraphObject(GraphUser::className());
		
		

		
		var_dump($me);
	
	
	}else{
		echo '<a href="' . $helper->getLoginUrl(
		array(
		'scope'         => ' public_profile, email, user_friends, user_birthday'
)
		) . '">Login with Facebook</a>';
	}
	
	//$session = new FacebookSession ($_SESSION['FBRLH_state']);
	//var_dump($session);
} catch(FacebookRequestException $ex) {
	// When Facebook returns an error
	echo $ex;
	echo  __LINE__ . "error";
} catch(\Exception $ex) {
	// When validation fails or other local issues
	echo $ex;
	echo  __LINE__ . "error";
}
?>