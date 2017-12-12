<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 28/11/2017
 * Time: 13:47
 */

namespace App\Http\Service;

use Illuminate\Support\Facades\Log;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;
use Twilio\Twiml;

class TwilioService {

    private $sid;
    private $token;
    private $number;
    private $client;

    public function __construct()
    {
        $this->sid = env('TWILIO_ACCOUNT_SID');
        $this->token = env('TWILIO_AUTH_TOKEN');
        $this->number = env('TWILIO_NUMBER');
        $this->client = new Client($this->sid, $this->token);
    }

    public function notifyThroughSms($recipientNumbers, $message)
    {
        $result = array();
        foreach ($recipientNumbers as $number) {
            array_push($result, $this->sendSms(
                $number,
                $message
            ));
        }

        return $result;
    }

    private function sendSms($to, $message)
    {
        set_time_limit(100);
        $test = preg_match('/^\++?[1-9]\d{1,14}$/', $to);
        if($test != 1)
        {
            return "enter valid E-164 format for " .$to;
        }
        try {
            $this->client->messages->create(
                $to,
                [
                    "body" => $message,
                    "from" => /*+12567334430*/$this->number,
                    'statusCallback' => 'https://requestb.in/11qge0v1'
                ]
            );
            return 'Message sent to ' . $to;
        } catch (TwilioException $e) {
            return
                'Could not send SMS notification.' .
                ' Twilio replied with: ' . $e;
        }
    }

    public function receiveReply($request){
//        $from = $request->from;
//        $body = $request->body;
        $response = new Twiml();
//        if($body) {
        return $response->message('You have successfully accepted the reservation');
//        }
    }

}