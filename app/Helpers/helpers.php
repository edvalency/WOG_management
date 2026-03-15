<?php

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

function getSundays()
{
    $sundays = [];
    $start = Carbon::parse('first sunday of january');
    array_push($sundays, $start->toDateString());
    $end = Carbon::parse('last sunday');
    $currwk = $end->weekOfYear;
    for ($w = 1; $w <= $currwk; $w++) {
        $nxt =  $start->addWeek();
        array_push($sundays, $nxt->toDateString());
    }
    return array_reverse($sundays);
}

function getServiceDays($day = 1)
{
    $days = DB::table('attendance_logs')
        ->select(DB::raw('DISTINCT DATE(created_at) as date'))
        ->whereRaw('DAYOFWEEK(DATE(created_at)) = ' . $day)
        ->orderByDESC('date')
        ->pluck('date')
        ->map(function ($item) {
            return date('D, jS F Y', strtotime(Carbon::parse($item)->toDateString()));
        });

    return $days;
}



function recordActivity($activity)
{
    DB::table('user_activity')->insert(['user_id' => Auth::user()->mask, 'activity' => $activity, 'created_at' => Carbon::now()->toDateTimeString()]);
}

function hasRole($role)
{
    $roles = json_decode(Auth::user()->roles);

    if (in_array($role, $roles) || in_array("admin", $roles)) {
        return true;
    } else {
        return false;
    }
}

function hasPermission($user, $permission)
{
    $permissions = DB::table('user_permissions')->where('user_id', $user)->pluck('permission')->toArray();

    if (in_array($permission, $permissions)) {
        return true;
    } else {
        return false;
    }
}
