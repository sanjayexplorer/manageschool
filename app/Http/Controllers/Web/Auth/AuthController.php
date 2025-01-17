<?php 
namespace App\Http\Controllers\Web\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Helper;
class AuthController extends Controller
{
     public function Login(){
        return view('pages.auth.login');
     }
     
     public function loginPost(){
        $messages = [
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
        ];

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], $messages);

        if (Auth::attempt(['mobile' => $mobile, 'password' => $request->password])) {
                $user = Auth::user();
                if (strcmp($user->status,'inactive')==0 ||strcmp($user->status,'deleted')==0 ) {
                    if(strcmp($user->status,'inactive')==0){
                        Session::flash('errorMessage', 'Your account is currently not active. Please contact admin to activate the account.');
                        Auth::logout();
                        return redirect()->route('login');
                    }
                    if(strcmp($user->status,'deleted')==0){
                        Session::flash('errorMessage', 'Invalid login credentials');
                        Auth::logout();
                        return redirect()->route('login');
                    }
                } else {
                    $user = User::whereId($user->id)->where('status','!=','deleted')->with('roles')->first();
                    $role = $user->roles->first()->name ?? 'agent';

                    switch ($role) {
                        case 'admin':
                            return redirect()->route('/');
                        case 'principal':
                            return redirect()->route('/');
                        case 'teacher':
                             return redirect()->route('/');
                        default:
                            Auth::logout();
                            return redirect()->route('login');
                    }
                }
            } else {
                Session::flash('errorMessage', 'Invalid login credentials');
                Auth::logout();
                return redirect()->route('login');
            }

     }
     
}