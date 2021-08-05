<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
//    }
//We customize the Register functionality by overriding the register method.

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->save();

        if ($user != null) {
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            return redirect()
                ->back()
                ->with(session()->flash('alert-success', 'Your account has successfully been created! Please check your email for the verification link.'));
        }

        return redirect()
            ->back()
            ->with(session()->flash('alert-danger', 'Sorry, something went wrong!'));
    }

    public function verifyUser(Request $request)
    {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');//grabbing query parameter(verification code)
        //Search through the users table; makes sure only one user with the verification code

        $user = User::query()->where(['verification_code' => $verification_code])
            ->first();
        if ($user != null) {
            $user->is_verified = 1;
            $user->save();
            Auth::login($user);
            return redirect()
                ->route('home')
                ->with(session()->flash('alert-success', 'Your account has been successfully verified! Proceed to login'));
        }

        return redirect()
            ->route('login')
            ->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }

}
