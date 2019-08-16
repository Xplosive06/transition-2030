<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profiles.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('manage', $user);

        $city_forms = "<input type=\"hidden\" name=\"address_latitude\" id=\"address_latitude\" value=\"\"/>
                                    <input type=\"hidden\" name=\"address_longitude\" id=\"address_longitude\" value=\"\"/>";

        $arrayOfParams = [
            ["title" => "Adresse email", "type" => "email", "name" => "email", "required" => true, "value" => $user->email, "add_more" => ""],
            ["title" => "Pseudo", "type" => "username", "name" => "username", "required" => true, "value" => $user->username, "add_more" => ""],
            ["title" => "Prénom", "type" => "first_name", "name" => "first_name", "required" => false, "value" => $user->first_name, "add_more" => ""],
            ["title" => "Nom", "type" => "last_name", "name" => "last_name", "required" => false, "value" => $user->last_name, "add_more" => ""],
            ["title" => "Ville", "type" => "city", "name" => "address_city", "required" => false, "value" => $user->address_city, "add_more" => $city_forms],
            ["title" => "Description", "type" => "textarea", "name" => "description", "required" => false, "value" => $user->description, "add_more" => ""],
        ];
        return view('profiles.edit', compact('user', 'arrayOfParams'));
    }

    public function updateAvatar(Request $request, User $user)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('img/uploads/avatars/' . $filename));

            $user->avatar = $filename;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('manage', $user);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'username' => ['required', 'string', 'max:255', 'min:3', 'unique:users,username,' . $user->id],
            'first_name' => ['nullable', 'string', 'min:3','max:255'],
            'last_name' => ['nullable', 'string', 'min:3','max:255'],
            'address_city' => ['nullable', 'string', 'max:255'],
            'address_latitude' => ['nullable', 'numeric'],
            'address_longitude' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string', 'min:3','max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,gif,jpg,png', 'max:2048'],
        ]);
        $this->updateAvatar($request, $user);

        $user->update([
            'email' => $request->email,
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address_city' => $request->address_city,
            'address_latitude' => $request->address_latitude,
            'address_longitude' => $request->address_longitude,
            'description' => $request->description,
            'avatar' => $user->avatar,
        ]);
        return back()->with('ok', __('Le profil a bien été mis à jour'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
