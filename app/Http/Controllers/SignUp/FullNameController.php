<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUp\FullNameRequest;
use App\Services\SignUp\FullNameService;

class FullNameController extends Controller
{
    protected $fullNameService;

    public function __construct(FullNameService $fullNameService)
    {
        $this->fullNameService = $fullNameService;
    }

    public function fullName(FullNameRequest $request)
    {

        $user = $this->fullNameService->createCredential($request->validated());
        dump($user);
        return $request->jsonResponse($user);
    }
}
