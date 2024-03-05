<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'username', 'password')->get();

        return response()->json(['users' => $users], 200, [], JSON_PRETTY_PRINT);
    }
}
