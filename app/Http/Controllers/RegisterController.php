<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Contact;
use App\Models\company;
use App\Models\Education;
use App\Models\Detail;
use App\Models\Degree;
use Illuminate\Support\Facades\Auth;
use DB;

class RegisterController extends Controller
{

    //  display form of registration

    public function form()
    {
        return view("pages.form");
    }

    // save data of users
    public function saveData(Request $request)
    {

        $request->validate([
            'name'   => 'required',
            'email'  => 'required',
            'address'=>  'required',
            'date'   =>  'required',
            'contact_number[]'      => 'required|numeric',
            'company_name[]'        =>  'required|array',
            'college[]'             =>  'required',
            'year_of_passing[]'     =>  'required',
            'degree[]'              =>  'required',
        ]);
        $candidate = new Candidate;
        $candidate->name = $request->input('name');
        $candidate->email = $request->input('email');
        $candidate->address = $request->input('address');
        $candidate->date_of_birth = $request->input('date');
        $candidate->save();

        // save contact no of users
        $contact = new Contact;
        $contact->contact_no = $request->input('contact_number');
        $contact->candidate_id  =  $candidate->id;
        $candidate->contact()->save( $contact );

        $enroll_no = $candidate->id;
        $company_name =$request->input('company_name');

        //  save company of users
        foreach(   $company_name as $key => $no)
          {
            $input['candidate_id'] = $candidate->id;
            $input['company_name'] = $company_name[$key];
            company::insert($input);
          }

          $datas=array();

               $datas [] = [
                'candidate_id' => $candidate->id,
                'college'     => $request->input('college'),
                'year_of_passing' => $request->input('year_of_passing'),
                'degreee'      => $request->input('degree'),
           ];

            // save education details
            $enroll_no = $candidate->id;
            $college =$request->input('college');
            $year_of_passing =$request->input('year_of_passing');
            $degree =$request->input('degree');

             for ($i=0; $i<$datas; $i++)
              {

                Degree::create([
                    'candidate_id'=>  $enroll_no,
                    'college' =>  $college[$i],
                    'year_of_passing' => $year_of_passing[$i],
                    'degree' =>   $degree[$i],
                ]);
              }

            //   send email to users
                if($this->isOnline())
                    {
                    $mail_data=[
                        'recipient'=>'nikitakatakwar@165gmail.com',
                        'fromEmail'=> $request->input('email'),
                        'fromName'=> $request->input('name'),
                        'subject'=>'Registration on website',
                        'body'=>'Successfully Registed'
                    ];

                    Mail::send('email-template', ['candidate' => $candidate], function ($m) use ($candidate) {
                        $m->from('nikitakatakwar@165gmail.com', 'Your Application');

                        $m->to($candidate->email, $candidate->name)->subject('Your Rrgistration Successful!');
                    });
                    return back()->with('success', 'msg send.');

                    }
                    else{
                        return back()->with('msg', 'check internet connection.');
                    }
                        return back()->with('success', 'Record Created Successfully.');
                }

                //    check internet connection
                    public function isOnline($site ="https://www.youtube.com/")
                    {
                            if(@fopen($site,"r"))
                            {
                                return true;
                            }
                            else{
                                return false;
                            }
                    }

                //display data of registered users
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
