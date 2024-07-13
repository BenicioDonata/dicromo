<?php

namespace Modules\User\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class UserServices
{
    public function validateFields($request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function getUsers()
    {
        $users = User::all();

        return $users;
    }

    public function createUser($validatedData)
    {
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return $user;
    }

    public function getUserById($id)
    {
        $user = User::find($id);

        return $user;
    }

    public function updateUser($user, $request)
    {
        $user->update($request->only(['name', 'email']));
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return $user;
    }

    public function deleteUser($user)
    {
        $user->delete();
    }

}
