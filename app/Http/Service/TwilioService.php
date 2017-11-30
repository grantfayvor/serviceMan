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
        $this->number = env('TWILIO_NUMBER', null);
        $this->client = new Client($this->sid, $this->token);
    }

    public function notifyThroughSms($recipientNumbers, $message)
    {
        foreach ($recipientNumbers as $number) {
            $this->sendSms(
                $number,
                $message
            );
        }
    }

    private function sendSms($to, $message)
    {
        try {
            $this->client->messages->create(
                $to,
                [
                    "body" => $message,
                    "from" => $this->number,
                    'statusCallback' => 'https://requestb.in/11qge0v1'
                ]
            );
            Log::info('Message sent to ' . $to);
        } catch (TwilioException $e) {
            Log::error(
                'Could not send SMS notification.' .
                ' Twilio replied with: ' . $e
            );
        }
    }

    public function receiveReply($request){
//        $from = $request->from;
        $body = $request->body;
        $response = new Twiml();
        if($body) {
            $response->message('You have successfully accepted the reservation');
        }
    }

}