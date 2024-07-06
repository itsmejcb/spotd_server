<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\HistoryRequest;
use App\Services\Search\HistoryService;

class HistoryController extends Controller
{
    protected $historyService;

    public function __construct(HistoryService $historyService)
    {
        $this->historyService = $historyService;
    }
    public function searchHistory(HistoryRequest $request)
    {
        $user = $this->historyService->searchHistory($request->validated());

        return $request->jsonResponse($user);
    }
}
