<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home()
    {
        $users_map_infos = User::select(array('id', 'address_latitude', 'address_longitude', 'username', 'avatar', 'description'))->get();

        if (Auth::user()) {
            $current_user = Auth::user();
        }
        return view('pages.home', compact('users_map_infos', 'current_user'));
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

