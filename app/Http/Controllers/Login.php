<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Logins;
use App\model\Company;
use Session;

use App\Http\Requests;

class login extends Controller
{
    public function index()
    {
        $data['all_info']=Company::all();
        return view('pos.pages.login.login',$data);
    }

    public function login_check(Request $request)
    {
        if (isset($_POST['login'])) {
            $email = $request->input('email');
            $password = md5($request->input('password'));

            $data = Logins::where('email', $email)->where('password', $password)->get();
            $result = count($data);

            if ($result == 0) {
                $message=$request->session()->flash('message', 'Invalid EMAIL or PASSWORD');
                return redirect('login');
            } else {
                //	echo 'pass'; die();
                $all_data = array(
                    'email' => $data[0]['email'],
                    'reg_id' => $data[0]['reg_id'],
                    'login_id'=>$data[0]['id'],
                    'type' => $data[0]['type'],
                    'logged_in' => TRUE
                );
                Session::put('login_id', $all_data['login_id']);
                Session::put('email', $all_data['email']);
                Session::put('type', $all_data['type']);
                $message=$request->session()->flash('message', 'Logged in Successfully');
                return redirect('home/index');
            }
        } else {

            $message=$request->session()->flash('message', 'Invalid EMAIL or PASSWORD');
            return redirect('login');
        }
    }
}