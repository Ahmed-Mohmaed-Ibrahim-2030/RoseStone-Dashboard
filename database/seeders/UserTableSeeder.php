<?php

namespace Database\Seeders;

use App\Mail\NotifyMail;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password=rand(10000000,99999999);
        $first_name='super ';
        $last_name='admin ';
        $email='ahmedmoibrahim22@gmail.com';
        $role='super_admin';
        $phone='01148077556';

        $user=\App\Models\User::create(
            [
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'email'=>$email,
                'password'=>bcrypt($password),
                'username'=>'80020197',
                'role'=>$role,
                 'phone'=>$role,

            ]
        );

$user->attachRole('super_admin');
        $mailData=[
            'title' => 'Mail from Rose Stone Support Team',
            'body' => [
                'subject 1'=>"Dear $first_name",
                'subject'=>" You  become one of our  Support Team ",

                ' Your Credentials  Are '=>' ',

                'username'=> $email,
                'password'=>$password



            ]  ];
        //
        Mail::to($email)->send(new NotifyMail($mailData));
    }
}
