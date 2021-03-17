<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;	

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $User)
    {
        return $User;
    }

    public function store(Request $request)
    {
        $User = User::create($request->all());

        return response()->json($User);
    }

    public function update(Request $request, User $User)
    {
        $User->update($request->all());

        return response()->json($User);
    }

    public function delete(User $User)
    {
        $User->delete();

        return response()->json(null, 204);
    }
}
