<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = \Hash::make($data['password']);
        $user = User::where('email', $data['email'])->first();

        if ($user) return response(['error'=> 'User already exists'],403);

        $user = User::create($data);
        $accessToken = auth()->tokenById($user->id);

        return response(['access_token' => $accessToken]);
    }
}
