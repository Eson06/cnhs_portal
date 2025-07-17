<?php

namespace App\Http\Controllers;

use App\Models\activity_log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function customLogin(Request $request)
    {

        $request->validate([
            'user_name' => ['required', Rule::exists('users')],
            'password' => 'required',
        ]);


            $credentials = $request->only('user_name', 'password');

            if( Auth::guard('web')->attempt($credentials) ){
                $User = User::where('user_name', $request->user_name)->get('is_enable')->first();
                $checkUser = User::where('user_name', $request->user_name)->get()->first();

                if ($checkUser->is_enable == true)
                {
                   
                    $urlIntended = session()->get('url.intended');
                    if($urlIntended != null) {
                        activity_log::create([
                            'name' => $checkUser->name,
                            'user_name' => $checkUser->user_name,
                            'role' => $checkUser->role,
                            'activity' => 'Logged In',
                        ]);
                        // Log::channel('users')->info('User {id} succesfully logged in. With Ip Address {ip} ', ['id' => $checkUser->user_name,'ip' => $request->getClientIp()]);
                        RateLimiter::clear($request->input('user_name').'_login');
                        return redirect()->to($urlIntended);
                    }
                    else {

                        // Log::channel('users')->info('User {id} succesfully logged in. With Ip Address {ip}', ['id' => $checkUser->user_name, 'ip' => $request->getClientIp()]);
                        activity_log::create([
                            'name' => $checkUser->name,
                            'user_name' => $checkUser->user_name,
                            'role' => $checkUser->role,
                            'activity' => 'Logged In',
                        ]);
                        RateLimiter::clear($request->input('user_name').'_login');
                        return redirect()->route('dashboard');

                    }


                }

                else
                {
                    Auth::guard('web')->logout();
                    // Log::channel('users')->alert('Banned User {id} is logging in. With Ip Address {ip}', ['id' => $User->user_name, 'ip' => $request->getClientIp()]);
                    return redirect()->route('login')->with('ban','This Account is disabled. Please contact System Administrator');
                }

            }
            else{

                $maxAttempts = 4;
                $lockoutTime = 120;

                if (RateLimiter::tooManyAttempts($request->input('user_name').'_login', $maxAttempts)) {
                    $User = User::where('user_name', $request->user_name)->get()->first();
                    $User['is_enable'] = false;
                    $Success = $User->update();
                    if($Success) {
                        // Log::channel('users')->alert('User {id} is banned from the system. Ip Address {ip}', ['id' => $User->user_name,'ip' => $request->getClientIp()]);
                        return redirect()->route('login')->with('ban','Too many log in attempts. Account disabled. Please contact System Administrator');
                    }
                    else {
                        // Log::channel('users')->critical('Failed to update User to Disable.', ['id' => $User->user_name]);
                        return redirect()->route('login')->with('fail','Please contact System Administrator');
                    }

                }

                $attempt = RateLimiter::hit($request->input('user_name').'_login', $lockoutTime);
                // Log::channel('users')->alert(' User {id} is trying to log in. But failed. with IP Address {ip}', ['id' => $request->user_name, 'ip' => $request->getClientIp()]);
                return redirect()->route('login')->with('fail',' User Name  or Password does not match. ' . $maxAttempts - $attempt + 1 . ' Attempt(s) remaining.');

            }
        }
}
