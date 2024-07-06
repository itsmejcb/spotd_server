<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\ForyouRequest;
use App\Services\Home\ForyouService;

class ForyouController extends Controller
{
    protected $foryouService;

    public function __construct(ForyouService $foryouService)
    {
        $this->foryouService = $foryouService;
    }

    public function homeForyou(ForyouRequest $request)
    {
        $user = $this->foryouService->homeForyou($request->validated());

        return $request->jsonResponse($user);
    }
}
