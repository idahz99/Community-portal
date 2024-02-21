<?php
session_start();
include_once 'dbconnect.php';
if(isset($_SESSION['login_id'])){
    header('Location: homepage.php');
    exit;
}
require 'google-api/vendor/autoload.php';
// Creating new google client instance
$clientID = '423935618448-6mn27j8tohcue42ii68m0fnp9pm4h7tu.apps.googleusercontent.com';
$clientSecret = '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';
$client = new Google_Client();

// Enter your Client ID
$client->setClientId($clientID);
// Enter your Client Secrect
$client->setClientSecret($clientSecret);
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/E-baling/auth.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

if(isset($_GET['code'])){
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    print_r($token);
        $client->setAccessToken($token['access_token']);
        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        //$google_account_info->email;
        //$google_account_info->name;
        //$google_account_info->id;
        $_SESSION['google_id']     = $google_account_info->id;
        $_SESSION['user_name'] = $google_account_info->name;
        $_SESSION['email'] = $google_account_info->email;
       print("thissss"." ". $_SESSION['google_id']  );
       var_dump($_SESSION);
        $id = idgenerator($conn);
   }


     function checkuser($conn, $id, $google_id, $username, $email){
      $sql1 = "SELECT * from table_pembekal WHERE email ='$email'";
       // print("Value given is "." ".$google_id);
       $check = mysqli_query($conn,$sql1);       
       $checkdta = mysqli_num_rows($check);

      if($checkdta == 0) 
       { // New user Insertion  
          print("Value given isss "." ".$google_id);
         $querynew = "INSERT INTO table_pembekal (userID,google_id,name,email,status) VALUES ('$id','$google_id','$username','$email','unverified')";
         print("Value given isss "." ".$querynew);
         mysqli_query($conn,$querynew);
         $_SESSION['status'] = 'unverified';
         $_SESSION['id'] = $id;
         return "new user";
       }
       elseif($checkdta == 1) 
       { // Returned user data update   
        $_SESSION['id'] = $id;  
         $queryupdate = "UPDATE table_pembekal SET name = '$username', google_id = '$google_id' WHERE email = '$email'";
         if($conn->query($queryupdate) ===TRUE ){
          $query  = "SELECT * FROM table_pembekal WHERE email = '$email'"; 
          $result = $conn->query($query);
          while($row = $result->fetch_assoc()) {
          $_SESSION['id'] = $row['userID'];
            }
          }
       return "returned user"; }
     }
       
     // session part    
       checkuser($conn,$id,$_SESSION['google_id'], $_SESSION['user_name'], $_SESSION['email']);
       
       /* ---- Redirection location after session ----*/
       header("Location: homepage.php");
        function idgenerator($conn){
        do {
        $uniqueid = rand(1000,999999);
        $res = $conn->query("SELECT userID from table_pembekal WHERE EXISTS (SELECT userID FROM table_pembekal WHERE $uniqueid= userID )");
        }
        while(mysqli_num_rows($res)>0);  
       
        return $uniqueid;
         }

?>


<style>
  *,
*:before,
*:after {
  box-sizing: border-box;
}

.container {
  height: 20vh;
}

.gsign-in-button {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  margin: 10px;
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
  <span>Dafter dengan Google</span>
 </span>
</div>
</div>
 </a> 
</div> 

