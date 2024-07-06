<?php

namespace App\Services\Search;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Repositories\Search\SuggestionRepository;

class SuggestionService
{
    protected $suggestionRepository;
    protected $key;
    protected $util;

    public function __construct(SuggestionRepository $suggestionRepository, Keys $keys, Utils $utils)
    {
        $this->suggestionRepository = $suggestionRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function searchSuggestion(array $data)
    {
        $user = User::find(1);
        $id = $user->id;

        return $this->suggestionRepository->searchSuggestion([
            $this->key->UserID => $id,
        ]);
    }
}
