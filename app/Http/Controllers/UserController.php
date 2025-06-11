<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\User\UserServices;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;
    protected $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    public function CreateUser(UserRequest $request, User $user)
    {
        return  $this->authorize('create', $user);
        // return $this->userService->CreateUser($request);
    }

    public function LoginUser(LoginRequest $request)
    {
        return $this->userService->LoginUser($request);
    }

    public function LogoutUser(Request $request)
    {
        return $this->userService->Logout($request);
    }
}
