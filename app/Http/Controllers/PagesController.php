<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home()
    {
        $users_lat_lng = User::select(array('address_latitude', 'address_longitude'))->get();

        if (Auth::user()) {
            $current_user = Auth::user();
        }
        return view('pages.home', compact('users_lat_lng', 'current_user'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function users_list()
    {
        $users_list = User::orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.users_list', compact('users_list'));
    }
}

