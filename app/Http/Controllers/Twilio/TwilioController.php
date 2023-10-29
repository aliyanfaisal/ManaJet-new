<?php

namespace App\Http\Controllers\Twilio;

use Exception;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TwilioController extends Controller
{
  //


  static function sendWhatsAppNotification($send_to, $message)
  {
 

    $sid = config("app.twilio_sid");
    $token = config("app.twilio_auth_key");

    if (substr($send_to, 0, 1) === "0") {
      // Remove the leading 0 and add "92" to the beginning of the string
      $send_to = "+92" . substr($send_to, 1);
    }



    
      $twilio = new Client($sid, $token);

      $message = $twilio->messages
        ->create(
          "whatsapp:$send_to",
          // to
          array(
            "from" => "whatsapp:+14155238886",
            "body" => $message
          )
        );
 



    return response()->json($message);
  }
}
