<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('/login');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);

        return redirect()->to('/');
    }

    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();
        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name' => $facebookUser->getName(),
            'email' => $facebookUser->getEmail(),
            'facebook_id' => $facebookUser->getId(),
            'avatar' => $facebookUser->getAvatar(),
        ]);
    }

    public function postLogin(Request $request)
    {
        $auth = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $rememeber = $request->input('Remember');

        if (Auth::attempt($auth, $rememeber)) {
            if ((Auth::user()->status) == 0) {
                return  redirect('/');
            } elseif (Auth::user()->status == 2) {
                Auth::logout();
                session()->flash('message', trans('sites.user_disable'));

                return redirect('login');
            } else {
                return redirect('admin/dashboard');
            }
        } else {
            session()->flash('message', trans('sites.incorrect_username_or_pass'));

            return redirect('login');
        }
    }
}
