<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use App\Models\User;
use App\Notifications\ContactUs;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Mail;

class ContactUsFormController extends Controller
{
        // Create Contact Form
    public function createForm(Request $request) {
        // return view('contact');
    }
    // Store Contact Form data
    public function ContactUsForm(Request $request) {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'required',
            'message' => 'required'
            ]);
            // dd($request->all());
        //  Store data in database
       $contact= Contact::create($request->all());
        // // Send mail to admin
        // \Mail::raw(
        //     ('name'. ":". $request->get('name').",".
        //     // 'email'. ":". $request->get('email').",".
        //     'phone'. ":". $request->get('phone').",".
        //     'subject'. ":" .$request->get('subject').",".
        //     'user_query'. ":". $request->get('message').",")
        // , function($message) use ($request){
        //     $message->from($request->email);
        //     $message->to('me0950277@gmail.com', 'Admin')->subject($request->get('subject'));
        // });
        // return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
$name=$request->name;
$phone=$request->phone;
$email=$request->email;
$message=$request->message;
$subject=$request->subject;
        $mailData=[
    'title'=>"Message From $name ",
    'body'=>[
        'subject'=>$subject,
        'Email'=>$email ,
        'Phone'=>$phone ,
        'Message'=>$message ,

    ]];


      if(  \Illuminate\Support\Facades\Mail::to('rosestonespprttm@gmail.com')->send(new NotifyMail($mailData))) {
          \Illuminate\Support\Facades\Mail::to($email)->send(new NotifyMail(['title'=>"Mail From Rose Stone ",'body'=>['subject'=>"Dear $name. ",'subject 1'=>" We have received your message and we want to thank you for contact  us. "]]));
      }

      $users=User::all();
Notification::send($users,new ContactUs($contact->id,$contact->name,$contact->subject));
        return response()->json([
            'stautus'=>true,
            'message'=>'We have received your message and we want  to thank you for writing to us.',
        ],201);
    }


}
