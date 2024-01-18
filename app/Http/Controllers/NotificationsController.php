<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Auth::user();
    }

    public function followers(User $user)
    {
        return auth()->user()->profile->followers;
    }

    // public function followers(User $user)
    // {
    //     $followers = auth()->user()->profile->followers;
    //     $formatted_followers = [];

    //     foreach ($followers as $follower) {
    //         $formatted_followers = [] = [
    //             'id' => $follower->id,
    //             'name' => $follower->name,
    //             'email' => $follower->email,
    //             'username' => $follower->username
    //         ];
    //     }

    //     return $formatted_followers;
    // }
}
