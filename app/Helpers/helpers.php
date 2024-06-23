<?php

// smsonlinegh
function sendText($receiver, $message, $sender_name = "WOGWCI")
{
    try {

        $sender = $sender_name;
        $client_id = 'recordscloud0@gmail.com';
        $client_secret = 'Holygrail3000@';
        $client_user = $client_id;
        $client_password = $client_secret;

        // URL for sending message.
        $smsUrl = "http://api.smsonlinegh.com/sendsms.php";
        $user = urlencode($client_user);
        $password = urlencode($client_password);
        $message = urlencode($message);
        $sender = urlencode($sender);
        $type = 0;
        $destination = $receiver; // "0241726707,0504989952,0241492118";
        $params = "user={$user}&password={$password}&message={$message}" . "&type={$type}&sender={$sender}&destination={$destination}";
        $liveUrl = "{$smsUrl}?{$params}";
        return file_get_contents($liveUrl);
    } catch (Exception $e) {
        return $e;
    }
}
