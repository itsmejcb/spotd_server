<?php

namespace App\Http\Controllers\React;

use App\Http\Controllers\Controller;
use App\Http\Requests\React\ReactRequest;
use App\Services\React\ReactService;

class ReactController extends Controller
{
    protected $reactService;

    public function __construct(ReactService $reactService)
    {
        $this->reactService = $reactService;
    }
    public function react(ReactRequest $request)
    {
        $user = $this->reactService->reactPost($request->validated());

        return $request->jsonResponse($user);
    }
    public function unreact(ReactRequest $request)
    {
        $user = $this->reactService->unreactPost($request->validated());

        return $request->jsonResponse($user);
    }
}
