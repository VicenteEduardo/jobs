<?php

namespace App\Http\Controllers;

use App\Classes\Logger;
use App\Models\CustomerAccount;
use App\Models\OrderedItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {

        $githubUser = Socialite::driver($provider)->user();
        $userAcount = User::where('email', $githubUser->email)->first();
        if ($userAcount) {
            Auth::login($userAcount);
            //Logger
            $this->Logger->log('info', 'Iniciou a Sessão com o provedor  ' . $provider);


            return redirect()->route('admin.home', Auth::user()->id)->with('userAcount', 1);
        } else {
            $user = User::create([

                'name' => $githubUser->name,
                'username'=> $githubUser->name,
                'provider_id' => $githubUser->id,
                'email' => $githubUser->email??'test@vice.com',
                'level' => "cliente",
                'photo' => $githubUser->getAvatar() ?? '/dashboard/img/user.png',

            ]);


            Auth::login($user);

            //Logger
            $this->Logger->log('info', 'Iniciou a Sessão com o provedor  ' . $provider);
            return redirect()->route('admin.home', Auth::user()->id)->with('userAcount', 1);
        }
    }
}
