<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUp\FullNameRequest;
use App\Services\SignUp\FullNameService;

class FullNameController extends Controller
{
    protected $userService;

    public function __construct(FullNameService $userService)
    {
        $this->userService = $userService;
    }

    public function fullName(FullNameRequest $request)
    {

        $user = $this->userService->createCredential($request->validated());
        dump($user);
        return $request->jsonResponse($user);
    }
}
