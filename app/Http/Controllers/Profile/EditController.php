<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\EditRequest;
use App\Services\Profile\EditService;

class EditController extends Controller
{
    protected $editProfileService;

    public function __construct(EditService $editProfileService)
    {
        $this->editProfileService = $editProfileService;
    }
    public function editUsername(EditRequest $request)
    {
        $user = $this->editProfileService->editUsername($request->validated());

        return $request->jsonResponse($user);
    }
    public function editCredentials(EditRequest $request)
    {
        $user = $this->editProfileService->editCredentials($request->validated());

        return $request->jsonResponse($user);
    }
    public function editProfile(EditRequest $request)
    {
        $user = $this->editProfileService->editProfile($request->validated());

        return $request->jsonResponse($user);
    }
}
