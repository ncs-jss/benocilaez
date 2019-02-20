<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Society;
use Validator;

class SocietyController extends Controller
{
    /**
     * Login of society.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'username' => 'required',
            'password' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $postData = array(
            'username' => $request->input('username'),
            'password' => $request->input('password')
        );
        
        //API URL
        $url=config('infoConnectApi.url');
        
        // init the resource
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            )
        );
        
        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($ch);
        
        //Print error if any
        if (curl_errno($ch)) {
            return response()->json(['error'=>curl_error($ch)], 401);
        }
        
        curl_close($ch);
        
        $arr = json_decode($output, true);

        if (array_key_exists('username', $arr)) {
            $society = Society::select('id')->where('username', '=', $arr['username'])->first();
            if (empty($society)) {
                $society = new Society;
                $society->name = $arr['first_name'];
                $society->username = $arr['username'];
                $society->save();
            }

            Auth::loginUsingId($society->id);
            if ($arr['group'] == "others") {
                return redirect('home');
            } else {
                return redirect('/')->with(['msg' => 'The username and/or password you specified are not correct.', 'class' => 'alert-danger']);
            }
        } else {
            return redirect('/')->with(['msg' => 'The username and/or password you specified are not correct.', 'class' => 'alert-danger']);
        }
    }
}
