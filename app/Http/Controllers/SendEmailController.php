<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;


use App\Mail\NotifyMail;


class SendEmailController extends Controller
{

    public function index()
    {



        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('ahmedmoibrahim22@gmail.com')->send(new NotifyMail($mailData));



    }
    public static function sendEmail($name,$role,$toEmail,$password){
        $mailData = [
            'title' => "Dear : $name",
            'body' => ['subject'=>" You becomes an  $role in Our Website",

       'subject1'=>  '   Your Credentials are :',

            'username' => $toEmail,

            'password' => $password


      ]  ];

        Mail::to($toEmail)->send(new NotifyMail($mailData));



}
}
