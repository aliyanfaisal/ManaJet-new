<?php
use App\Models\Notification;


function sendNotifcation($user_id, $title, $content, $link=""){

    if(empty($user_id) || empty($title)){
        return false;
    }


    $notification= Notification::create([
        "notification_title"=> $title,
        "notification_content"=> $content,
        "user_id"=>$user_id,
        "link"=> $link
    ]);

    return $notification;
}