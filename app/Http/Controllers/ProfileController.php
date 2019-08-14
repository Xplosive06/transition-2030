<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $arrayOfParams = [
            ["title" => "Adresse email", "type" => "email", "name" => "email", "required" => true, "value" => $user->email],
            ["title" => "Pseudo", "type" => "username", "name" => "username", "required" => true, "value" => $user->username],
            ["title" => "Prénom", "type" => "first_name", "name" => "first_name", "required" => false, "value" => $user->first_name],
            ["title" => "Nom", "type" => "last_name", "name" => "last_name", "required" => false, "value" => $user->last_name],
            ["title" => "Ville", "type" => "city", "name" => "city", "required" => false, "value" => $user->address_city]
        ];
        return view('profiles.edit', compact('user', 'arrayOfParams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
