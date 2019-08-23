<?php

namespace App\Http\Controllers;

use App\Models\StaticPages;
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
        $about_page = StaticPages::where('page_name', '=', 'about' )->first();

        return view('pages.about', compact('about_page'));
    }

    public function users_list()
    {
        $users_list = User::orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.users_list', compact('users_list'));
    }

    public function admin()
    {
        $current_user = Auth::user();
        $users = User::all();
        $pages = StaticPages::all();

        return view('admin.show_admin', compact('current_user', 'users', 'pages'));
    }
}

