<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Society;
use Validator;

class SocietyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Society::select('id', 'name', 'username')->get();
        return $this->sendResponse($events->toArray(), 'Societies retrieved successfully.');
    }

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
                $society = Auth::user();
                $success['access_token'] =  $society->createToken('Personal Access Token')->accessToken;
                $success['token_type'] = 'Bearer';
                return response()->json(['success' => $success], 200);
            } else {
                return response()->json(['error'=>'This login is correct but does not belong to any society'], 401);
            }
        } else {
            return response()->json(['error'=>'The username and/or password you specified are not correct.'], 401);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user()->only(['id', 'name']);
        return response()->json(['success' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|max:100',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        Society::where('id', Auth::id())->update(
            [
            'name' => $request->input('name')
            ]
        );
        $success['name'] = $request->input('name');
        return response()->json(['success' => $success], 200);
    }
}
