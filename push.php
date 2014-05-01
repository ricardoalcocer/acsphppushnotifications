<?php
    /*
    ACS Push Notification Web Service
    By: Ricardo Alcocer (@ricardoalcocer)

    Description:
    A simple reusable PHP Script to send ACS Push Notifications
    
    Original code by @patrickjongmans
    posted at http://developer.appcelerator.com/question/140589/how-to-send-push-notifiaction-to-android-using-php-controled-acs-#254798
    */

    /*** SETUP ***************************************************/
    $key        = $_REQUEST['acskey']  ?: NULL;
    $username   = $_REQUEST['acsuid']  ?: NULL;
    $password   = $_REQUEST['acspwd']  ?: NULL;
    $to_ids     = $_REQUEST['to_ids']  ?: 'everyone';
    $channel    = $_REQUEST['channel'] ?: NULL;
    $message    = $_REQUEST['message'] ?: NULL;
    $title      = $_REQUEST['title']   ?: NULL;
    $tmp_fname  = 'cookie.txt';
    $json       = '{"alert":"'. $message .'","title":"'. $title .'","vibrate":true,"sound":"default"}';
 
    if (!is_null($key) && !is_null($username) && !is_null($password) && !is_null($channel) && !is_null($message) && !is_null($title)){
        /*** PUSH NOTIFICATION ***********************************/
        $post_array = array('login' => $username, 'password' => $password);
     
        /*** INIT CURL *******************************************/
        $curlObj    = curl_init();
        $c_opt      = array(CURLOPT_URL => 'https://api.cloud.appcelerator.com/v1/users/login.json?key='.$key,
                            CURLOPT_COOKIEJAR => $tmp_fname, 
                            CURLOPT_COOKIEFILE => $tmp_fname, 
                            CURLOPT_RETURNTRANSFER => true, 
                            CURLOPT_POST => 1,
                            CURLOPT_POSTFIELDS  =>  "login=".$username."&password=".$password,
                            CURLOPT_FOLLOWLOCATION  =>  1,
                            CURLOPT_TIMEOUT => 60);

        /*** LOGIN **********************************************/
        curl_setopt_array($curlObj, $c_opt); 
        $session = curl_exec($curlObj);     

        /*** SEND PUSH ******************************************/
        $c_opt[CURLOPT_URL]         = "https://api.cloud.appcelerator.com/v1/push_notification/notify.json?key=".$key; 
        $c_opt[CURLOPT_POSTFIELDS]  = "channel=".$channel."&payload=".$json."&to_ids=".$to_ids; 
     
        curl_setopt_array($curlObj, $c_opt); 
        $session = curl_exec($curlObj);     

        /*** THE END ********************************************/
        curl_close($curlObj);

        header('Content-Type: application/json');
        die(json_encode(array('response' => json_decode($session))));
    }else{
        header('Content-Type: application/json');
        die(json_encode(array('response' => json_decode($session))));
    }
?>