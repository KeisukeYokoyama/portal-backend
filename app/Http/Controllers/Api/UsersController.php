<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    // ユーザー一覧を取得
    public function index()
    {
        $users = User::all();
        return response()->json(
            [
                'users' => $users,
                'message' => 'ユーザー一覧を取得しました',
            ], 200);
    }

    // ユーザー詳細を取得
    public function show($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        return response()->json(
            [
                'user' => $user,
                'message' => 'ユーザー詳細を取得しました',
            ], 200);
    }
}
