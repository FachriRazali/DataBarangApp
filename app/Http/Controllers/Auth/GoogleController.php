<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
            // Retrieve the user's details from Google
            $googleUser = Socialite::driver('google')->user();

            // Check if a user with this Google ID exists in the database
            $user = User::where('google_id', $googleUser->id)->first();

            if (!$user) {
                // If user does not exist, create a new user record
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt('random_password'), // Use a secure random password
                    'role' => 'user', // Default role
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                ]);
            }

            // Log the user in
            Auth::login($user, true);

            // Redirect to the appropriate page
            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            // Handle errors and redirect back with an error message
            return redirect('/login')->with('error', 'Unable to login with Google: ' . $e->getMessage());
        }
    }
}
