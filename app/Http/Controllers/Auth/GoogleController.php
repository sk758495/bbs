<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')
                ->scopes(['email', 'profile'])
                ->redirect();
        } catch (Exception $e) {
            Log::error('Google OAuth redirect error: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Unable to connect to Google. Please try again.');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            
            if (!$googleUser->email) {
                return redirect('/login')->with('error', 'Unable to get email from Google account.');
            }
            
            $user = User::where('email', $googleUser->email)
                       ->orWhere('google_id', $googleUser->id)
                       ->first();
            
            if ($user) {
                // Update Google ID if not set
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->id]);
                }
                Auth::login($user, true);
            } else {
                // Create new user
                $user = User::create([
                    'name' => $googleUser->name ?? $googleUser->email,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(16)),
                ]);
                
                Auth::login($user, true);
            }
            
            return redirect()->intended('/dashboard');
            
        } catch (Exception $e) {
            Log::error('Google OAuth callback error: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Google authentication failed. Please try again or use email/password.');
        }
    }
}