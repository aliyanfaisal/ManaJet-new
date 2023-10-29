<?php
use App\Models\User;
use App\Models\Notification;
use App\Http\Controllers\Twilio\TwilioController;


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

    if(is_connected()){
        $user_phone= User::find($user_id)->pluck("phone"); 
        TwilioController::sendWhatsAppNotification($user_phone, "*$title* %0a %0a". $content);
    }
   

    return $notification;
}





function is_connected()
{
  $connected = fopen("http://www.google.com:80/","r");
  if($connected)
  {
     return true;
  } else {
   return false;
  }
} 