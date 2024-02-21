<?php
require 'google-api/vendor/autoload.php';
						  
// init configuration
$clientID = '423935618448-6mn27j8tohcue42ii68m0fnp9pm4h7tu.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/E-baling/auth.php';
			   
// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
						  



?>
<style>
  *,
*:before,
*:after {
  box-sizing: border-box;
}

.container {
  display: flex;
}

.gsign-in-button {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
   display: inline-block;
  width: 240px;
  height: 50px;
  background-color: #4285f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .25);
  transition: background-color .218s, border-color .218s, box-shadow .218s;
}

.gsign-in-button:hover {
  cursor: pointer;
  -webkit-box-shadow: 0 0 3px 3px rgba(66, 133, 244, .3);
  box-shadow: 0 0 3px 3px rgba(66, 133, 244, .3);
}

.gsign-in-button:active {
  background-color: #3367D6;
  transition: background-color .2s;
}

.gsign-in-button .conwrapper {
  height: 100%;
  width: 100%;
  border: 1px solid transparent;
}

.gsign-in-button img {
  width: 18px;
  height: 18px;
}

.gsign-in-button .logo-wrap {
  padding: 15px;
  background: #fff;
  width: 48px;
  height: 100%;
  border-radius: 5px;
  display: inline-block;
}

.gsign-in-button .textcon {
  font-family: "Roboto", arial, sans-serif;
  font-weight: 500;
  letter-spacing: .21px;
  font-size: 16px;
  line-height: 48px;
  vertical-align: top;
  border: none;
  display: inline-block;
  text-align: center;
  width: 180px;
}
</style>

 <div class="container">
   <a id="login-btn"href="<?php echo $client->createAuthUrl(); ?>">
  <div class="gsign-in-button">
  <div class="conwrapper">
  <div class="logo-wrap">
  <img src="assets\images\google.png" alt="">
 </div>
 <span class="textcon">
  <span style="font-size: 0.9em;">Sambung dengan Google</span>
 </span>
</div>
</div>
 </a> 
</div> 