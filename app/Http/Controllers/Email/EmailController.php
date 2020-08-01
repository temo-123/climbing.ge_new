<?php

namespace App\Http\Controllers\Email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use Validator;

use App\Mail\Email;

class EmailController extends Controller
{
    public function email(Request $request)
    {
        $token = $request -> input('g-recaptcha-response');
        if ($token != NULL) {


            if($request->name != null) $name = $request->name;              else $name = null;
            if($request->surname != null) $surname = $request->surname;     else $surname = null;
            if($request->email != null) $email = $request->email;           else $email = null;
            if($request->num != null) $num = $request->num;                 else $num = null;
            if($request->country != null) $country = $request->country;     else $country = null;
            if($request->msg != null) $msg = $request->msg;                 else $msg = null;


            // dd($email);


            // $validator = $request->alidate([
            //     'name' => 'required|max:190',
            //     'surname' => 'required|max:190',
            //     'email' => 'required',
            //     'country' => 'required',
            //     'msg' => 'required',
            // ]);
            
            $EmailArray = array(
    	        'name' => $name,
    	        'surname' => $surname,
    	        'email' => $email,
    	        'num' => $num,
    	        'country' => $country,
    	        'message' => $msg,
            );

        	// dd($EmailArray);
            
            Mail::to('samsonadze.temo9@gmail.com')->send(new Email($EmailArray));
            
            return redirect()->route('about_page')->with('status','Message sent');
        }
        else return Back()->with('status','Fill captcha!');
    }
}
