<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SuggestionRequest;
use App\Services\Search\SuggestionService;

class SuggestionController extends Controller
{
    protected $suggestionService;

    public function __construct(SuggestionService $suggestionService)
    {
        $this->suggestionService = $suggestionService;
    }
    public function searchSuggestion(SuggestionRequest $request)
    {
        $user = $this->suggestionService->searchSuggestion($request->validated());

        return $request->jsonResponse($user);
    }
}
