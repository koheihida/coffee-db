<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TwitterLoginController extends Controller
{
    /**
    * Twitterの認証ページヘユーザーをリダイレクト
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')
        ->redirect();
    }

    public function urlUserDetails()
    {
        return 'https://api.twitter.com/1.1/account/verify_credentials.json?include_email=true';
    }
    /**
    * Twitterからユーザー情報を取得(Callback先)
    *
    * @return \Illuminate\Http\Response
    */
    public function handleProviderCallback()
        {
                $twitterUser = Socialite::driver('twitter')
                ->user();

                $user = User::firstOrCreate([
                    'email' => $twitterUser->email
                ], [
                    'email_verified_at' => now(),
                    'twitter_id' => $twitterUser
                        ->getId()
                ]);
            Log::info('Twitterから取得しました。', ['user' => $twitterUser]);
            Auth::login($user);
            return redirect('/');
        }
}
