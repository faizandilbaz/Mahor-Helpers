<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Mail;

class MailHelper{
    public static function sendInvoice($receiver, $msg){
        //  dd($receiver);
        $data = ['msg' => $msg];
        Mail::send('mail.code', $data, function ($message) use ($receiver){
            $message->from('dawaAdmin@support.com', 'Dawa Mart');
            $message->to($receiver->email, $receiver->name)
            ->subject('Verification Code');
        });
    }
}