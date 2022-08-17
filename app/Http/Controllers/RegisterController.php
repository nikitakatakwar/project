<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\company;
use App\Models\Contact;
use App\Models\user;
use App\Models\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Notifications\WelcomeNoticification;
use App\Notifications\MyFirstNotification;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{

    public function form()
    {
        return view("pages.form");
    }
    public function saveData(Request $request)
    {
        $candidate = new Candidate;
        $candidate->name = $request->input('name');
        $candidate->email = $request->input('email');
        $candidate->address = $request->input('address');
        $candidate->date_of_birth = $request->input('date');
        $candidate->save();

        $contact = new Contact;
        $contact->contact_no = $request->input('contact_number');
        $contact->candidate_id = $candidate->id;
        $candidate->contact()->save($contact);

        $enroll_no = $candidate->id;
        $company_name = $request->input('company_name');

        foreach ($company_name as $key => $no) {
            $input['candidate_id'] = $candidate->id;
            $input['company_name'] = $company_name[$key];
            company::insert($input);
        }

        $enroll_no = $candidate->id;
        $college = $request->input('college');
        $degree = $request->input('degree');
        $year = $request->input('year_of_passing');


        foreach ($college as $key => $no) {
            $inputt['candidate_id'] = $candidate->id;
            $inputt['degree'] = $degree[$key];
            $inputt['year_of_passing'] = $year[$key];
            $inputt['college'] = $college[$key];
            degree::insert($inputt);
        }



            $Candidate = [
                'title' => 'Mail from Nikita',
                'body' => 'This is for testing email using smtp'
            ];
          //\Mail::to( $candidate->email)->send(new \App\Mail\MyTestMail($Candidate));

              $user = User::first();

                $details = [
                    'greeting' => 'Hi Student',
                    'body' => 'This is  Notification from consoleinfotech.com',
                    'thanks' => '  Your Registration successfull',
                    'actionText' => 'View My Site',
                    'actionURL' => url('/'),
                    'order_id' => 101
                ];

                Notification::send($user, new MyFirstNotification($details));
                return view("emails.myTestMail",compact('details'));


        }

            public function addStudent()
                {
                    $nik =candidate::with('company')->with('contact')->with('Degree')->get();
                    $imp = candidate::with('company')->get();
                    foreach($imp as $user)
                        {

                            $nh=$user->company;
                        }
                    return view('pages.addstudent', compact('nik','nh'));
                }
        }
